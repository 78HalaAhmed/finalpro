<?php

namespace App\Providers;

use App\Models\Contact;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use PhpParser\Node\Expr\BinaryOp\Concat;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        view()->composer('includes.nav',function($message){
        $readmeasge=Contact::where("unreadmessage",0)->orderBy('created_at','desc')->get();
        $message->with("readmeasge", $readmeasge);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapThree();
        view()->composer("includes.nav",function($view){
            $msgcount=Contact::where("unreadmessage",0)->count();
            $view->with("unread",$msgcount);
        });
    }
}
