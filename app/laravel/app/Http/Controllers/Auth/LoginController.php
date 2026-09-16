<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';


    // ログイン時のバリデーション
    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => '正しいメールアドレスを入力してください。',
            'password.required' => 'パスワードを入力してください。',
        ]);
    }


    // ログイン成功後の処理
    protected function authenticated(Request $request, $user)
    {
        // 利用停止ユーザー
        if ($user->del_flg == 1) {
            auth()->logout();

            return redirect()->route('error');
        }

        // 管理者
        if ($user->role == 2) {
            return redirect('/admin_main');
        }

        // 旅館運営ユーザー
        if ($user->role == 1) {
            return redirect('/inn_main');
        }

        // 一般ユーザー
        return redirect('/home');
    }
protected function sendFailedLoginResponse(Request $request)
{
    throw \Illuminate\Validation\ValidationException::withMessages([
        'email' => ['メールアドレスまたはパスワードが正しくありません。'],
    ]);
}

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
