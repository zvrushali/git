<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
<<<<<<< HEAD
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
=======
>>>>>>> d1cb5ffb453ba83f73b8ec0964c6d505c698d739
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
<<<<<<< HEAD
        return parent::render($request, $exception);
=======
          if ($exception instanceof \Spatie\Permission\Exceptions\UnauthorizedException) {
        return response()->json(['User have not permission for this page access.']);
    }
 
    return parent::render($request, $exception);
>>>>>>> d1cb5ffb453ba83f73b8ec0964c6d505c698d739
    }
}
