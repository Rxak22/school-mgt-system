<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $ex)
    {
        if ($this->isHttpException($ex)) {
            if ($ex->getStatusCode() == 404) {
                return response()->view('error.404', [], 404);
            } elseif ($ex->getStatusCode() == 500) {
                return response()->view('error.500', [], 500);
            }
        }

        // Default behavior for non-HTTP exceptions
        return parent::render($request, $ex);
    }

}
