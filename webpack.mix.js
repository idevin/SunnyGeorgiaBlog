const mix = require('laravel-mix')
const webpack = require('webpack')
require('mix-env-file')

mix.env(process.env.ENV_FILE)

mix.webpackConfig({
  plugins: [
    new webpack.ProvidePlugin({
      $: 'jquery',
      jQuery: 'jquery',
      'window.jQuery': 'jquery'
    })
  ]
})

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.webpackConfig({
  stats: {
    children: true
  }
})
  .js('resources/js/app.js', 'public/js')
  .js('resources/js/article.js', 'public/js')
  .js('resources/js/index.js', 'public/js')
  .copyDirectory('resources/images', 'public/images')
  .copyDirectory('resources/fonts', 'public/fonts')
  .sourceMaps(false, 'source-map')
  .version()
  .sass('resources/sass/app.scss', 'public/css', {
    // Rewrite CSS urls for app.scss
    processUrls: false
  })

// .copy('node_modules/vendor/acme.txt', 'public/js/acme.txt');

function copy (mix) {
  let path = ''
  switch (process.env.APP_ENV) {
    case 'development':
      path = '../sunnygeorgia_dev'
      break
    case 'production':
      path = '../sunnygeorgia'
      break
  }
  if (path !== '') {
    mix.copyDirectory('public/js', path + '/public/js')
    mix.copyDirectory('public/css', path + '/public/css')
    mix.copyDirectory('public/images', path + '/public/images')
    mix.copyDirectory('public/fonts', path + '/public/fonts')
  }
  return path
}

copy(mix)
