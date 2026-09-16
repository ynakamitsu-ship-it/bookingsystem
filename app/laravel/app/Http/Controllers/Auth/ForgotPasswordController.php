<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    use SendsPasswordResetEmails;

    // メール送信時のバリデーション
    protected function validateEmail(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
            ],
            [
                'email.required' => 'メールアドレスを入力してください。',
                'email.email' => '正しいメールアドレスを入力してください。',
            ]
        );
    }

    // メール送信成功後
    protected function sendResetLinkResponse(Request $request, $response)
    {
        return redirect()->route('password.reset.send.complete');
    }
}
