<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

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
         // View Composer để chia sẻ biến cartQuantity cho mọi view
        View::composer('*', function ($view) {
        $cartQuantity = CartItem::where('user_id', Auth::id())->sum('quantity');
        $view->with('cartQuantity', $cartQuantity);
    });
    }
}
