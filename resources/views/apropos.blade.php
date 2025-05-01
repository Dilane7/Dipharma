@extends('base')

@section('title', 'À Propos de Nous - Pharmacie Dipharma')
@section('content')


    {{-- Section Hero (Optionnelle - Bannière simple) --}}
<section class="bg-gradient-to-r from-[#176abc] mt-24 to-[#135a9e] text-white py-12 md:py-20">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-3xl md:text-5xl animate-fadeInUp font-bold mb-4">Votre Santé, Notre Priorité</h1>
        <p class="text-lg md:text-xl animate-fadeInUp text-white/90 max-w-3xl mx-auto">
            Découvrez comment Dipharma allie expertise pharmaceutique traditionnelle et innovation numérique pour mieux vous servir.
        </p>
    </div>
</section>

{{-- Section Principale "À Propos" --}}
<section class="py-16 md:py-24 bg-white">
    <div class="container w-[75%] mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

            {{-- Colonne Texte --}}
            <div class="animate-fadeInleft animate-delay-500">
                {{-- Remplacez par une image réelle de votre pharmacie ou une image représentative --}}
                {{-- Titre --}}
                <span class="text-sm font-semibold text-[#176abc] uppercase tracking-wider mb-2 block">Qui sommes-nous ?</span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">
                    Bienvenue chez Dipharma
                </h2>

                <div class="text-gray-600 space-y-4 text-base md:text-lg leading-relaxed">
                    <p>
                        Située au cœur de Douala, Dipharma est bien plus qu'une simple pharmacie. Depuis de nombreuses années, nous sommes un pilier de confiance pour la santé et le bien-être de notre communauté. Notre mission a toujours été claire : offrir des soins pharmaceutiques de la plus haute qualité, accompagnés de conseils personnalisés et d'une écoute attentive.
                    </p>
                    <p>
                        Nous croyons fermement qu'un accès facilité aux médicaments et aux produits de santé est essentiel. C'est pourquoi nous avons entrepris ce projet de digitalisation. Notre objectif est de combiner la chaleur et l'expertise de notre service en officine avec la commodité et l'accessibilité offertes par la technologie moderne.
                    </p>
                    <p>
                        Que vous nous rendiez visite physiquement ou via notre nouvelle plateforme en ligne, vous trouverez toujours une équipe dévouée, prête à répondre à vos questions et à vous guider vers les solutions les mieux adaptées à vos besoins.
                    </p>
                </div>
            </div>

            {{-- Colonne Image --}}
            <div class="mt-8 lg:mt-0 animate-fadeInright animate-delay-500">
                {{-- Image de la pharmacie ou de l'équipe --}}
                {{-- Remplacez par une image réelle de votre pharmacie ou une image représentative --}}
                <img src="{{ asset('assets/img/interior.png') }}" alt="Intérieur de Dipharma" class="rounded-lg shadow-xl object-cover w-full h-full aspect-video">
                 {{-- Ou : <img src="{{ asset('assets/img/team-photo.jpg') }}" alt="L'équipe de [Nom de Votre Pharmacie]"> --}}
            </div>

        </div>
    </div>
</section>

{{-- Section Valeurs/Mission --}}
<section class="py-16 md:py-24 bg-gray-50">
    <div class="container w-[75%] mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Notre Engagement</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Nos valeurs guident chacune de nos actions, en ligne comme en officine.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            {{-- Valeur 1 --}}
            <div class="text-center p-6 bg-white rounded-lg shadow-md border border-gray-100 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-blue-100 text-[#176abc] mx-auto mb-4">
                    {{-- Icône SVG ou image --}}
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Conseil Expert</h3>
                <p class="text-sm text-gray-600">Des pharmaciens qualifiés à votre écoute pour vous guider.</p>
            </div>
             {{-- Valeur 2 --}}
            <div class="text-center p-6 bg-white rounded-lg shadow-md border border-gray-100 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-green-100 text-green-600 mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Qualité & Confiance</h3>
                <p class="text-sm text-gray-600">Sélection rigoureuse de produits et respect des normes.</p>
            </div>
             {{-- Valeur 3 --}}
            <div class="text-center p-6 bg-white rounded-lg shadow-md border border-gray-100 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-orange-100 text-orange-500 mx-auto mb-4">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Accessibilité</h3>
                <p class="text-sm text-gray-600">Faciliter l'accès à la santé grâce à nos services en ligne et en officine.</p>
            </div>
            {{-- Valeur 4 --}}
            <div class="text-center p-6 bg-white rounded-lg shadow-md border border-gray-100 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-purple-100 text-purple-600 mx-auto mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">Bienveillance</h3>
                <p class="text-sm text-gray-600">Un accueil chaleureux et un service attentionné pour chaque patient.</p>
            </div>
        </div>
    </div>
</section>

{{-- Section L'équipe (Optionnelle) --}}
<section class="py-16 md:py-24 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Rencontrez Notre Équipe</h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">Des professionnels passionnés et dédiés à votre santé.</p>
        </div>

        {{-- Mettre ici une photo de l'équipe ou des profils individuels --}}
        <div class="flex justify-center">
             <div class="bg-gray-200 w-full max-w-4xl h-64 md:h-96 rounded-lg flex items-center justify-center text-gray-500">
                 <img src="{{ asset('assets/img/equipe1.jpg') }}" alt="" class="w-full h-full object-cover rounded-lg">
             </div>
        </div>
        <p class="text-center text-gray-600 mt-6 italic text-sm">
            Notre équipe est composée de pharmaciens diplômés, de préparateurs(trices) en pharmacie expérimenté(e)s et d'un personnel d'accueil dévoué, tous unis par le même objectif : prendre soin de vous.
        </p>
    </div>
</section>

{{-- Section Appel à l'Action (Optionnel) --}}
<section class="bg-gradient-to-r from-[#135a9e] to-[#176abc] text-white py-12 md:py-16">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-2xl md:text-3xl font-semibold mb-6">Prêt à découvrir la simplicité ?</h2>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="{{ route('products.indexClient') }}" class="inline-block bg-white text-[#176abc] font-semibold px-6 py-3 rounded-lg shadow-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-[#135a9e] focus:ring-white transition-colors duration-200">
                Explorer nos Produits
            </a>
            <a href="{{ route('contacts') }}" class="inline-block bg-transparent border-2 border-white text-white font-semibold px-6 py-3 rounded-lg hover:bg-white hover:text-[#176abc] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-[#135a9e] focus:ring-white transition-colors duration-200">
                Nous Contacter
            </a>
        </div>
    </div>
</section>





@endsection
