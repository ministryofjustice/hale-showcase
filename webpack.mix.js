const mix_ = require('laravel-mix');


mix_.setPublicPath('./dist')
  .sass('./assets/scss/style.scss', 'css/hale-showcase-style.min.css')
  .copy('./assets/js/*', 'dist/js/')
  .scripts(['./node_modules/govuk-frontend/dist/govuk/govuk-frontend.min.js'], 'dist/js/govuk-frontend.js')
  .options({
    processCssUrls: false
  });

if (mix_.inProduction()) {
  mix_.version();
} else {
  mix_.sourceMaps();
}
