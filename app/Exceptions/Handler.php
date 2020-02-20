<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Illuminate\Session\TokenMismatchException;

use Session;
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
        //     // if ($exception instanceof \Spatie\Permission\Exceptions\UnauthorizedException) {
        //     //     return \Response::view('errors.403',array(),403);
        //     // }
        //     if ($exception instanceof TokenMismatchException){
        //         // Redirect to a form. Here is an example of how I handle mine
        //         Session::flash('error','Your Session has expired. Please login again');
        //         return  redirect()->to('/login');
        //     }
        //    if ($this->isHttpException($exception)) {
         
        //     if($exception instanceof MethodNotAllowedHttpException)
        //     {
        //       return redirect()->to('dashboard');
        //     }else{
        //     switch ($exception->getStatusCode()) {
    
        //         // not authorized
        //         case '403':
        //             return \Response::view('errors.403',array(),403);
        //             break;
    
        //         // not found
        //         case '404':
        //             return \Response::view('errors.404',array(),404);
        //             break;
    
        //         // internal error
        //         case '500':
        //             return \Response::view('errors.500',array(),500);
        //             break;
    
        //     }
        // }
        // }else {

        //     return parent::render($request, $exception);
        //  }
       return parent::render($request, $exception);
    }
}
