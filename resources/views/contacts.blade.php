@extends('base')
@section('title', 'Contacts - Pharmacie Dipharma')

@section('content')

<section>
    <div class="relative w-full my-10">
        <img src="{{ asset('assets/img/fun-bg.jpg') }}" alt="" class="object-cover h-80 w-full">
        <div class="bg-[#176abc]/70 text-white  h-80 absolute w-full top-0 z-1 flex justify-center items-center">
            <div class="animate-fadeInUp animate-delay-500">
                <h1 class="font-semibold text-4xl ">Contactez-nous</h1>
                <span class="flex justify-center gap-2 my-2">
                    <a href="index.html" class="hover:text-[#014c6e]">Acceuil</a> <span> >  Contacts</span>
                </span>
            </div>
        </div>
    </div>
</section>
{{-- Section Principale : Carte et Formulaire --}}
<section class=" mx-auto py-12 md:py-16 lg:py-20">
    {{-- Container principal --}}
    {{-- Remplacement de w-[75%] par container et gestion du layout avec Flexbox/Grid --}}
    <div class="container w-[75%] mx-auto px-4">
        {{-- Layout Flex pour side-by-side sur md+, empilé sur mobile --}}
        {{-- Ajout d'un fond, d'ombre et de coins arrondis au conteneur global --}}
        <div class="flex flex-col md:flex-row bg-white rounded-lg shadow-lg overflow-hidden border border-gray-100">

            {{-- Colonne Carte Google Maps --}}
            {{-- Prend toute la largeur sur mobile, la moitié sur md+ --}}
            {{-- Hauteur fixe sur mobile, prend la hauteur du parent sur md+ --}}
            <div class="w-full md:w-1/2 h-64 md:h-auto order-2 md:order-1">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1074.5703079058596!2d9.769857342793625!3d4.0874460131797!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10610c2cb25acddf%3A0xac32c10f4e1c059e!2sGabon%20Bar%2C%20Douala!5e0!3m2!1sfr!2scm!4v1743005724420!5m2!1sfr!2scm"
                    class="h-full w-full border-0" {{-- border-0 au lieu de style --}}
                    allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Carte de localisation de la pharmacie"> {{-- Ajout title pour accessibilité --}}
                </iframe>
            </div>

            {{-- Colonne Formulaire de Contact --}}
            {{-- Prend toute la largeur sur mobile, la moitié sur md+ --}}
            <div class="w-full md:w-1/2 p-6 sm:p-8 order-1 md:order-2">
                {{-- Formulaire --}}
                <form action="[URL_DE_TRAITEMENT_DU_FORMULAIRE]" method="POST"> {{-- Ajoutez action et method --}}
                    @csrf {{-- Important pour la sécurité Laravel --}}

                    <h1 class="text-2xl sm:text-3xl font-bold text-[#176abc] mb-2">Contactez-nous</h1>
                     {{-- Ligne décorative --}}
                    <img src="{{ asset('assets/img/Rectangle.png') }}" class="w-16 h-1 mb-4" alt="">
                    <p class="text-base text-gray-600 mb-6">Si vous avez des questions, n'hésitez pas à nous envoyer un message.</p>

                    <div class="space-y-4"> {{-- Espace vertical entre les groupes de champs --}}
                        {{-- Ligne Nom / Prénom --}}
                        <div class="flex flex-col sm:flex-row gap-4">
                            <div class="w-full sm:w-1/2">
                                <label for="nom" class="sr-only">Nom</label> {{-- Label pour accessibilité --}}
                                <input type="text" id="nom" name="nom" required
                                       class="w-full px-4 py-2.5 border border-gray-300 rounded-md shadow-sm focus:ring-[#44C244]/50 focus:border-[#44C244]/75 outline-none transition duration-150 ease-in-out"
                                       placeholder="Nom *">
                            </div>
                            <div class="w-full sm:w-1/2">
                                <label for="prenom" class="sr-only">Prénom</label>
                                <input type="text" id="prenom" name="prenom"
                                       class="w-full px-4 py-2.5 border border-gray-300 rounded-md shadow-sm focus:ring-[#44C244]/50 focus:border-[#44C244]/75 outline-none transition duration-150 ease-in-out"
                                       placeholder="Prénom">
                            </div>
                        </div>

                        {{-- Ligne Tel / Email --}}
                        <div class="flex flex-col sm:flex-row gap-4">
                            <div class="w-full sm:w-1/2">
                                <label for="tel" class="sr-only">Téléphone</label>
                                <input type="tel" id="tel" name="tel"
                                       class="w-full px-4 py-2.5 border border-gray-300 rounded-md shadow-sm focus:ring-[#44C244]/50 focus:border-[#44C244]/75 outline-none transition duration-150 ease-in-out"
                                       placeholder="Téléphone">
                            </div>
                            <div class="w-full sm:w-1/2">
                                 <label for="email" class="sr-only">Email</label>
                                <input type="email" id="email" name="email" required
                                       class="w-full px-4 py-2.5 border border-gray-300 rounded-md shadow-sm focus:ring-[#44C244]/50 focus:border-[#44C244]/75 outline-none transition duration-150 ease-in-out"
                                       placeholder="Email *">
                            </div>
                        </div>

                        {{-- Ligne Objet --}}
                        <div>
                            <label for="objet" class="sr-only">Objet</label>
                            <input type="text" id="objet" name="objet" required
                                   class="w-full px-4 py-2.5 border border-gray-300 rounded-md shadow-sm focus:ring-[#44C244]/50 focus:border-[#44C244]/75 outline-none transition duration-150 ease-in-out"
                                   placeholder="Objet *">
                        </div>

                        {{-- Ligne Message --}}
                        <div>
                            <label for="message" class="sr-only">Message</label>
                            <textarea name="message" id="message" rows="4" required {{-- rows ajusté --}}
                                      class="w-full px-4 py-2.5 border border-gray-300 rounded-md shadow-sm focus:ring-[#44C244]/50 focus:border-[#44C244]/75 outline-none transition duration-150 ease-in-out resize-none" {{-- resize-none optionnel --}}
                                      placeholder="Votre message *"></textarea>
                        </div>

                        {{-- Bouton Envoyer --}}
                        <div>
                            <button type="submit"
                                    class="w-full bg-[#44C244] text-white text-center rounded-md py-3 text-lg shadow-md font-bold hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors duration-200">
                                Envoyer le message
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

