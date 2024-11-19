<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Rules\UniversityEmail;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users', new UniversityEmail],
             'grade' => [
                'required',
                'string',
                'in:1,2,3,4'
            ],
            
            'password' => [
                'required',
                'confirmed',
                Rules\Password::defaults()
            ],
             ], [
            // カスタムエラーメッセージ
            'name.required' => '氏名を入力してください',
            'name.max' => '氏名は255文字以内で入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => '有効なメールアドレスを入力してください',
            'email.unique' => 'このメールアドレスは既に使用されています',
            'grade.required' => '学年を選択してください',
            'grade.in' => '有効な学年を選択してください',
            'password.required' => 'パスワードを入力してください',
            'password.confirmed' => 'パスワードが確認用と一致しません',
        ]);
        
        try{

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'grade' => $request->grade,
            'password' => Hash::make($request->password),
            'authority' => false,
            
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('toppage'));
        
     } catch (\Exception $e) {
            return back()
                ->withInput()
                ->withErrors(['error' => '登録処理中にエラーが発生しました。もう一度お試しください。']);
    }
 }
}
