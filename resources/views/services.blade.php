@extends('base')
@section('title', 'Nos Services - Pharmacie Dipharma')

@section('content')


<section class="bg-gradient-to-r mt-24 from-[#176abc] to-[#135a9e] text-white py-12 md:py-20 overflow-hidden">
    <div class="container mx-auto px-6 text-center relative z-10">
        <h1 class="text-3xl md:text-5xl font-bold mb-4 animate-fadeInUp">
            Des Services Pensés Pour Vous
        </h1>
        <p class="text-lg md:text-xl text-white/90 max-w-3xl mx-auto mb-8 animate-fadeInUp animation-delay-200"> {{-- Délai --}}
            Découvrez comment Dipharma vous accompagne au quotidien avec une gamme complète de services adaptés à vos besoins.
        </p>
         <div class="flex flex-col sm:flex-row justify-center gap-4 animate-fadeInUp animation-delay-500">
            <a href="{{ route('products.indexClient') }}" class="inline-block bg-white text-[#176abc] font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-[#135a9e] focus:ring-white transition-all duration-300 hover:scale-105 active:scale-95">
                Explorer nos Produits
            </a>
            <a href="{{ route('contacts') }}" class="inline-block bg-transparent border-2 border-white text-white font-semibold px-6 py-3 rounded-lg hover:bg-white hover:text-[#176abc] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-[#135a9e] focus:ring-white transition-all duration-300 hover:scale-105 active:scale-95">
                Nous Contacter
            </a>
        </div>
    </div>
</section>

