<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\models\Contact;
use Illuminate\Support\Str;

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
        //
        view()->composer("admin.includes.topNavigation",function($view){
            $counts= Contact::where('read_at',0)->count();
           $message = Contact::where('read_at', 0)->get(); 
            $view->with('unread',$counts)->with('message',$message);
            
        });
        Paginator::useBootstrap();

    }


}
