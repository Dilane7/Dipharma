@extends('base')

{{-- hero --}}

<section class=" md:mt-24 bg-black">
    <div class="w-full md:h-150 overflow-hidden relative">
        <div class="flex carousel-slides duration-500 ease-in-out transition-transform">
            <div class="flex-shrink-0 w-full carousel-slide">
                <img src="{{ asset('assets/img/slider.jpg') }}" alt="Image 1" class="h-full w-full object-cover">
            </div>
            <div class="flex-shrink-0 w-full carousel-slide">
                <img src="{{ asset('assets/img/slider2.jpg') }}" alt="Image 2" class="h-full w-full object-cover">
            </div>
            <div class="flex-shrink-0 w-full carousel-slide">
                <img src="{{ asset('assets/img/slider3.png') }}" alt="Image 3" class="h-full w-full object-cover">
            </div>
        </div>
        <button class="bg-[#176abc] rounded-full text-white -translate-y-1/2 absolute carousel-prev left-2 md:top-1/2 px-3 py-1 top-1/2 transform">
            &#10094;
        </button>
        <button class="bg-[#176abc] rounded-full text-white -translate-y-1/2 absolute carousel-next md:top-1/2 px-3 py-1 right-2 top-1/2 transform">
            &#10095;
        </button>
        <div class="absolute left-[200px] md:top-1/6 top-1/20">
            <img src="{{ asset('assets/img/Logo dilane 1 - Copie.png') }}" class="w-30 animate-bounce md:w-60" alt="">
            <h1 class="text-[black] text-xl font-semibold font-[Poppins] md:text-4xl">
                La <span class="text-[#369b36] text-bold">santé</span> en toute <span class="text-[#176abc] text-bold">simplicité ! </span>
            </h1> <br>
            <h3 class="text-sm md:text-lg">
                Commandez en ligne et  profitez de la livraison à domicile ! <br>
                L'expertise pharmaceutique à votre service.
            </h3> <br>
            <div class="flex">
                <div>
                    <button class="bg-[#176abc] text-xl  shadow-[gray]/75 rounded-md shadow-sm text-white font-semibold gap-2 hover:bg-white hover:text-[#176abc]  hover:outline-2 items-center px-3 py-1">
                        Get Started
                    </button>
                </div>
                <div>
                    <button class="bg-[#44C244] text-xl rounded-md shadow-[gray]/75 shadow-sm text-white active:bg-white hover:text-[#44C244] focus:outline-[#44C244] focus:outline-2 focus:outline-offset-2 font-semibold hover:bg-white hover:outline-2 ml-7 px-3 py-1">
                        Produits
                    </button>
                </div>
            </div>
        </div>

    </div>
</section>

{{-- section card --}}

<section class="" id="propos">
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

<section class="" >
    <div class="">
        <h1 class="text-3xl text-center text-[#176abc] font-bold font-[Poppins]">Nous sommes toujours prêts à vous aider <br> vous & votre famille</h1>
        <span class="flex justify-center p-5"><img src="{{ asset('assets/img/section-img.png') }}" alt="" class="flex justify-center py-4"></span>
        <h1 class="text-center pb-3 text-lg text-[#013b56]  font-[Poppins]">Des solutions santé discrètes et efficaces, livrées chez vous.</h1>
    </div>
    <div class="md:flex md:justify-between items-center my-10 flex-column w-[60%] m-auto py-1">
        <div class="flex flex-col items-center">
            <div class="flex justify-center p-3 w-23 h-23 rounded-full overflow-hidden border-1 border-[#176abc]">
                <img src="{{ asset('assets/img/healthcare.png') }}" class="" alt="">
            </div>
            <div>
                <h2 class="text-center text-xl font-semibold mt-4">Pharmacie Enrichie</h2>
            </div>
        </div>
        <div class="md:block hidden">
            <span class="text-[#176abc] text-3xl"></span>
        </div>
        <div class="flex flex-col items-center">
            <div class="flex justify-center p-3 w-23 h-23 rounded-full overflow-hidden border-1 border-[#176abc] ">
                <img src="{{ asset('assets/img/ambulance.png') }}" alt="">
            </div>
            <div>
                <h2 class="text-center text-xl font-semibold mt-4">Livraison à domicile</h2>
            </div>
        </div>
        <div class="md:block hidden">
            <span class="text-[#176abc] text-3xl "></span>
        </div>
        <div class="flex flex-col items-center">
            <div class="flex justify-center p-3 w-23 h-23 rounded-full overflow-hidden border-1 border-[#176abc]">
                <img src="{{ asset('assets/img/sthetoscope.png') }}" alt="">
            </div>
            <div>
                <h2 class="text-center text-xl font-semibold mt-4">Traitement médical</h2>
            </div>
        </div>
    </div>
