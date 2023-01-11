<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Cache;
use Spatie\Translatable\HasTranslations;
use Vicklr\MaterializedModel\MaterializedModel;

/**
 * @property string title
 * @property string path
 * @property int id
 * @property string slug
 */
class Category extends MaterializedModel
{
    use HasTranslations, HasFactory;

    public $timestamps = true;
    public $casts = [
        'title' => 'array',
        'slug' => 'array',
        'meta_title' => 'array',
        'meta_keywords' => 'array',
        'meta_description' => 'array',
        'content' => 'array'
    ];
    public array $translatable = ['title', 'slug', 'meta_title', 'meta_keywords', 'meta_description', 'content'];

    protected $with = ['children'];

    protected $table = 'categories';

    protected string $parentColumn = 'parent_id';

    protected string $depthColumn = 'depth';

    protected $appends = ['slug_path'];

    protected string $pathColumn = 'path';
    protected string $orderColumn = 'weight';
    protected $guarded = ['id', 'parent_id', 'depth', 'path', 'weight'];

    protected $fillable = ['title', 'slug', 'meta_title', 'meta_keywords', 'meta_description',
        'created_at', 'updated_at'];

    public static function boot()
    {
        parent::boot();

        self::updated(function ($category) {
            $key = 's' . $category->id;
            \Cache::forget($key);
        });
    }

    public static function tree($categories, &$data = [], &$select = [], $locale = '')
    {

        if (!empty($categories)) {
            foreach ($categories as $index => $category) {
                $data[$index] = $category;
                $select[$category->id] = $category->getTranslation('title', $locale);
                if (!empty($category->children)) {
                    $data[$index]['children'] = self::tree($category->children, $data, $select, $locale);
                    $select[$category->id] = str_repeat('&nbsp;', $category->depth) . ' - ' .
                        $category->getTranslation('title', $locale);
                }
            }
        }
        return $data;
    }

    public static function found($locale, $path): Model|static|null
    {
        $lastPath = last(explode('/', $path));
        return self::usingLocale($locale)->query()->where('slug', 'regexp', parseSlug($lastPath))->first();
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function getSlugPathAttribute(): string
    {
        $key = 's_' . session()->get('locale') . '_' . $this->id;
        $path = Cache::get($key);

        if (empty($path)) {
            Cache::forget($key);
            $path = Cache::remember($key, 24 * 365 * 60, function () {

                return $this->getPathByLocale(locale: session()->get('locale'));
            });
        }

        return $path;
    }

    public function getPathByLocale($locale = null): string
    {
        if (!$locale) {
            $locale = session()->get('locale');
        }

        $categories = $this->getAncestorsAndSelf(['slug', 'depth'])->sortBy('depth');

        $path = '';
        if (count($categories) > 0) {

            foreach ($categories as $category) {
                $category = $category->toArray();

                $slug = $category['slug'][$locale] ?? $category['slug'][config('app.default_locale')];

                $path .= $slug . '/';
            }
        }

        return $path;
    }
}
