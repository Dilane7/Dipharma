<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminConversationController extends Controller
{
    public function index(Request $request)
    {
         // Filtrage possible par statut, etc.
        $query = Conversation::with(['user', 'latestMessage.sender'])->orderBy('last_reply_at', 'desc');

        if($request->filled('status')) {
             $query->where('status', $request->status);
        }

        $conversations = $query->paginate(15);
        return view('conversations.indexadmin', compact('conversations')); // Vue Admin
    }

     public function show(Conversation $conversation)
    {
         $conversation->load('messages.sender', 'user'); // Charger messages, expéditeurs, et l'utilisateur client

         // Marquer les messages du client comme lus par l'admin (logique à affiner)
         $conversation->messages()
                      ->where('sender_id', $conversation->user_id) // Messages du client
                      ->where('is_read', false)
                      // Optionnel : ->where('receiver_id', Auth::id()) si vous assignez les messages à un admin spécifique
                      ->update(['is_read' => true, 'read_at' => now()]);


        return view('conversations.showadmin', compact('conversation')); // Vue Admin
    }

     public function reply(Request $request, Conversation $conversation)
    {
         $request->validate(['body' => 'required|string|min:1']);

         $message = $conversation->messages()->create([
            'sender_id' => Auth::id(), // L'admin connecté
            'body' => $request->body,
            'is_read' => false, // Non lu par le client initialement
        ]);

         // Mettre à jour la date de dernière réponse et le statut
         $conversation->update([
             'last_reply_at' => now(),
             'status' => 'pending_client' // Le client doit répondre ou lire
         ]);

         // TODO: Envoyer une notification au client

         return redirect()->route('admin.conversations.show', $conversation)->with('success', 'Réponse envoyée.');
    }

    // Méthodes pour close() et open() (changer le statut)
    public function close(Conversation $conversation) {
         $conversation->update(['status' => 'closed']);
         return redirect()->route('admin.conversations.index')->with('success', 'Conversation fermée.');
    }
    public function open(Conversation $conversation) {
         $conversation->update(['status' => 'open']); // Ou pending_client ?
         return redirect()->route('admin.conversations.show', $conversation)->with('success', 'Conversation réouverte.');
    }
}