{{-- Section Blocs d'Informations de Contact --}}
<section class="py-12 md:py-16">
    {{-- Utilisation de grid pour la responsivité --}}
    <div class="container w-[75%] mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">

        {{-- Bloc Adresse --}}
        <div class="flex items-center bg-[#176abc] p-6 rounded-xl gap-4 shadow-md hover:shadow-lg transition-shadow duration-300">
            <img src="{{ asset('assets/img/location-sign.png') }}" alt="Icône localisation" class="w-10 h-10 flex-shrink-0">
            <div>
                <h3 class="text-white text-lg sm:text-xl font-semibold">Adresse</h3>
                <p class="text-white/90 text-sm sm:text-base">Logpom, Douala</p> {{-- Texte sur 2 lignes si besoin --}}
            </div>
        </div>

        {{-- Bloc Email --}}
        <div class="flex items-center bg-[#176abc] p-6 rounded-xl gap-4 shadow-md hover:shadow-lg transition-shadow duration-300">
            <img src="{{ asset('assets/img/email.png') }}" alt="Icône email" class="w-10 h-10 flex-shrink-0">
             <div>
                <h3 class="text-white text-lg sm:text-xl font-semibold">Email</h3>
                <a href="mailto:tsaguedilane7@gmail.com" class="text-white/90 text-sm sm:text-base hover:text-white break-all">tsaguedilane7@gmail.com</a> {{-- break-all pour les emails longs --}}
            </div>
        </div>

        {{-- Bloc Téléphone --}}
        <div class="flex items-center bg-[#176abc] p-6 rounded-xl gap-4 shadow-md hover:shadow-lg transition-shadow duration-300">
            <img src="{{ asset('assets/img/phone-call.png') }}" alt="Icône téléphone" class="w-10 h-10 flex-shrink-0">
             <div>
                <h3 class="text-white text-lg sm:text-xl font-semibold">Téléphone</h3>
                <a href="tel:+237695746380" class="text-white/90 text-sm sm:text-base hover:text-white">(+237) 695 74 63 80</a>
            </div>
        </div>

    </div>
</section>
@endsection
