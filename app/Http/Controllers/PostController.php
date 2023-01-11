<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Traits\Locale;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PostController extends Controller
{
    use Locale;

    public function switchLocale($locale): Redirector|RedirectResponse|Application
    {
        $defaultRedirect = redirect()->to('/' . (env('APP_ENV') != 'local' ? 'blog/' : '') . app()->getLocale());
        $redirect = redirect()->back();
        $backUrl = $redirect->getTargetUrl();

        if (in_array($locale, array_keys(config('locales')))) {
            session()->put('locale', $locale);

            if (request()->fullUrl() === $backUrl) {
                return $defaultRedirect;
            }
            $url = parse_url($backUrl);
            if (preg_match('#/locale(.*)#', $url['path']) == 0) {

                $path = preg_replace('#/blog#', '', $url['path']);
                $createdRequest = request()->create($path);

                $route = app('router')->getRoutes()->match($createdRequest);
                $action = self::getAction($route);
                $methodParts = explode('.', $action);

                $method = implode('', array_map(function ($part, $i) {
                    return $i !== 0 ? ucfirst($part) : $part;
                }, $methodParts, array_keys($methodParts)));

                if (method_exists($this, $method)) {
                    $route->parameters = self::{$method}($route, $locale, $url);
                } else {
                    $route->parameters['locale'] = $locale;
                }

                return redirect(routeLink($action, $route->parameters));
            } else {
                return $defaultRedirect;
            }

        } else {

            return $defaultRedirect;
        }
    }

    public function setLocale(): RedirectResponse
    {
        if (in_array(session()->get('locale'), array_keys(config('locales')))) {
            return redirect()->to('/' . session()->get('locale'));
        } else {
            return redirect()->to('/' . app()->getLocale());
        }
    }

    /**
     * Show the application dashboard.
     */
    public function index($locale): View
    {
        $posts = Post::usingLocale($locale)->with('author', 'likes')
            ->withCount('comments', 'thumbnail', 'likes')->latest()->take(5)->get();

        $allPosts = Post::fromCategory(null, ['tags', 'author', 'likes']);

        $tags = Tag::byLocale(session()->get('locale'))->get();
        $locale = session()->get('locale');

//        $dirs = Storage::disk('selectel');
//        dd($dirs);
        $products = DB::connection('site')->table('excursions')
            ->whereIn('excursions.id', [217, 213, 214, 212])
            ->join('excursion_translations', function ($join) use ($locale) {
                $join->on('excursions.id', '=', 'excursion_translations.excursion_id')
                    ->where('excursion_translations.locale', '=', $locale);
            })
            ->join('media_library', function ($join) use ($locale) {
                $join->on('excursions.id', '=', 'media_library.model_id')
                    ->where('excursion_translations.locale', '=', $locale);
            })
            ->select(
                'excursions.id',
                'excursions.duration',
                'excursions.score',
                'excursion_translations.title',
                'excursion_translations.intro',
                'excursion_translations.start_place',
                'excursion_translations.slug',
            )
            ->orderBy('id')
            ->get();
//        dd($products[0]);
        $lowestPrices = DB::connection('site')->table('excursion_prices')
            ->whereIn('excursion_id', $products->pluck('id'))
            ->whereIn('price_type', ['adult', 'group'])
            ->whereNotNull('price')
            ->select(
                'excursion_id',
                DB::raw('MIN(price) as price'),
                'price_type'
            )
            ->groupBy('excursion_id', 'price_type')
            ->orderBy('excursion_id')
            ->get();

        $products->transform(function ($product) use ($lowestPrices) {
            $price = $lowestPrices->first(function ($price) use ($product) {
                return $price->excursion_id === $product->id;
            });
//            dd($product);
            return (object)array_merge((array)$product, (array)$price);
        });
//        dd($products);
        return view('posts.index', [
            'posts' => $posts,
            'allPosts' => $allPosts,
            'tags' => $tags,
            'excursions' => $products
        ]);
    }

    /**
     * Display the specified resource.
     * @param string $locale
     * @param string $slug
     * @return View|RedirectResponse
     */
    public function show($locale, $slug): View|RedirectResponse
    {

        if (!in_array($locale, array_keys(config('locales')))) {
            throw new NotFoundHttpException();
        }

        if (Category::found($locale, $slug)) {
            return app(CategoryController::class)->show($locale, $slug);
        }

        /**
         *
         * @param null|Post $post
         */
        $post = Post::usingLocale($locale)
            ->with('thumbnail')
            ->where('slug', 'regexp', parseSlug($slug))
            ->first();

        if (!$post) {
            return app(CategoryController::class)->show($locale, $slug);
        }

        $postArray = $post->toArray();

        if (empty($postArray['slug'][$locale])) {
            throw  new NotFoundHttpException();
        }

        if ($postArray['slug'][$locale] != $slug) {
            app()->setLocale($locale);
            return redirect()->to(routeLink('posts.show', ['slug' => $postArray['slug'][$locale], 'locale' => $locale]));
        }

        $post->comments_count = $post->comments()->count();
        $post->likes_count = $post->likes()->count();
        $post = $post->load('tags.posts.tags');
        return view('posts.show-new', [
            'post' => $post,
            'tags' => $post->tags
        ]);
    }

    public function search($locale, Request $request): Factory|\Illuminate\Contracts\View\View|Application
    {
        $q = $request->input('q');

        if (empty($q)) {
            return throw new NotFoundHttpException();
        }

        $posts = Post::usingLocale($locale)
            ->search($q)
            ->with('author', 'likes')
            ->withCount('comments', 'thumbnail', 'likes')
            ->latest()
            ->paginate(9);

        $posts->appends(['q' => $request->get('q')]);

        return view('posts.search-new', [
            'posts' => $posts
        ]);
    }
}
