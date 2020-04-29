<?php

namespace App\Providers;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;


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
        Schema::defaultStringLength(191);
        Blade::directive('currency', function ($expression) {
            return "Rp. <?php echo number_format($expression, 0, ',', '.'); ?>";
        });

        //membuat Gate diman Parameter pertama adalah name Gatenya
        //Dan Parameter Selanjutnya adalah Closure function
        //Dimana Kita melakukan pengecekan,jika user yang sedang login bernilai true, maka dia akan diizinkan
        Gate::define('isAdmin', function($user){
            return $user->role == 'admin';
        });

        Gate::define('isKasir', function($user){
            return $user->role == 'kasir';
        });

        Gate::define('isOwner', function($user){
            return $user->role == 'owner';
        });
        //
    }
}
