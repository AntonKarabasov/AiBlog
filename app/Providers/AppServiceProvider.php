<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(): void
    {
        Carbon::setLocale(config('app.locale'));
        Blade::directive('monthGenitive', function ($expression) {
            return "<?php echo ['января','февраля','марта','апреля','мая','июня','июля','августа','сентября','октября','ноября','декабря'][{$expression}->month - 1]; ?>";
        });
        Paginator::useBootstrap();
    }
}
