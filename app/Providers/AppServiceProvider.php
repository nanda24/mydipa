<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\DipaMenu;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

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
        View::composer('*', function ($view) {
            if (Auth::check()) {
                $user = Auth::user();
    
                $sidebarMenus = DipaMenu::with('children')
                    ->whereNull('parent_id')
                    ->where('is_active', true)
                    ->whereHas('roles', function ($query) use ($user) {
                        $query->whereIn('roles.id', $user->roles->pluck('id')); // fixed here
                    })
                    ->orderBy('order_index')
                    ->get();
    
                $view->with('sidebarMenus', $sidebarMenus);
            }
        });
    }
}
