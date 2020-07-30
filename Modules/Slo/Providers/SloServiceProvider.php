<?php

namespace Modules\Slo\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Modules\Slo\Entities\Batch;
use Modules\Slo\Entities\BatchType;
use Modules\Slo\Http\View\Composers\BatchComposer;
use Modules\Slo\Http\View\Composers\BatchTypeComposer;
use Modules\Slo\Http\View\Composers\CourseComposer;

class SloServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'Slo';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'slo';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));

        // Option 1
        // View::composer(['slo::batch.*'],function ($view){
        //     $view->with('batchTypes',BatchType::orderBy('batch_type')->get());
        // });
      // View::composer(['slo::batch.*'],function ($view){
        //       $view->with('batchTypes',BatchType::orderBy('batch_type')->get());
          //   });
        View::composer(['slo::batchType.*'],function ($view){
            $view->with('batchTypes',BatchType::orderBy('batch_type')->get());
        });
       // View::composer(['slo::batch.*'],function ($view){
         //   $view->with('batches',Batch::orderBy('batch_code')->get());
       // });
        //Option 2
        View::composer(['slo::batch.*'],CourseComposer::class);
        View::composer(['slo::batch.*'], BatchComposer::class);
        View::composer(['slo::batch.*'], BatchTypeComposer::class);
        //or
        View::composer('slo::partials.BatchType.*', BatchTypeComposer::class);
        View::composer('slo::partials.Course.*', CourseComposer::class);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower . '.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'), $this->moduleNameLower
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);

        $sourcePath = module_path($this->moduleName, 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (!app()->environment('production') && $this->app->runningInConsole()) {
            app(Factory::class)->load(module_path($this->moduleName, 'Database/factories'));
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (\Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }
        return $paths;
    }
}
