<?php

namespace Foostart\Slideshow;

use Illuminate\Support\ServiceProvider;
use LaravelAcl\Authentication\Classes\Menu\SentryMenuFactory;
use URL,
    Route;
use Illuminate\Http\Request;

class SlideshowServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(Request $request) {
        /**
         * Publish
         */
        $this->publishes([
            __DIR__ . '/config/slideshow_admin.php' => config_path('slideshow_admin.php'),
                ], 'config');
        $this->publishes([
            __DIR__ . '/public' => public_path('foostart'),
                ], 'public');

        $this->loadViewsFrom(__DIR__ . '/views', 'slideshow');


        /**
         * Translations
         */
        $this->loadTranslationsFrom(__DIR__ . '/lang', 'slideshow');


        /**
         * Load view composer
         */
        $this->slideshowViewComposer($request);

        $this->publishes([
            __DIR__ . '/../database/migrations/' => database_path('migrations')
                ], 'migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        include __DIR__ . '/routes.php';

        /**
         * Load controllers
         */
        $this->app->make('Foostart\Slideshow\Controllers\Admin\SlideshowAdminController');
        $this->app->make('Foostart\Slideshow\Controllers\Front\SlideshowFrontController');
        /**
         * Load Views
         */
        $this->loadViewsFrom(__DIR__ . '/views', 'slideshow');
    }

    /**
     *
     */
    public function slideshowViewComposer(Request $request) {

        view()->composer('slideshow::slideshow*', function ($view) {
            global $request;
            $slideshow_id = $request->get('id');
            $is_action = empty($slideshow_id) ? 'page_add' : 'page_edit';

            $view->with('sidebar_items', [

                /**
                 * Samples
                 */
                //list
                trans('slideshow::slideshow_admin.page_list') => [
                    'url' => URL::route('admin_slideshow'),
                    "icon" => '<i class="fa fa-users"></i>'
                ],
                //add
                trans('slideshow::slideshow_admin.' . $is_action) => [
                    'url' => URL::route('admin_slideshow.edit'),
                    "icon" => '<i class="fa fa-users"></i>'
                ],
                /**
                 * Categories
                 */
                //list
                trans('slideshow::slideshow_admin.page_category_list') => [
                    'url' => URL::route('admin_slideshow_category'),
                    "icon" => '<i class="fa fa-users"></i>'
                ],
            ]);
            //
        });
    }

}
