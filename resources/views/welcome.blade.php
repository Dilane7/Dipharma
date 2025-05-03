@extends('base')
@section('title', ' Acceuil - Pharmacie Dipharma')
@section('content')

{{-- section hero --}}



<section class=" md:mt-24 ">
    <div class="w-full md:h-150  overflow-hidden relative">
        <div class="flex carousel-slides duration-500 ease-in-out transition-transform">
            <div class="flex-shrink-0 w-full carousel-slide">
                <img src="{{ asset('assets/img/s1.png') }}" alt="Image 1" class="h-auto w-full object-cover">
            </div>
            <div class="flex-shrink-0 w-full carousel-slide">
                <img src="{{ asset('assets/img/s2.png') }}" alt="Image 2" class="h-full w-full object-cover">
            </div>
            <div class="flex-shrink-0 w-full carousel-slide">
                <img src="{{ asset('assets/img/s3.png') }}" alt="Image 3" class="h-full w-full object-cover">
            </div>
        </div>
        <button class="bg-[#176abc] rounded-full text-white -translate-y-1/2 absolute carousel-prev left-2 md:top-1/2 px-3 py-1 top-1/2 transform">
            &#10094;
        </button>
        <button class="bg-[#176abc] rounded-full text-white -translate-y-1/2 absolute carousel-next md:top-1/2 px-3 py-1 right-2 top-1/2 transform">
            &#10095;
        </button>
        <div class="absolute md:left-[200px] left-[80px] md:top-1/6 top-1/20">
            <img src="{{ asset('assets/img/Logo dilane 1 - Copie.png') }}" class="w-30 animate-bounce md:w-60" alt="">
            <h1 class="text-[black] text-xl animate-fadeInUp animation-delay-400 font-semibold font-[Poppins] md:text-4xl">
                La <span class="text-[#369b36] text-bold">santé</span> en toute <span class="text-[#176abc] text-bold">simplicité ! </span>
            </h1> <br>
            <h3 class="text-sm md:text-lg animation-delay-400 animate-fadeInUp">
                Commandez en ligne et  profitez de la livraison à domicile ! <br>
                L'expertise pharmaceutique à votre service.
            </h3> <br>
            <div class="flex">
                <div>
                    <a href="{{ route('products.indexClient') }}" class="bg-[#176abc] animation-delay-500 animate-fadeInleft text-xl  shadow-[gray]/75 rounded-md shadow-sm text-white font-semibold gap-2 hover:bg-white hover:text-[#176abc]  hover:outline-2 items-center px-3 py-1">
                        Produits
                    </a>
                </div>
                <div>
                    <a href="{{ route('conversations.index') }}"  class="bg-[#44C244] animation-delay-500 animate-fadeInright text-xl rounded-md shadow-[gray]/75 shadow-sm text-white active:bg-white hover:text-[#44C244] focus:outline-[#44C244] focus:outline-2 focus:outline-offset-2 font-semibold hover:bg-white hover:outline-2 ml-7 px-3 py-1">
                        Consultation
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- section card --}}

<section class="" id="">
    <div class="w-full relative md:flex md:flex-row md:justify-between md:left-0 md:top-[-110] md:w-[75%] mx-auto sm:flex-column sm:justify-between" >
        <div class="flip-card md:mt-0 mt-10 mx-auto">
            <img class="absolute left-3 top-3 z-1" src="{{ asset('assets/img/double-cliquez.png') }}" alt="">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <p class="title text-xl py-4 mt-2 ">Sélection de Produits</p>
                    <p class="text-lg">Rechercher et commander vos produits de santé en quelques clics.</p>
                </div>
                <div class="flip-card-back">
                    <p class="title text-2xl">Dipharma</p>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="flip-card md:my-0 mx-auto my-10">
            <img class="absolute left-3 top-3 z-1" src="{{ asset('assets/img/soins-de-sante.png') }}" alt="">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <p class="title text-xl py-4 mt-2" >Votre Santé, Notre Priorité</p>
                    <p class="text-lg">Bénéficiez de l'expertise de nos pharmaciens qualifiés. </p>
                </div>
                <div class="flip-card-back">
                    <p class="title text-2xl">Dipharma</p>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="flip-card mb-10 md:mb-0 mx-auto">
            <img class="absolute left-3 top-3 z-1 " src="{{ asset('assets/img/livraison-express.png') }}" alt="">
            <div class="flip-card-inner ">
                <div class="flip-card-front">
                    <p class="title text-xl  py-4 mt-2 ">Livraison Rapide et Sécurisée</p><br>
                    <p class="text-lg">La pharmacie jusqu'à votre porte. Profitez de la simplicité de la livraison </p>

                </div>
                <div class="flip-card-back">
                    <p class="title text-2xl">Dipharma</p>
                    <p></p>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- apropos de nous --}}
