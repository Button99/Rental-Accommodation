<?php

namespace App\Exceptions;

use Dotenv\Exception\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;
use Symfony\Component\HttpFoundation\Response;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
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

        $this->renderable(function (Throwable $e) {
            if($e instanceof HttpException) {
                return response()->json($e->getMessage(), Response::$statusTexts[$e->getStatusCode()]);
            }

            else if($e instanceof ModelNotFoundException) {
                return response()->json('Model does not exists!'. $e->getModel(), Response::HTTP_NOT_FOUND);
            }

            else if($e instanceof AuthorizationException) {
                return response()->json($e->getMessage(), Response::HTTP_FORBIDDEN);
            }

            else if($e instanceof TokenBlacklistedException) {
                return response()->json($e->getMessage(), Response::HTTP_UNAUTHORIZED);
            }

            else if($e instanceof AuthenticationException) {
                return response()->json($e->getMessage(), Response::HTTP_UNAUTHORIZED);
            }

            else if($e instanceof ValidationException) {
                return response()->json($e->getMessages(), Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        });
    }
}
