<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

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
        Response::macro('fail', function (string $message = 'Something went wrong', mixed $data = null, int $status = 500, ?string $code = null) {
            return response()->json([
                'status' => false,
                'errorMessage' => $message,
                'data' => $data,
                'internalCode' => $code,
            ], $status);
        });

        Response::macro('success', function (string $message = '', mixed $data = null, int $status = 200, ?string $code = null) {
            return response()->json([
                'status' => true,
                'message' => $message,
                'data' => $data,
                'internalCode' => $code,
            ], $status);
        });
    }
}
