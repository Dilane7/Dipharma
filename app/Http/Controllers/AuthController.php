<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Affiche le formulaire d'enregistrement.
     */
    public function showRegistrationForm(): View
    {
        return view('auth.register');

    }

     /**
     * Enregistre un nouvel utilisateur et le redirige vers la page de connexion.
     */
    public function register(RegisterRequest $request): RedirectResponse
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'est_actif' => 1, // Par défaut, l'utilisateur est actif
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole('client');

        // Ne pas connecter automatiquement l'utilisateur
        // Auth::login($user);
        // return redirect()->intended('/dashboard');

        // Rediriger vers la page de connexion avec un message de succès facultatif
        return redirect()->route('login')->with('success', 'Votre compte a été créé avec succès !');
    }

    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    /**
     * Connecte un utilisateur existant.
     */
    public function login(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();
        $remember = $request->boolean('remember'); // Récupère la valeur du "se souvenir de moi"


        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->hasRole('admin') || $user->hasRole('employe')) {
                // Si admin ou employe, redirige vers le dashboard admin/employe
                // intended() est bien ici : si l'utilisateur essayait d'accéder à une page protégée avant login, il y sera redirigé.
                // Sinon, il ira vers 'welcomeAdmin'.
                return redirect()->intended(route('dashboard'));
            }  elseif ($user->hasRole('client')) {
                // Si client, redirige vers la page d'accueil client
                // Change 'welcome' par le nom de ta route pour l'accueil client si différent
                // Tu peux aussi rediriger vers '/' ou une route 'client.dashboard' etc.
                return redirect()->intended(route('products.indexClient')); // Utilise le nom de ta route d'accueil principale/client

            } else {
                // Fallback (au cas où un utilisateur connecté n'aurait aucun des rôles attendus)
                // Redirige vers une page par défaut pour les connectés ou la page d'accueil
                 return redirect()->intended(route('welcome')); // Ou une route 'dashboard' générique
            }
        }


        return back()->withErrors([
            'email' => 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.',
        ])->onlyInput('email');
    }

    /**
     * Déconnecte l'utilisateur actuel.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

