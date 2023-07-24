<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Invoice\InvoiceRepositoryInterface;
use App\Infrastructure\Repository\InvoiceRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(InvoiceRepositoryInterface::class, InvoiceRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
    }
}
