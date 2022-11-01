<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {


     if(Auth::check())
     {

        $user =  Auth::user();

        if($user->id ==1 |$user->id ==2 | $user->id ==3){

            return redirect(route('admin'));

        }else{

      
            
            return response()->json([

                'message'=>'Access denied!',
    
            ],403);


        }


     }else{


        return response()->json([

            'status'=>401,
            'message'=>'plaese login first',

        ]);


     }





        
       
    }
}
