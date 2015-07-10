<?php

namespace Fraank\ViewCounter;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ViewCounterServiceProvider extends LaravelServiceProvider {

  use \Illuminate\Console\AppNamespaceDetectorTrait;

  /**
   * Indicates if loading of the provider is deferred.
   *
   * @var bool
   */
  protected $defer = false;

  /**
   * Bootstrap the application events.
   *
   * @return void
   */
  public function boot()
  {
    $this->handleMigrations();
    $this->handleTranslations();
    $this->handleRoutes();
  }

  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
    include __DIR__.'/Http/routes.php';
    // print_r($this->getAppNamespace());
    // print_r($this->app); exit;

    $this->app->make('Fraank\ViewCounter\LikeController');
  }

  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  public function provides()
  {
    // Register events for view and like
    return array();
  }

  private function handleTranslations() {
    $this->loadTranslationsFrom('packagename', __DIR__.'/../src/lang');
  }

  private function handleViews() {
    $this->loadViewsFrom('packagename', __DIR__.'/../views');
    $this->publishes([
      __DIR__.'/../views' => base_path('resources/views/fraank/view-counter')
    ]);
  }

  private function handleMigrations() {
    $this->publishes([
      realpath(__DIR__.'/migrations') => $this->app->databasePath().'/migrations',
    ]);
  }

  private function handleRoutes() {
    include __DIR__.'/Http/routes.php';
  }

}
