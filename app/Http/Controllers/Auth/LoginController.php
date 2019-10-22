<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/backend';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function loginMonTshirt(Request $request) {
        $email = $request->email;
        $password = $request->password;
        if(Auth::attempt(['email'=>$email,'password'=>$password])) {
            $user = Auth::user();
            if($user->hasRole('Administrateur')) {

                // return route(redirect('backend_homepage'));
                return redirect()->route('backend_homepage');

            }else {
                //si le user n est pas admin
                return redirect()->route('homepage');
            }
        }

        else {
           return redirect()->route('login')->with('notice','Impossible de vous identifier') ;

            }
}



public function loginProcess(Request $request)
{
    $email = $request->email;
    $password = $request->password;
    if (Auth::attempt(['email' => $email, 'password' => $password])) {
        $user = Auth::user();
        //  if($user->hasRole('Acheteur')) {
        return redirect()->route('commande_adresse');

    } else {

        return redirect()->route('commande_identification')->with('messages', 'impossible de vous identifier');
    }
}
}
