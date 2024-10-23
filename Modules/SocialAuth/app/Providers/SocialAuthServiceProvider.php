<?php

namespace Modules\SocialAuth\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Modules\SocialAuth\Http\Controllers\SocialAuthController;
use Modules\SocialAuth\Services\FacebookAuthService;
use Modules\SocialAuth\Services\GoogleAuthService;
use Modules\SocialAuth\Services\Interfaces\AuthServiceInterface;
use Modules\SocialAuth\Services\ZaloAuthService;
use SocialiteProviders\Manager\SocialiteWasCalled;
use SocialiteProviders\TikTok\Provider as TikTokProvider;
use SocialiteProviders\Zalo\Provider as ZaloProvider;

class SocialAuthServiceProvider extends ServiceProvider
{
    protected string $moduleName = 'SocialAuth';

    protected string $moduleNameLower = 'socialauth';

    /**
     * Boot the application events.
     */
    public function boot(): void
    {
        $this->registerCommands();
        $this->registerCommandSchedules();
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'database/migrations'));
        Event::listen(function (SocialiteWasCalled $event) {
            $event->extendSocialite('zalo', ZaloProvider::class);
        });
        Event::listen(function (SocialiteWasCalled $event) {
            $event->extendSocialite('tiktok', TikTokProvider::class);
        });
    }

    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->app->register(EventServiceProvider::class);
        $this->app->register(RouteServiceProvider::class);
        $this->app->when(SocialAuthController::class)
            ->needs(AuthServiceInterface::class)
            ->give(function ($app) {
                $provider = request()->route('provider');
                switch ($provider) {
                    case 'google':
                        return $app->make(GoogleAuthService::class);
                    case 'facebook':
                        return $app->make(FacebookAuthService::class);
                    case 'zalo':
                        return $app->make(ZaloAuthService::class);
                    default:
                        throw new \Exception('Invalid provider');
                }
            });
    }

    /**
     * Register commands in the format of Command::class
     */
    protected function registerCommands(): void
    {
        // $this->commands([]);
    }

    /**
     * Register command Schedules.
     */
    protected function registerCommandSchedules(): void
    {
        // $this->app->booted(function () {
        //     $schedule = $this->app->make(Schedule::class);
        //     $schedule->command('inspire')->hourly();
        // });
    }

    /**
     * Register translations.
     */
    public function registerTranslations(): void
    {
        $langPath = resource_path('lang/modules/'.$this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
            $this->loadJsonTranslationsFrom($langPath);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'lang'), $this->moduleNameLower);
            $this->loadJsonTranslationsFrom(module_path($this->moduleName, 'lang'));
        }
    }

    /**
     * Register config.
     */
    protected function registerConfig(): void
    {
        $this->publishes([module_path($this->moduleName, 'config/config.php') => config_path($this->moduleNameLower.'.php')], 'config');
        $this->mergeConfigFrom(module_path($this->moduleName, 'config/config.php'), $this->moduleNameLower);
        $this->mergeConfigFrom(module_path($this->moduleName, 'config/services.php'), 'services');
    }

    /**
     * Register views.
     */
    public function registerViews(): void
    {
        $viewPath = resource_path('views/modules/'.$this->moduleNameLower);
        $sourcePath = module_path($this->moduleName, 'resources/views');

        $this->publishes([$sourcePath => $viewPath], ['views', $this->moduleNameLower.'-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);

        $componentNamespace = str_replace('/', '\\', config('modules.namespace').'\\'.$this->moduleName.'\\'.ltrim(config('modules.paths.generator.component-class.path'), config('modules.paths.app_folder', '')));
        Blade::componentNamespace($componentNamespace, $this->moduleNameLower);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array<string>
     */
    public function provides(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (config('view.paths') as $path) {
            if (is_dir($path.'/modules/'.$this->moduleNameLower)) {
                $paths[] = $path.'/modules/'.$this->moduleNameLower;
            }
        }

        return $paths;
    }
}
