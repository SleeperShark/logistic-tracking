<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {

        });

        $this->renderable(function (Throwable $e) {
            $errorContent = [
                'status' => 'error',
                'data'   => null,
            ];

            switch (get_class($e)) {
                case NotFoundHttpException::class:
                    $statusCode = 404;
                    $error      = [
                        'code'    => $statusCode,
                        'message' => $e->getMessage(),
                    ];

                    break;
                case ValidationException::class:
                    /** @var ValidationException $e */
                    $statusCode = 422;
                    $error      = [
                        'code'     => $statusCode,
                        'messages' => 'validationError',
                        'errors'   => $e->errors(),
                    ];

                    break;
                default:
                    $statusCode = 500;
                    $error      = [
                        'code'    => 500,
                        'message' => 'unknownError',
                        'error'   => $e->getMessage(),
                        'trace'   => $e->getTrace(),
                    ];
            }

            $errorContent['error'] = $error;

            return response($errorContent, $statusCode);
        });
    }
}
