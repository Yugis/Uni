<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
    * Bootstrap any application services.
    *
    * @return void
    */
    public function boot()
    {
        view()->composer('layouts.app', function($view) {
            if(! \Auth::guard('web')->check()) return;
            $user = \Auth::user();
            $quizzes = \App\Quiz::getActiveQuiz();
            $view->with('quizzes', $quizzes);
        });
    }

    /**
    * Register any application services.
    *
    * @return void
    */
    public function register()
    {
        //
    }
}