<section class="py-16 md:pt-20 md:pb-34 bg-gray-50"> {{-- Ajout padding et fond différent --}}
    <div class="container w-[75%] mx-auto px-4"> {{-- Utilisation container --}}
        <div class="text-center mb-12">
            {{-- Taille titre responsive --}}
            <h1 class="text-2xl md:text-3xl text-center text-[#176abc] font-bold font-[Poppins] mb-4">Nous sommes toujours prêts à vous aider <br class="hidden sm:block"> vous & votre famille</h1>
            <span class="flex justify-center mb-5"><img src="{{ asset('assets/img/section-img.png') }}" alt="" class="h-3"></span>
            <p class="text-center pb-3 text-base md:text-lg text-gray-600 font-[Poppins] max-w-2xl mx-auto">Des solutions santé discrètes et efficaces, livrées chez vous.</p> {{-- Couleur texte ajustée --}}
        </div>
        {{-- Utilisation de grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 md:gap-12 items-start mt-10">
            {{-- Item 1 --}}
            <div class="flex flex-col items-center text-center">
                {{-- Taille container/icone standardisée --}}
                <div class="flex justify-center items-center p-3 w-20 h-20 rounded-full border-2 border-[#60a5fa] bg-blue-50 mb-3">
                    <img src="{{ asset('assets/img/healthcare.png') }}" class="h-10 w-10" alt="Pharmacie">
                </div>
                <div>
                    <h2 class="text-lg md:text-xl font-semibold mt-2 text-[#176abc]">Pharmacie Enrichie</h2>
                </div>
            </div>
             {{-- Item 2 --}}
             <div class="flex flex-col items-center text-center mt-8 sm:mt-0"> {{-- Marge mobile --}}
                 <div class="flex justify-center items-center p-3 w-20 h-20 rounded-full border-2 border-orange-400 bg-orange-50 mb-3">
                    <img src="{{ asset('assets/img/ambulance.png') }}" class="h-10 w-10" alt="Livraison">
                </div>
                <div>
                    <h2 class="text-lg md:text-xl font-semibold mt-2 text-[#176abc]">Livraison à domicile</h2>
                </div>
            </div>
             {{-- Item 3 --}}
            <div class="flex flex-col items-center text-center mt-8 sm:mt-0">
                 <div class="flex justify-center items-center p-3 w-20 h-20 rounded-full border-2 border-green-400 bg-green-50 mb-3">
                    <img src="{{ asset('assets/img/sthetoscope.png') }}" class="h-10 w-10" alt="Traitement médical">
                </div>
                <div>
                    <h2 class="text-lg md:text-xl font-semibold mt-2 text-[#176abc]">Traitement médical</h2>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- separation -->

<section class=" "> 
    <div class="relative w-full">
        {{-- Image de fond avec hauteur responsive --}}
        <img src="{{ asset('assets/img/fun-bg.jpg') }}" alt="Fond décoratif avantages pharmacie"
             class="object-cover w-full h-100 sm:h-60 md:h-52 lg:h-48 rounded-md shadow-lg"> 

        
        <div class="absolute inset-0 bg-[#176abc]/80 flex items-center rounded-md"> {{-- Opacité légèrement augmentée, coins arrondis --}}

            {{-- Conteneur pour le contenu, centré avec padding --}}
            <div class="container w-[75%] mx-auto px-4 sm:px-6 lg:px-8 text-white ">

                {{-- Grille pour les éléments --}}
                {{-- 1 colonne sur mobile, 3 colonnes sur tablette et plus --}}
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 md:gap-8 text-center sm:text-left">

                    {{-- Élément 1: Livraison Gratuite --}}
                    <div class="compteur-container flex flex-col items-center sm:flex-row sm:items-center gap-3 sm:gap-4">
                        {{-- Icône avec taille responsive --}}
                        <img src="{{ asset('assets/img/free-delivery.png') }}" alt="Livraison Gratuite"
                             class="w-12 h-12 md:w-14 md:h-14 flex-shrink-0">
                        <div>
                            {{-- Texte avec tailles responsives --}}
                            <div class="text-lg md:text-xl font-semibold">Livraison Gratuite</div>
                            <div class="text-xs md:text-sm opacity-80">Dès 20.000 F CFA</div> {{-- Texte raccourci --}}
                        </div>
                    </div>

                    {{-- Élément 2: Paiement Rapide --}}
                    <div class="compteur-container flex flex-col items-center sm:flex-row sm:items-center gap-3 sm:gap-4">
                        <img src="{{ asset('assets/img/credit-card.png') }}" alt="Paiement Rapide"
                             class="w-12 h-12 md:w-14 md:h-14 flex-shrink-0">
                        <div>
                            <div class="text-lg md:text-xl font-semibold">Paiement Rapide</div>
                            <div class="text-xs md:text-sm opacity-80">100% Sécurisé</div>
                        </div>
                    </div>

                    {{-- Élément 3: Assistance 24/7 --}}
                    <div class="compteur-container flex flex-col items-center sm:flex-row sm:items-center gap-3 sm:gap-4">
                        <img src="{{ asset('assets/img/headset.png') }}" alt="Assistance 24/7"
                             class="w-12 h-12 md:w-14 md:h-14 flex-shrink-0">
                        <div>
                            <div class="text-lg md:text-xl font-semibold">Assistance 24/7</div>
                            <div class="text-xs md:text-sm opacity-80">À Votre Service</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- section nos produits -->

<section class="bg-[#fafafa] py-20" >
    <h1 class="text-3xl text-center text-[#176abc] font-bold  font-[Poppins]">Nos Produits Phares</h1>
    <span class="flex justify-center p-5"><img src="{{ asset('assets/img/section-img.png') }}" alt="" class="flex justify-center "></span>


            <!-- component -->
             <div class="w-[75%]  m-auto mt-20 mb-10 flex mx-auto gap-5 flex-wrap justify-between">
                <div class="relative flex w-90  shadow-black/50 flex-col rounded-2xl bg-white  text-black shadow-sm transform transition-all duration-300 hover:-translate-y-7">
                    <div class="absolute top-2 right-2">
                        <span class="inline-block rounded-lg px-1 pb-1 text-xs font-bold  bg-green-500 text-white">
                           Disponible
                        </span>
                    </div>
                    <div class="relative mx-8 mt-8 h-35 overflow-hidden rounded-xl  bg-clip-border text-white   bg-white transform transition-all duration-300 hover:-translate-y-4">
                        <div class="w-full h-full flex justify-center items-center">
                          <img src="{{ asset('assets/img/cetirizine.jpg') }}" alt=""  width="200px"  class=" object-cover">
                        </div>
                      </div>
                    <div class="px-8 py-5">
                      <h5 class="mb-2 block text-[#176abc] font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                       Cetirizine
                      </h5>
                      <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc felis ligula.
                      </p>
                    </div>
                    <div class="px-8 pt-0 pb-5 flex justify-between">
                        <p class="text-[#176abc] text-lg font-bold">XAF 1450</p>
                        <a href="{{ route('products.indexClient') }}" data-ripple-light="true" type="button" class="select-none rounded-lg  text-white hover:bg-white hover:text-[#176abc] bg-[#176abc] py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase  shadow-md shadow-black/25 transition-all hover:border hover:border-[#176abc] focus:opacity-[0.85] focus:shadow-none  active:shadow-none disabled:pointer-events-none disabled:opacity-50 ">
                        VOIR PLUS
                        </a>
                    </div>
                </div>

               



                <div class="relative flex w-90  shadow-black/50 flex-col rounded-2xl bg-white  text-black shadow-sm transform transition-all duration-300 hover:-translate-y-7">
                    <div class="absolute top-2 right-2">
                        <span class="inline-block rounded-lg px-1 pb-1 text-xs font-bold  bg-green-500 text-white">
                           Disponible
                        </span>
                    </div>
                    <div class="relative mx-8 mt-8 h-35 overflow-hidden rounded-xl  bg-clip-border text-white   bg-white transform transition-all duration-300 hover:-translate-y-4">
                        <div class="w-full h-full flex justify-center items-center">
                          <img src="{{ asset('assets/img/Oseltamivir-75.jpeg') }}" alt=""  width="200px"  class=" object-cover">
                        </div>
                      </div>
                    <div class="px-8 py-5">
                      <h5 class="mb-2 block text-[#176abc] font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                        Oseltamivir 75mg
                      </h5>
                      <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc felis ligula.
                      </p>
                    </div>
                    <div class="px-8 pt-0 pb-5 flex justify-between">
                        <p class="text-[#176abc] text-lg font-bold">XAF 2000</p>
                        <a href="{{ route('products.indexClient') }}" data-ripple-light="true" type="button" class="select-none rounded-lg  text-white hover:bg-white hover:text-[#176abc] bg-[#176abc] py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase  shadow-md shadow-black/25 transition-all hover:border hover:border-[#176abc] focus:opacity-[0.85] focus:shadow-none  active:shadow-none disabled:pointer-events-none disabled:opacity-50 ">
                        VOIR PLUS
                        </a>
                    </div>
                </div>




                <div class="relative flex w-90  shadow-black/50 flex-col rounded-2xl bg-white  text-black shadow-sm transform transition-all duration-300 hover:-translate-y-7">
                    <div class="absolute top-2 right-2">
                        <span class="inline-block rounded-lg px-1 pb-1 text-xs font-bold  bg-green-500 text-white">
                           Disponible
                        </span>
                    </div>
                    <div class="relative mx-8 mt-8 h-35 overflow-hidden rounded-xl  bg-clip-border text-white   bg-white transform transition-all duration-300 hover:-translate-y-4">
                        <div class="w-full h-full flex justify-center items-center">
                          <img src="{{ asset('assets/img/efferalgan-1-g-8-comprimes-effervescents.jpg') }}" alt=""  width="200px"  class=" object-cover">
                        </div>
                      </div>
                    <div class="px-8 py-5">
                      <h5 class="mb-2 block text-[#176abc] font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                        Efferalgan 1000mg
                      </h5>
                      <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc felis ligula.
                      </p>
                    </div>
                    <div class="px-8 pt-0 pb-5 flex justify-between">
                        <p class="text-[#176abc] text-lg font-bold">XAF 1000</p>
                        <a href="{{ route('products.indexClient') }}" data-ripple-light="true" type="button" class="select-none rounded-lg  text-white hover:bg-white hover:text-[#176abc] bg-[#176abc] py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase  shadow-md shadow-black/25 transition-all hover:border hover:border-[#176abc] focus:opacity-[0.85] focus:shadow-none  active:shadow-none disabled:pointer-events-none disabled:opacity-50 ">
                        VOIR PLUS
                        </a>
                    </div>
                </div>

            </div>



</section>

{{-- seprateur nous contacter --}}

<section>
    <div class="relative w-full ">
        <img src="{{ asset('assets/img/call-bg.jpg') }}" alt="" class="object-cover h-85 w-full">
        <div class="bg-[#176abc]/75 text-white  items-center text-center font-semibold text-3xl h-85 absolute w-full top-0 z-1">
            <h1 class="text-3xl font-bold mt-20">Avez vous besoin des Medicaments <br> urgents ?</h1>
            <h3 class="text-lg my-2">Pour toute question, n'hésitez pas à nous contacter.</h3>
            <button class="bg-white text-xl rounded-md shadow-[gray]/75 shadow-sm text-[#176abc] active:text-white active:bg-[#176abc] focus:outline-white focus:outline-2 focus:outline-offset-2 font-semibold hover:bg-[#176abc] hover:text-white hover:outline-2 ml-7 px-3 py-1 mt-5">
                Contactez-nous
            </button>
        </div>
    </div>
</section>

<!-- section services     -->

<section class="bg-[#fafafa] pb-0 pt-20" id="services">
    <h1 class="text-3xl text-center text-[#176abc] font-bold  font-[Poppins] ">Nos Services</h1>
    <span class="flex justify-center  p-10"><img src="{{ asset('assets/img/section-img.png') }}" alt="" class="flex justify-center "></span>

    <div class="w-[75%] m-auto mt-10 mb-5 flex mx-auto gap-5 flex-wrap justify-between">
        <div class="w-90 shadow-sm shadow-black/50 h-85  bg-white   rounded-3xl text-[#176abc] p-4 flex flex-col items-start justify-center gap-3 transition-all duration-300 hover:-translate-y-7 ">
            <div class="w-80 h-40 bg-sky-300 rounded-2xl">
                <img src="{{ asset('assets/img/portrait-woman-working-pharmaceutical-industry.jpg') }}" alt="" class="w-full h-full object-cover rounded-2xl">
            </div>
            <div class="">
                <p class="font-extrabold">Commercialisation</p>
                <p class="text-black">Votre santé, notre engagement. Des solutions pharmaceutiques fiables pour vous aider à vous sentir mieux, chaque jour.</p>
            </div>
            <div class="flex items-center ">
                <div class="text-yellow-400">★★★★</div>
                <div class="text-gray-300">★</div>
                <span class="text-sm text-gray-600 ml-1">(42)</span>
            </div>
        </div>

        <div class="w-90 h-85 shadow-sm shadow-black/50 bg-white   rounded-3xl text-[#176abc] p-4 flex flex-col items-start justify-center gap-3 transition-all duration-300 hover:-translate-y-7 ">
            <div class="w-80 h-40 bg-sky-300 rounded-2xl">
                <img src="{{ asset('assets/img/close-up-delivery-person-giving-parcel-client.jpg') }}" alt="" class="w-full h-full object-cover rounded-2xl">
            </div>
            <div class="">
                <p class="font-extrabold">Livraison</p>
                <p class="text-black">La pharmacie vient à vous ! Commandez en ligne et recevez vos médicaments. Gain de temps et tranquillité d'esprit garantis."</p>
            </div>
            <div class="flex items-center ">
                <div class="text-yellow-400">★★★</div>
                <div class="text-gray-300">★★</div>
                <span class="text-sm text-gray-600 ml-1">(33)</span>
            </div>
        </div>

        <div class="w-90 h-85 shadow-sm shadow-black/50  bg-white  rounded-3xl text-[#176abc] p-4 flex flex-col items-start justify-center gap-3 transition-all duration-300 hover:-translate-y-7 ">
            <div class="w-80 h-40 bg-sky-300 rounded-2xl">
                <img src="{{ asset('assets/img/happy-african-american-doctor-with-headset-working-laptop-her-office.jpg') }}" alt="" class="w-full h-full object-cover rounded-2xl">
            </div>
            <div class="">
                <p class="font-extrabold">Consultation</p>
                <p class="text-black"> Bénéficiez d'une consultation en ligne pratique et connectez-vous avec nos experts où que vous soyez.</p>
            </div>
            <div class="flex items-center ">
                <div class="text-yellow-400">★★★★</div>
                <div class="text-gray-300">★</div>
                <span class="text-sm text-gray-600 ml-1">(19)</span>
            </div>
        </div>


    </div>

</section>

<!-- separation compteur -->

<section class="my-16 md:my-20 lg:my-24">
    <div class="relative w-full">
        <img src="{{ asset('assets/img/fun-bg.jpg') }}" alt="Statistiques clés pharmacie"
             class="object-cover w-full h-120 sm:h-72 md:h-64 lg:h-60 rounded-lg shadow-lg"> {{-- Hauteur dégressive, coins arrondis, ombre --}}

        {{-- Overlay semi-transparent --}}
        <div class="absolute inset-0 bg-[#176abc]/85 flex items-center rounded-lg"> {{-- Coins arrondis, opacité légèrement augmentée --}}
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-white w-full">
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 md:gap-10 text-center">
                    <div class="compteur-container flex flex-col items-center">
                        <img src="{{ asset('assets/img/pharmacy (1).png') }}" alt="Produits disponibles"
                             class="w-14 h-14 md:w-16 md:h-16 mb-2 md:mb-3">
                        <div>
                            <div class="text-3xl md:text-4xl font-bold">
                                <span id="compteur1" class="counter" data-target="1200">0</span><span>+</span>
                            </div>
                            <div class="text-sm md:text-base opacity-80 mt-1">Produits disponibles</div>
                        </div>
                    </div>

                    {{-- Compteur 2: Clients satisfaits --}}
                    <div class="compteur-container flex flex-col items-center">
                        <img src="{{ asset('assets/img/bonheur.png') }}" alt="Clients satisfaits"
                             class="w-14 h-14 md:w-16 md:h-16 mb-2 md:mb-3">
                        <div>
                            <div class="text-3xl md:text-4xl font-bold">
                                <span id="compteur2" class="counter" data-target="5000">0</span><span>+</span>
                            </div>
                            <div class="text-sm md:text-base opacity-80 mt-1">Clients satisfaits</div>
                        </div>
                    </div>

                    {{-- Compteur 3: Commandes livrées --}}
                    <div class="compteur-container flex flex-col items-center">
                        <img src="{{ asset('assets/img/checkout.png') }}" alt="Commandes livrées"
                             class="w-14 h-14 md:w-16 md:h-16 mb-2 md:mb-3">
                        <div>
                            <div class="text-3xl md:text-4xl font-bold">
                                 <span id="compteur3" class="counter" data-target="8500">0</span><span>+</span>
                            </div>
                            <div class="text-sm md:text-base opacity-80 mt-1">Commandes livrées</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- section temoignage -->
<section class="py-16 md:py-20">
    <div class="container mx-auto px-4">
        <h1 class="text-2xl md:text-3xl mb-4 text-center text-[#176abc] font-bold font-[Poppins]">Témoignages</h1>
        <span class="flex justify-center mb-10 md:mb-12"><img src="{{ asset('assets/img/section-img.png') }}" alt="" class="h-3"></span>

        {{-- Carrousel Flowbite - Wrapper avec max-width --}}
        <div class="max-w-3xl mx-auto">
            <div id="testimonial-carousel-resp" class="relative z-1" data-carousel="slide">
                <!-- Carousel wrapper -->
                 {{-- Hauteur ajustée et padding interne --}}
                <div class="overflow-hidden relative min-h-[24rem] sm:min-h-[20rem] md:min-h-[18rem] rounded-lg bg-gray-50 border border-gray-200 shadow-sm flex items-center justify-center">
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out w-full px-6 py-8 md:px-10" data-carousel-item>
                        <div class="flex flex-col items-center text-center">
                            <img src="{{ asset('assets/img/confident-african-businesswoman-smiling-closeup-portrait-jobs-career-campaign.jpg') }}" alt="Photo Fatou D." class="h-16 w-16 rounded-full mb-4">
                            <p class="w-full max-w-xl text-center text-gray-700 mx-auto text-base md:text-lg mb-4">
                                "Souffrant de mobilité réduite, les déplacements étaient toujours compliqués. La consultation en ligne a été une véritable bouée de sauvetage. J'ai pu obtenir les conseils dont j'avais besoin confortablement installée chez moi, sans stress."
                            </p>
                            <h4 class="text-lg font-semibold mt-4">Fatou D.</h4>
                        </div>
                    </div>
                    <!-- Item 2 -->
                     <div class="hidden duration-700 ease-in-out w-full px-6 py-8 md:px-10" data-carousel-item>
                         <div class="flex flex-col items-center text-center">
                            <img src="{{ asset('assets/img/african-american-woman-wearing-white-t-shirt-apparel-close-up.jpg') }}" alt="Photo Nadia K." class="h-16 w-16 rounded-full mb-4">
                             <p class="w-full max-w-xl text-center text-gray-700 mx-auto text-base md:text-lg mb-4">
                                "Un soir, mon enfant a eu une forte fièvre et nous avions besoin d'un médicament rapidement. La possibilité de se faire livrer en urgence a été un véritable plus. Nous avons reçu le nécessaire en un temps record, ce qui nous a évité beaucoup de stress."
                            </p>
                            <h4 class="text-lg font-semibold mt-4">Nadia K.</h4>
                        </div>
                    </div>
                    <!-- Item 3 -->
                     <div class="hidden duration-700 ease-in-out w-full px-6 py-8 md:px-10" data-carousel-item>
                         <div class="flex flex-col items-center text-center">
                            <img src="{{ asset('assets/img/middle-aged-cheerful-dark-skinned-male-with-shining-smile.jpg') }}" alt="Photo Pierre M." class="h-16 w-16 rounded-full mb-4">
                            <p class="w-full max-w-xl text-center text-gray-700 mx-auto text-base md:text-lg mb-4">
                                "En plus du médicament préparé spécialement pour moi, j'ai reçu des conseils très clairs de la part de l'équipe de la pharmacie sur la façon de l'utiliser et les précautions à prendre. Je me suis senti vraiment bien accompagné."
                            </p>
                            <h4 class="text-lg font-semibold mt-4">Pierre M.</h4>
                        </div>
                    </div>
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                    <button type="button" class="w-3 h-3 rounded-full bg-gray-400 hover:bg-[#176abc]" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full bg-gray-400 hover:bg-[#176abc]" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full bg-gray-400 hover:bg-[#176abc]" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                </div>
                <!-- Slider controls -->
                 {{-- Styles des contrôles ajustés --}}
                <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-2 group-focus:ring-white group-focus:outline-none">
                        <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-2 group-focus:ring-white group-focus:outline-none">
                        <svg class="w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        </div>
    </div>
</section>



@endsection


