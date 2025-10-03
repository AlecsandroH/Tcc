<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ForumAuthController extends Controller
{
    /**
     * Mostra o formulário de login
     */
    public function showLoginForm()
    {
        // Se já estiver logado, redireciona para o fórum
        if (Auth::guard('forum')->check()) {
            return redirect()->route('forum.index');
        }
        
        return view('auth.forum-login');
    }

    /**
     * Processa o login
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'senha' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Forum::where('email', $request->email)->first();

        if ($user && Hash::check($request->senha, $user->senha)) {
            Auth::guard('forum')->login($user);
            $request->session()->regenerate();

            // Redireciona para o fórum após login
            return redirect()->route('forum.index')
                ->with('success', 'Login realizado com sucesso!');
        }

        return back()->withErrors([
            'email' => 'Credenciais inválidas.',
        ])->withInput($request->only('email'));
    }

    /**
     * Mostra o formulário de registro
     */
    public function showRegisterForm()
    {
        // Se já estiver logado, redireciona para o fórum
        if (Auth::guard('forum')->check()) {
            return redirect()->route('forum.index');
        }
        
        return view('auth.forum-register');
    }

    /**
     * Processa o registro
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:forums,email',
            'senha' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Forum::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => Hash::make($request->senha),
        ]);

        Auth::guard('forum')->login($user);

        return redirect()->route('forum.index')
            ->with('success', 'Conta criada com sucesso!');
    }

    /**
     * Processa o logout
     */
    public function logout(Request $request)
    {
        Auth::guard('forum')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Logout realizado com sucesso!');
    }
}