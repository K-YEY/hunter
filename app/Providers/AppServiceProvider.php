<?php

namespace App\Providers;

use App\Models\Constant;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       // Fetch email settings from constants table
       Config::set('mail.mailers.smtp.host', Constant::get('MAIL_HOST'));
       Config::set('mail.mailers.smtp.port', Constant::get('MAIL_PORT'));
       Config::set('mail.mailers.smtp.username', Constant::get('MAIL_USERNAME'));
       Config::set('mail.mailers.smtp.password', Constant::get('MAIL_PASSWORD'));
       Config::set('mail.mailers.smtp.encryption', Constant::get('MAIL_ENCRYPTION'));
       Config::set('mail.from.address', Constant::get('MAIL_FROM_ADDRESS'));
       Config::set('mail.from.name', Constant::get('MAIL_FROM_NAME'));
    }
}