{{-- Section Principale des Services --}}
<section class="py-16  md:py-24 bg-white">
    <div class="container w-[75%] mx-auto px-6">
        <div class="text-center mb-12 md:mb-16">
             {{-- Animation possible ici aussi (ex: data-aos="fade-down") --}}
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Notre Offre de Services</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Que ce soit en ligne ou en officine, nous mettons tout en œuvre pour faciliter votre accès aux soins et au bien-être.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            {{-- Service 1: Vente en Ligne & Click & Collect --}}
            {{-- Animation au défilement (ex: data-aos="fade-up" data-aos-delay="100") --}}
            {{-- Ajout de transition et effets hover --}}
            <div class="bg-gray-50 p-6 rounded-lg shadow-sm border border-gray-100 flex flex-col items-center text-center transition-all duration-300 ease-in-out hover:shadow-xl hover:-translate-y-2 group">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-blue-100 text-[#176abc] mb-4 transition-transform duration-300 group-hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Vente en Ligne & Click and Collect</h3>
                <p class="text-sm text-gray-600 flex-grow">
                    Parcourez notre catalogue, commandez vos produits 24/7, et choisissez la livraison ou le retrait rapide en officine.
                </p>
                <p class="mt-3 text-xs text-gray-400">*Conformément à la réglementation.</p>
            </div>

            {{-- Service 2: Livraison à Domicile --}}
            {{-- Animation au défilement (ex: data-aos="fade-up" data-aos-delay="200") --}}
            <div class="bg-gray-50 p-6 rounded-lg shadow-sm border border-gray-100 flex flex-col items-center text-center transition-all duration-300 ease-in-out hover:shadow-xl hover:-translate-y-2 group">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-orange-100 text-orange-500 mb-4 transition-transform duration-300 group-hover:scale-110">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                       <path d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" />
                       <path stroke-linecap="round" stroke-linejoin="round" d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2l1.06.06a1 1 0 01.94 1.88l-2.708 1.445a1 1 0 01-1.292-.864z" />
                     </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Livraison Rapide à Domicile</h3>
                <p class="text-sm text-gray-600 flex-grow">
                    Recevez vos commandes directement chez vous dans les meilleurs délais. Zone : Douala.
                </p>
            </div>

            {{-- Service 3: Conseils Pharmaceutiques --}}
             {{-- Animation au défilement (ex: data-aos="fade-up" data-aos-delay="300") --}}
             <div class="bg-gray-50 p-6 rounded-lg shadow-sm border border-gray-100 flex flex-col items-center text-center transition-all duration-300 ease-in-out hover:shadow-xl hover:-translate-y-2 group">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-green-100 text-green-600 mb-4 transition-transform duration-300 group-hover:scale-110">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                       <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                     </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Conseils Personnalisés</h3>
                <p class="text-sm text-gray-600 flex-grow">
                    Nos pharmaciens répondent à vos questions sur vos traitements et votre santé, en ligne ou en officine.
                </p>
            </div>

             {{-- Service 4: Gestion de Stock --}}
             {{-- Animation au défilement (ex: data-aos="fade-up" data-aos-delay="100") --}}
             <div class="bg-gray-50 p-6 rounded-lg shadow-sm border border-gray-100 flex flex-col items-center text-center transition-all duration-300 ease-in-out hover:shadow-xl hover:-translate-y-2 group">
                 <div class="flex items-center justify-center w-16 h-16 rounded-full bg-purple-100 text-purple-600 mb-4 transition-transform duration-300 group-hover:scale-110">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                       <path stroke-linecap="round" stroke-linejoin="round" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7l8-4 8 4m0 10c0 2.21-3.582 4-8 4s-8-1.79-8-4" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Disponibilité Optimisée</h3>
                <p class="text-sm text-gray-600 flex-grow">
                    Notre gestion digitalisée assure la disponibilité de vos produits essentiels et réduit les ruptures de stock.
                </p>
            </div>

            {{-- Service 5: Facturation Simplifiée --}}
             {{-- Animation au défilement (ex: data-aos="fade-up" data-aos-delay="200") --}}
            <div class="bg-gray-50 p-6 rounded-lg shadow-sm border border-gray-100 flex flex-col items-center text-center transition-all duration-300 ease-in-out hover:shadow-xl hover:-translate-y-2 group">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-yellow-100 text-yellow-600 mb-4 transition-transform duration-300 group-hover:scale-110">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Facturation Claire</h3>
                <p class="text-sm text-gray-600 flex-grow">
                    Factures détaillées accessibles depuis votre compte ou générées facilement en officine.
                </p>
            </div>

             {{-- Service 6: Confidentialité & Sécurité --}}
             {{-- Animation au défilement (ex: data-aos="fade-up" data-aos-delay="300") --}}
            <div class="bg-gray-50 p-6 rounded-lg shadow-sm border border-gray-100 flex flex-col items-center text-center transition-all duration-300 ease-in-out hover:shadow-xl hover:-translate-y-2 group">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-red-100 text-red-600 mb-4 transition-transform duration-300 group-hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Confidentialité & Sécurité</h3>
                <p class="text-sm text-gray-600 flex-grow">
                    Vos informations personnelles et de santé sont traitées avec la plus grande confidentialité.
                </p>
            </div>
        </div>
    </div>
</section>

{{-- Section "Comment ça marche ?" (Optionnelle) --}}
<section class="py-16 md:py-24 bg-blue-50"> {{-- Changement couleur fond --}}
    <div class="container w-[75%] mx-auto px-6">
         <div class="text-center mb-12 md:mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Commander en Ligne : C'est Simple !</h2>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 text-center">
             {{-- Étape 1 --}}
             {{-- Animation au défilement (ex: data-aos="zoom-in" data-aos-delay="100") --}}
             <div class="relative p-4 transition-transform duration-300 hover:scale-105">
                <div class="flex flex-col items-center">
                    <div class="flex items-center justify-center w-12 h-12 rounded-full bg-[#176abc] text-white font-bold text-xl mb-3 z-10 shadow-lg">1</div>
                    <h4 class="font-semibold mb-1 text-gray-700">Parcourir</h4>
                    <p class="text-xs text-gray-500">Trouvez vos produits via catalogue ou recherche.</p>
                </div>
                {{-- Ligne de connexion --}}
                <div class="hidden md:block absolute top-6 left-1/2 w-full h-0.5 bg-gray-300 -z-0"></div>
            </div>
             {{-- Étape 2 --}}
             {{-- Animation au défilement (ex: data-aos="zoom-in" data-aos-delay="200") --}}
            <div class="relative p-4 transition-transform duration-300 hover:scale-105">
                <div class="flex flex-col items-center">
                    <div class="flex items-center justify-center w-12 h-12 rounded-full bg-[#176abc] text-white font-bold text-xl mb-3 z-10 shadow-lg">2</div>
                    <h4 class="font-semibold mb-1 text-gray-700">Ajouter</h4>
                    <p class="text-xs text-gray-500">Ajoutez les articles souhaités à votre panier.</p>
                 </div>
                 <div class="hidden md:block absolute top-6 left-0 w-full h-0.5 bg-gray-300 -z-0"></div>
            </div>
             {{-- Étape 3 --}}
             {{-- Animation au défilement (ex: data-aos="zoom-in" data-aos-delay="300") --}}
             <div class="relative p-4 transition-transform duration-300 hover:scale-105">
                <div class="flex flex-col items-center">
                    <div class="flex items-center justify-center w-12 h-12 rounded-full bg-[#176abc] text-white font-bold text-xl mb-3 z-10 shadow-lg">3</div>
                    <h4 class="font-semibold mb-1 text-gray-700">Valider</h4>
                    <p class="text-xs text-gray-500">Vérifiez et validez votre commande en toute sécurité.</p>
                 </div>
                 <div class="hidden md:block absolute top-6 left-0 w-full h-0.5 bg-gray-300 -z-0"></div>
            </div>
             {{-- Étape 4 --}}
             {{-- Animation au défilement (ex: data-aos="zoom-in" data-aos-delay="400") --}}
             <div class="relative p-4 transition-transform duration-300 hover:scale-105">
                <div class="flex flex-col items-center">
                    <div class="flex items-center justify-center w-12 h-12 rounded-full bg-[#176abc] text-white font-bold text-xl mb-3 z-10 shadow-lg">4</div>
                    <h4 class="font-semibold mb-1 text-gray-700">Recevoir</h4>
                    <p class="text-xs text-gray-500">Choisissez livraison ou retrait en pharmacie.</p>
                 </div>
            </div>
        </div>
    </div>
</section>


{{-- Section Contact Rapide --}}
<section class="bg-[#176abc] mx-0 px-0  boder-b border-1 border-white text-white py-12 md:py-16">
     <div class="container mx-auto px-6 text-center">
         {{-- Animation possible ici (ex: data-aos="fade") --}}
        <h2 class="text-2xl md:text-3xl font-semibold mb-6">Une question ? Besoin d'aide ?</h2>
        <p class="text-lg text-white/90 mb-8 max-w-xl mx-auto">
            Notre équipe est là pour vous assister. Contactez-nous ou visitez-nous en officine.
        </p>
        {{-- Effet de survol ajouté --}}
        <a href="{{ route('contacts') }}" class="inline-block bg-white text-[#176abc] font-semibold px-8 py-3 rounded-lg shadow-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-[#176abc] focus:ring-white transition-all duration-300 hover:scale-105 active:scale-95">
            Nous Contacter
        </a>
    </div>
</section>





@endsection
