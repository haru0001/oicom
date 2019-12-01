<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Auth;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('/');
    }

    // TwitterOAuth認証
    public function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    // 認証後コールバック
    public function handleProviderCallback(User $user)
    {
        try {
            $twitter_user = Socialite::driver('twitter')->user();
        } catch (Exception $e) {
            return redirect('/')->with('twitter_oatuh_error', 'ログインに失敗しました。再度やり直してください。');
        }

        // ユーザーが存在すれば更新、存在しなければ新規登録
        $user_info = $user->firstOrCreateUser($twitter_user);

        Auth::login($user_info);

        return redirect()->to('dashboard');
    }
}