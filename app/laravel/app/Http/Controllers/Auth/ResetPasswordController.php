<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = '/password/reset/complete';

    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8|max:20|confirmed',
        ];
    }

    protected function validationErrorMessages()
    {
        return [
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => '正しいメールアドレスを入力してください。',

            'password.required' => 'パスワードを入力してください。',
            'password.min' => 'パスワードは8文字以上で入力してください。',
            'password.max' => 'パスワードは20文字以内で入力してください。',
            'password.confirmed' => 'パスワードが一致していません。',
        ];
    }

    protected function sendResetResponse(Request $request, $response)
    {
        Auth::logout();

        return redirect('/password/reset/complete');
    }
}