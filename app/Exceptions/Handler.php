<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<string>
     */
    protected $dontReport = [
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<string>
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
        });

        $this->renderable(function (ClaimNotFoundException $e, $request) {
            return response()->view('claim-not-found', ['copy' => $e->getMessage()]);
        });

        $this->renderable(function (ClaimTakenException $e, $request) {
            return response()->view('claim-taken', ['copy' => $e->getMessage()]);
        });
    }
}
