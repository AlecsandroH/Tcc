<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ForumProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:forum');
    }

    public function show()
    {
        $user = Auth::guard('forum')->user();
        return view('forum.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::guard('forum')->user();

        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'email' => 'required|email|unique:forums,email,' . $user->id,
            'bio' => 'nullable|string|max:500',
            'avatar' => 'nullable|image|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'nome' => $request->nome,
            'email' => $request->email,
            'bio' => $request->bio,
        ];

        // Upload de avatar
        if ($request->hasFile('avatar')) {
            // Deletar avatar antigo se existir
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }

            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = $avatarPath;
        }

        $user->update($data);

        return redirect()->route('forum.profile')->with('success', 'Perfil atualizado com sucesso!');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::guard('forum')->user();

        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Verificar senha atual
        if (!Hash::check($request->current_password, $user->senha)) {
            return redirect()->back()
                ->withErrors(['current_password' => 'Senha atual incorreta.'])
                ->withInput();
        }

        // Atualizar senha
        $user->update([
            'senha' => Hash::make($request->new_password),
        ]);

        return redirect()->route('forum.profile')->with('success', 'Senha alterada com sucesso!');
    }

    public function deleteAvatar()
    {
        $user = Auth::guard('forum')->user();

        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
            $user->update(['avatar' => null]);
        }

        return redirect()->route('forum.profile')->with('success', 'Foto de perfil removida!');
    }
}