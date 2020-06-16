<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;


/* vendor>laravel>framework>src>illuminate>foundation>exception>handler */

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
     *
     * @throws \Exception
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
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    public function render($request, Exception $exception)
    {
        $class = get_class($exception);

        switch ($class) {
            case 'Illuminate\Auth\AuthenticationException':
                // Here bug is fixed for <<< array_get() >>>
                // Laravel 5.6 was $guard = array_get($exception->guards(), 0);
                // Laravel 6.x is  $guard = array($exception->guards(), 0);
                $guard = array($exception->guards(), 0);
                switch ($guard) {

                    // Go to Exception > Handler.php and config your guard and providers then come here

                    case 'admin':
                        $login = "admin.login";
                        break;
                    
                    /* -- DEMO GUARD -- */
                    /* case 'student':
                        $login = "student.login"; // this is demo guard if you add any new guard then add here 
                        break; */

                    /* case 'buyer':
                        $login = "buyer.login"; // this is demo guard if you add any new guard then add here 
                        break; */

                    /* case 'seller':
                        $login = "seller.login"; // this is demo guard if you add any new guard then add here 
                        break; */
                    /* -- DEMO GUARD -- */

                    case 'web':
                        $login = "login";
                        break;
                    
                    default:
                        $login = "login";
                        break;
                }
                return redirect()->route($login);
                break;
        }

        /* Custom 404 page Start */
        if ($this->isHttpException($exception)) {
            
            $code = $exception->getStatusCode();
            if ($code == '404') {
                
                return response()->view('frontend.pages.404');

            }
        }
        /* Custom 404 page End */

        return parent::render($request, $exception);
    }
}