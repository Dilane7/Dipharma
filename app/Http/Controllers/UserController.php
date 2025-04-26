<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    /**
     * Affiche la liste des utilisateurs avec leurs rôles (section administration).
     */
    public function adminIndex( Request $request): View
    {
        $search = $request->input('search');
        $users = User::with('roles')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(10)
            ->withQueryString(); // Conserve le terme de recherche dans les liens de pagination

        return view('users.index', compact('users', 'search')); // Assurez-vous que le chemin de la vue est correct
    }

    /**
     * Affiche le formulaire de création d'un nouvel utilisateur (section administration).
     */
    public function adminCreate(): View
    {
        $roles = Role::all();
        return view('users.create', compact('roles')); // Assurez-vous que le chemin de la vue est correct
    }

    public function adminStore(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'telephone' => 'nullable|string|max:20',
            'est_actif' => 'nullable|boolean',
            'photo' => 'nullable|image|max:2048', // Exemple de validation pour une image
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'roles' => 'nullable|array',
            'roles.*' => 'exists:roles,name',
        ]);

        $userData = $request->only(['name', 'telephone', 'est_actif', 'email']);
        $userData['password'] = Hash::make($request->password);

        if ($request->hasFile('photo')) {
            $userData['photo'] = $request->file('photo')->store('users', 'public'); // Stockage de l'image
        }

        $user = User::create($userData);

        if ($request->has('roles')) {
            $user->assignRole($request->roles);
        }

        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès.');
    }

    /**
     * Affiche les détails d'un utilisateur spécifique (section administration).
     */
    public function adminShow(User $user): View
    {
        $user->load('roles');
        return view('users.show', compact('user')); // Assurez-vous que le chemin de la vue est correct
    }

    /**
     * Affiche le formulaire d'édition d'un utilisateur spécifique (section administration).
     */
    public function adminEdit(User $user): View
    {
        $roles = Role::all();
        $user->load('roles');
        return view('users.edit', compact('user', 'roles')); // Assurez-vous que le chemin de la vue est correct
    }

    /**
     * Met à jour un utilisateur spécifique (section administration).
     */
    public function adminUpdate(Request $request, User $user): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'telephone' => 'nullable|string|max:20',
            'est_actif' => 'nullable|boolean',
            'photo' => 'nullable|image|max:2048',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
            'password' => 'nullable|string|min:8|confirmed',
            'roles' => 'nullable|array',
            'roles.*' => 'exists:roles,name',
        ]);

        $userData = $request->only(['name', 'telephone', 'est_actif', 'email']);

        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($user->photo && Storage::disk('public')->exists($user->photo)) {
                \Storage::disk('public')->delete($user->photo);
            }
            $userData['photo'] = $request->file('photo')->store('users', 'public');
        }

        $user->update($userData);

        $user->syncRoles($request->input('roles', []));

        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

    /**
     * Supprime un utilisateur spécifique (section administration).
     */
    public function adminDestroy(User $user): RedirectResponse
    {
        if ($user->id === auth()->id()) {
            return redirect()->route('users.index')->with('error', 'Vous ne pouvez pas supprimer votre propre compte.');
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
    }

    // Vous pouvez ajouter ici d'autres méthodes pour la gestion du profil utilisateur non-admin
    // comme afficher/modifier le profil, etc.
}