<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserConversationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $conversations = $user->conversations()
                              ->with('latestMessage.sender') // Charger le dernier message et son expéditeur
                              ->orderBy('last_reply_at', 'desc') // Trier par dernière réponse
                              ->paginate(10);
        return view('conversations.indexclient', compact('conversations')); // Vue client
    }

    public function show(Conversation $conversation)
    {
        // Vérifier que l'utilisateur authentifié est bien le propriétaire de la conversation
        if (Auth::id() !== $conversation->user_id) {
            abort(403, 'Accès non autorisé.');
        }
        $conversation->load('messages.sender'); // Charger tous les messages et leurs expéditeurs
        // Marquer les messages de l'admin comme lus par le client (logique à affiner)
         $conversation->messages()
                      ->where('sender_id', '!=', Auth::id()) // Messages envoyés par l'autre partie
                      ->where('is_read', false)
                      ->update(['is_read' => true, 'read_at' => now()]);

        return view('conversations.showclient', compact('conversation')); // Vue client
    }

    public function reply(Request $request, Conversation $conversation)
    {
         if (Auth::id() !== $conversation->user_id) {
            abort(403);
        }

        $request->validate(['body' => 'required|string|min:1']);

        $message = $conversation->messages()->create([
            'sender_id' => Auth::id(),
            'body' => $request->body,
            'is_read' => false, // Non lu par l'admin initialement
        ]);

        Log::info("UserConversationController@reply: Avant MAJ status conv #{$conversation->id}. Statut actuel: " . $conversation->status); // Log avant

$conversation->update([
    'last_reply_at' => now(),
    'status' => 'pending_admin' // Assurez-vous que c'est bien ça
]);

$conversation->refresh(); // Recharger depuis la BDD pour être sûr du statut après l'update

Log::info("UserConversationController@reply: Après MAJ status conv #{$conversation->id}. Nouveau statut: " . $conversation->status); // Log après

        return redirect()->route('conversations.show', $conversation)->with('success', 'Message envoyé.');
    }

    public function create()
    {  
        // On pourrait passer des sujets prédéfinis ou d'autres infos si nécessaire
        return view('conversations.create'); // Vue client pour nouvelle conversation
    }

    /**
     * Stocke une nouvelle conversation initiée par le client.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'subject' => 'required|string|max:255',
            'body' => 'required|string|min:5', // Premier message minimum 5 caractères
        ]);

        // Utiliser une transaction pour s'assurer que la conversation ET le message sont créés
        DB::beginTransaction();
        try {
            // Créer la conversation
            $conversation = Conversation::create([
                'user_id' => Auth::id(),
                'subject' => $validatedData['subject'],
                'status' => 'pending_admin', // L'admin doit répondre en premier
                'last_reply_at' => now(), // Mettre à jour la date
            ]);

            // Créer le premier message de la conversation
            $message = $conversation->messages()->create([
                'sender_id' => Auth::id(), // Le client envoie le premier message
                'body' => $validatedData['body'],
                'is_read' => false, // L'admin ne l'a pas encore lu
            ]);

            DB::commit(); // Valider la transaction

            // TODO: Envoyer une notification à l'admin (nouvelle conversation)

            // Rediriger vers la conversation nouvellement créée
            return redirect()->route('conversations.show', $conversation)
                         ->with('success', 'Votre nouvelle conversation a été démarrée. Nous vous répondrons bientôt.');

        } catch (\Exception $e) {
            DB::rollBack(); // Annuler en cas d'erreur
            Log::error('Erreur création nouvelle conversation par client ID ' . Auth::id() . ': ' . $e->getMessage());
            return redirect()->back()
                         ->with('error', 'Une erreur est survenue lors de la création de la conversation. Veuillez réessayer.')
                         ->withInput(); // Garder les données saisies
        }
    }
}
