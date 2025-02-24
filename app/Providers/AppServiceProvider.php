<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Specialty;
use Illuminate\Support\Facades\View;

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
        //Chia sẻ dữ liệu cho các view khác có chứa footer
        /* Khi các dữ view khác đã có specialties thì sẽ ưu tiên
        dùng biến của các view rôi mới tới dữ liệu được chia sẻ */
        View::composer('clients.components.footer', function ($view) {
            $view->with('specialtiess', Specialty::latest()->take(5)->get());
        });
    }
}
