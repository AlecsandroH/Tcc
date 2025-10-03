<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ForumPasswordController extends Controller
{
    /**
     * Mostra o formulário de redefinição de senha
     */
    public function showResetForm()
    {
        return view('auth.reset-password');
    }

    /**
     * Processa a redefinição de senha
     */
    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:forums,email',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'email.exists' => 'Não encontramos uma conta com este email.',
            'password.min' => 'A senha deve ter pelo menos 6 caracteres.',
            'password.confirmed' => 'As senhas não coincidem.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Encontra o usuário pelo email
        $user = Forum::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()
                ->withErrors(['email' => 'Usuário não encontrado.'])
                ->withInput();
        }

        // Atualiza a senha
        $user->update([
            'senha' => Hash::make($request->password),
        ]);

        return redirect()->route('forum.login')
            ->with('success', 'Senha redefinida com sucesso! Faça login com sua nova senha.');
    }
}