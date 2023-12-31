<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Create a new controller instance.
     *
     * @return RedirectResponse
     */

    public function loginUrl(Request $request)
    {
        if (!$request->hasValidSignature()) {
            abort(401);
        }
        $user = Auth::loginUsingId($request->user_id);
        return redirect($request->url);
    }
    public function login(Request $request): RedirectResponse
    {   
        $input = $request->all();

        $messages = [
            'email.required' => 'Email belum di isi!',
            'email.email' => 'Email tidak valid, harus menyertakan @',
            'password.required' => 'Password belum di isi!'
        ];
        
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string',
        ], $messages);
     
        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->type == 'admin') {
                return redirect()->route('admin.dashboard');
            }else if (auth()->user()->type == 'superadmin') {
                return redirect()->route('superadmin.dashboard');
            }else{
                return redirect()->route('dashboard');
            }
        }else{
            return redirect()->back()->withErrors(
                [
                    'email' => 'Email atau password yang anda masukkan tidak cocok!'
                ]
            );
        }
          
    }
}
