
@extends('base')
@section('content')
    <div class="bg-gray-100  flex items-center mt-24 justify-center py-10">
        <div class="container w-[75%] mx-auto px-4">
            <div class="bg-white shadow-md rounded-lg p-8 text-center">
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                    <p class="font-bold">Merci pour votre commande !</p>
                    <p>Votre commande a été enregistrée et est en attente de validation. Nous vous contacterons prochainement pour vous informer de son statut.</p>
                </div>
                <hr class="my-4">
                <p class="mb-4">Vous pouvez consulter l'historique de vos commandes dans votre espace personnel.</p>
                <a href="{{ route('products.indexClient') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded focus:outline-none focus:shadow-outline">Retour à l'accueil</a>
            </div>
        </div>
    </div>
@endsection