<?php

use Illuminate\Session\TokenMismatchException;


/**
 * ADMINISTRATOR
 */
Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => ['admin_logged', 'can_see']], function () {

        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////SAMPLES ROUTE///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
        /**
         * list
         */
        Route::get('admin/slideshow', [
            'as' => 'admin_slideshow',
            'uses' => 'Foostart\Slideshow\Controllers\Admin\SlideshowAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/slideshow/edit', [
            'as' => 'admin_slideshow.edit',
            'uses' => 'Foostart\Slideshow\Controllers\Admin\SlideshowAdminController@edit'
        ]);

        /**
         * post
         */
        Route::post('admin/slideshow/edit', [
            'as' => 'admin_slideshow.post',
            'uses' => 'Foostart\Slideshow\Controllers\Admin\SlideshowAdminController@post'
        ]);

        /**
         * delete
         */
        Route::get('admin/slideshow/delete', [
            'as' => 'admin_slideshow.delete',
            'uses' => 'Foostart\Slideshow\Controllers\Admin\SlideshowAdminController@delete'
        ]);
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////SAMPLES ROUTE///////////////////////////////
        ////////////////////////////////////////////////////////////////////////





        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////CATEGORIES///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
         Route::get('admin/slideshow_category', [
            'as' => 'admin_slideshow_category',
            'uses' => 'Foostart\Slideshow\Controllers\Admin\SlideshowCategoryAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/slideshow_category/edit', [
            'as' => 'admin_slideshow_category.edit',
            'uses' => 'Foostart\Slideshow\Controllers\Admin\SlideshowCategoryAdminController@edit'
        ]);

        /**
         * post
         */
        Route::post('admin/slideshow_category/edit', [
            'as' => 'admin_slideshow_category.post',
            'uses' => 'Foostart\Slideshow\Controllers\Admin\SlideshowCategoryAdminController@post'
        ]);
         /**
         * delete
         */
        Route::get('admin/slideshow_category/delete', [
            'as' => 'admin_slideshow_category.delete',
            'uses' => 'Foostart\Slideshow\Controllers\Admin\SlideshowCategoryAdminController@delete'
        ]);
        ////////////////////////////////////////////////////////////////////////
        ////////////////////////////CATEGORIES///////////////////////////////
        ////////////////////////////////////////////////////////////////////////
    });
});