</section>


<!-- separation -->

<section>
    <div class="relative w-full my-25">
        <img src="{{ asset('assets/img/fun-bg.jpg') }}" alt="" class="object-cover h-60 w-full">
        <div class="bg-[#176abc]/75 w text-white flex items-center font-semibold text-2xl h-60 absolute w-full top-0 z-1">
            <div class="flex w-[75%] mx-auto justify-between">
                <div class="compteur-container flex items-center gap-4">
                    <img src="{{ asset('assets/img/free-delivery.png') }}" alt="" class="w-17 h-17">
                    <div >
                        <div class="text-2xl"> Livraison Gratuite</div>
                        <div class="text-sm"> commande supérieure à 20.000f </div>
                    </div>
                </div>

                <div class="compteur-container flex items-center gap-4">
                    <img src="{{ asset('assets/img/credit-card.png') }}" alt="" class="w-17 h-17">
                    <div >
                        <div class="text-2xl">Payement Rapide</span></div>
                        <div class="text-sm">100% Securisé</div>
                    </div>
                </div>

                <div class="compteur-container flex items-center gap-4">
                    <img src="{{ asset('assets/img/headset.png') }}" alt="" class="w-17 h-17">
                    <div >
                        <div class="text-2xl">Assistance 24/7</div>
                        <div class="text-sm">à Votre Service</div>
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
                    <div class="px-8 pt-0 pb-5">
                        <button data-ripple-light="true" type="button" class="select-none rounded-lg  text-white hover:bg-white hover:text-[#176abc] bg-[#176abc] py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase  shadow-md shadow-black/25 transition-all hover:border hover:border-[#176abc] focus:opacity-[0.85] focus:shadow-none  active:shadow-none disabled:pointer-events-none disabled:opacity-50 ">
                        VOIR PLUS
                      </button>
                    </div>
                </div>


                
                <div class="relative flex w-90  shadow-black/50 flex-col rounded-2xl bg-white  text-black shadow-sm transform transition-all duration-300 hover:-translate-y-7">
                    <div class="relative mx-8 mt-8 h-35 overflow-hidden rounded-xl  bg-clip-border text-white   bg-white transform transition-all duration-300 hover:-translate-y-4">
                        <div class="w-full h-full flex justify-center items-center">
                          <img src="{{ asset('assets/img/doliprane 1000mg.png') }}" alt=""  width="200px"  class=" object-cover">
                        </div>
                      </div>
                    <div class="px-8 py-5">
                      <h5 class="mb-2 block text-[#176abc] font-sans text-xl font-semibold leading-snug tracking-normal text-blue-gray-900 antialiased">
                        Doliprane 1000mg
                      </h5>
                      <p class="block font-sans text-base font-light leading-relaxed text-inherit antialiased">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc felis ligula.
                      </p>
                    </div>
                    <div class="px-8 pt-0 pb-5">
                        <button data-ripple-light="true" type="button" class="select-none rounded-lg  text-white hover:bg-white hover:text-[#176abc] bg-[#176abc] py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase  shadow-md shadow-black/25 transition-all hover:border hover:border-[#176abc] focus:opacity-[0.85] focus:shadow-none  active:shadow-none disabled:pointer-events-none disabled:opacity-50 ">
                        VOIR PLUS
                      </button>
                    </div>
                </div>


                

                <div class="relative flex w-90  shadow-black/50 flex-col rounded-2xl bg-white  text-black shadow-sm transform transition-all duration-300 hover:-translate-y-7">
                    <div class="relative mx-8 mt-8 h-35 overflow-hidden rounded-xl  bg-clip-border text-white   bg-white transform transition-all duration-300 hover:-translate-y-4">
                        <div class="w-full h-full flex justify-center items-center">
                          <img src="{{ asset('assets/img/efferalgan-1-g-comprime-upsa.jpg') }}" alt=""  width="200px"  class=" object-cover">
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
                    <div class="px-8 pt-0 pb-5">
                        <button data-ripple-light="true" type="button" class="select-none rounded-lg  text-white hover:bg-white hover:text-[#176abc] bg-[#176abc] py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase  shadow-md shadow-black/25 transition-all hover:border hover:border-[#176abc] focus:opacity-[0.85] focus:shadow-none  active:shadow-none disabled:pointer-events-none disabled:opacity-50 ">
                        VOIR PLUS
                      </button>
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

