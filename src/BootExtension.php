<?php

namespace Jblv\Admin\Reporter;

use Jblv\Admin\Admin;

trait BootExtension
{
    public static function boot()
    {
        static::registerRoutes();

        static::importAssets();

        Admin::extend('reporter', __CLASS__);
    }

    /**
     * Register routes for daimakuai-ext.
     *
     * @return void
     */
    protected static function registerRoutes()
    {
        parent::routes(function ($router) {
            /* @var \Illuminate\Routing\Router $router */
            $router->resource('exceptions', 'Jblv\Admin\Reporter\ExceptionController');
        });
    }

    /**
     * {@inheritdoc}
     */
    public static function import()
    {
        parent::createMenu('Exception Reporter', 'exceptions', 'fa-bug');

        parent::createPermission('Exceptions reporter', 'ext.reporter', 'exceptions*');
    }

    public static function importAssets()
    {
        Admin::js('/vendor/daimakuai-ext-reporter/prism/prism.js');
        Admin::css('/vendor/daimakuai-ext-reporter/prism/prism.css');
    }
}
