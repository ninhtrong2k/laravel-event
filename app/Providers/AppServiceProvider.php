<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191); // Fix data phiên bản cũ
        //
        User::creating(function($user){
            file_put_contents(base_path().'/logs.txt',$user->email);

        });
        User::created(function($user){
            file_put_contents(base_path().'/logs2.txt',$user->email);

        });
    }
}
