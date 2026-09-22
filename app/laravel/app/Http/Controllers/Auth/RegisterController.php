<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

  public function storeRegisterConfirm(Request $request)
{
    $request->validate([
        'store_name' => 'required|string|max:10',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|confirmed|min:8',
    ], [
        'store_name.required' => '店舗名を入力してください。',
        'store_name.max' => '店舗名は10文字以内で入力してください。',

        'email.required' => 'メールアドレスを入力してください。',
        'email.email' => '正しいメールアドレスを入力してください。',
        'email.max' => 'メールアドレスは255文字以内で入力してください。',
        'email.unique' => 'このメールアドレスはすでに登録されています。',

        'password.required' => 'パスワードを入力してください。',
        'password.min' => 'パスワードは8文字以上で入力してください。',
        'password.confirmed' => 'パスワード確認が一致していません。',
    ]);

    return view('auth.store_register_conf', [
        'store_name' => $request->store_name,
        'email' => $request->email,
        'password' => $request->password,
    ]);
}


public function storeRegister(Request $request)
{
    $user = User::create([
        'name' => $request->store_name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 1,
    ]);

    Auth::login($user);

    return redirect()->route('store-register.complete');
}

public function registerConfirm(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:10',
        'email' => 'required|email|max:255|unique:users,email',
        'password' => 'required|confirmed|min:8',
    ], [
        'name.required' => '名前を入力してください。',
        'name.max' => '名前は10文字以内で入力してください。',

        'email.required' => 'メールアドレスを入力してください。',
        'email.email' => '正しいメールアドレスを入力してください。',
        'email.max' => 'メールアドレスは255文字以内で入力してください。',
        'email.unique' => 'このメールアドレスはすでに登録されています。',

        'password.required' => 'パスワードを入力してください。',
        'password.min' => 'パスワードは8文字以上で入力してください。',
        'password.confirmed' => 'パスワード確認が一致していません。',
    ]);

    return view('auth.signup_conf', [
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password,
    ]);
}
protected function registered(Request $request, $user)
{
    return redirect()->route('signup.complete');
}
}
