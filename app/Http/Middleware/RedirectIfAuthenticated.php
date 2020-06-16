<?php

namespace App\Http\Middleware;

/* use App\Providers\RouteServiceProvider; */
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    //This is default system.
    /* public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    } */

    public function handle($request, Closure $next, $guard = null)
    {

        switch ($guard) {

            /**
             * If you want to redirect others 
             * 
             * like - student/teacher/worker/employee etc then add same process 
             * 
            */
            case 'admin':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('admin.index'); // Admin dashboard page
                    /* return redirect('/admin'); */ // customized by developer
                }
                break;

            case 'web':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('user.dashboard');
                }
                break;

            /* case 'demo-guard': // Your demo guard .. it can be student,teacher,worker,headmaster, etc....
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('where you want to redirect');
                }
                break; */


            
            // It will redirect user to user.dashboard page. when anyone or Admin put like Projectname/admin/login/
            // So it must be off for your purpose.
            /* default:
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('user.dashboard');
                }
                break; */
        }

        // FOR DEFAULT < USER/guest > REDIRECT ROUTE  you can use or you can't its your wish.
        /* if (Auth::guard($guard)->check()) {
            return redirect('/');
        } */

        return $next($request);
    }
}