<section>
    <div class="relative w-full mb-0 mt-25">
        <img src="{{ asset('assets/img/fun-bg.jpg') }}" alt="" class="object-cover h-60 w-full">
        <div class="bg-[#176abc]/75 w text-white flex items-center font-semibold text-2xl h-60 absolute w-full top-0 z-1">
            <div class="flex w-[75%] mx-auto justify-between">
                <div class="compteur-container flex items-center gap-4">
                    <img src="{{ asset('assets/img/pharmacy (1).png') }}" alt="" class="w-17 h-17">
                    <div >
                        <div class="text-4xl"><span id="compteur1" >0</span><span>+</span></div>
                        <div class="text-md">Produits disponibles </div>
                    </div>
                </div>

                <div class="compteur-container flex items-center gap-4">
                    <img src="{{ asset('assets/img/bonheur.png') }}" alt="" class="w-17 h-17">
                    <div >
                        <div class="text-4xl"><span id="compteur2" >0</span><span>+</span></div>
                        <div class="text-md">Clients satisfaits</div>
                    </div>
                </div>

                <div class="compteur-container flex items-center gap-4">
                    <img src="{{ asset('assets/img/checkout.png') }}" alt="" class="w-17 h-17">
                    <div >
                        <div class="text-4xl"><span id="compteur3" >0</span><span>+</span></div>
                        <div class="text-md">Commandes livrées</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- section temoignage -->

<section>
    <h1 class="text-3xl mb-5 pt-15 text-center text-[#176abc] font-bold  font-[Poppins] ">Temoignages</h1>
    <span class="flex justify-center p-5"><img src="{{ asset('assets/img/section-img.png') }}" alt="" class="flex justify-center "></span>

    <!-- This is an example component -->
    <div class="my-5 mx-auto">

        <div id="default-carousel" class="relative z-1" data-carousel="static">
            <!-- Carousel wrapper -->
            <div class="overflow-hidden relative h-80 rounded-lg sm:h-64 xl:h-80 2xl:h-96">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="flex flex-col items-center">

                        <img src="{{ asset('assets/img/confident-african-businesswoman-smiling-closeup-portrait-jobs-career-campaign.jpg') }}" alt=""  class="h-20 w-20 rounded-full"> <br> <br>
                        <p class="w-[70%] text-center text-[#176abc] mx-auto text-xl">Souffrant de mobilité réduite, les déplacements étaient toujours compliqués. La consultation en ligne
                            a été une véritable bouée de sauvetage. J'ai pu obtenir les conseils dont j'avais besoin confortablement installée chez moi, sans stress
                        <h4 class="text-2xl mt-8"> Fatou D.</h4>
                      </div>
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="flex flex-col items-center">

                        <img src="{{ asset('assets/img/african-american-woman-wearing-white-t-shirt-apparel-close-up.jpg') }}" alt=""  class="h-20 w-20 rounded-full"> <br> <br>
                        <p class="w-[70%] text-center text-[#176abc] mx-auto text-xl">Un soir, mon enfant a eu une forte fièvre et nous avions besoin d'un médicament rapidement.
                            La possibilité de se faire livrer en urgence a été un véritable plus. Nous avons reçu le nécessaire en un temps record, ce qui nous a évité beaucoup de stress
                        <h4 class="text-2xl mt-8">  Nadia K.</h4>
                      </div>
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <div class="flex flex-col items-center">

                        <img src="{{ asset('assets/img/middle-aged-cheerful-dark-skinned-male-with-shining-smile.jpg') }}" alt=""  class="h-20 w-20 rounded-full"> <br> <br>
                        <p class="w-[70%] text-center text-[#176abc] mx-auto text-xl">En plus du médicament préparé spécialement pour moi, j'ai reçu des
                            conseils très clairs de la part de l'équipe de la pharmacie sur la façon de l'utiliser et les précautions à prendre. Je me suis senti vraiment bien accompagné.
                        <h4 class="text-2xl mt-8">  Pierre M</h4>
                      </div>
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3 -translate-x-1/2">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
            </div>
            <!-- Slider controls -->
            <button type="button" class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                    <span class="hidden">Previous</span>
                </span>
            </button>
            <button type="button" class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex justify-center items-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    <span class="hidden">Next</span>
                </span>
            </button>
        </div>
    </div>

</section>

@section('content')

@endsection


