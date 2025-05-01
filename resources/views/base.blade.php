<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name', 'Pharmacie Diilane'))</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/Logo dilane 2.png') }}" type="image/x-icon">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/welcome.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

</head>
<body>
    <header class="bg-white w-full left-0 md:fixed top-0  z-5" >
        <nav class="flex justify-between w-[75%]  items-center mx-auto pt-1">
            <div>
                <img src="{{ asset('assets/img/Logo dilane 1.png') }}" alt="" class="h-auto w-22 cursor-pointer max-w-full py-2">
            </div>
            <div class="flex nav-links bg-white w-full absolute items-center left-0 md:min-h-fit md:static md:w-auto min-h-[45vh] px-15 top-[-100%] z-1">
                    <ul class="flex flex-col gap-10 md:flex-row md:gap-[4vw] md:items-center">
                        <li class="text-lg font-[Poppins] group inline-block relative">
                            <a class="transition-colors duration-200 {{ request()->routeIs('welcome') ? 'text-[#176abc] font-semibold' : 'text-gray-800 hover:text-[#176abc]' }}" href="{{ route('welcome') }}">Accueil</a>
                            <span class="absolute bottom-[-16px] left-0 h-[4px] w-full bg-[#176abc] transform transition-transform duration-300 ease-in-out {{ request()->routeIs('welcome') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"> </span>
                        </li>
                        <li class="text-lg font-[Poppins] group inline-block relative">
                            <a class="transition-colors duration-200 {{ request()->routeIs('products.indexClient') ? 'text-[#176abc] font-semibold' : 'text-gray-800 hover:text-[#176abc]' }}" href="{{ route('products.indexClient') }}">Produits</a>
                            <span class="absolute bottom-[-16px] left-0 h-[4px] w-full bg-[#176abc] transform transition-transform duration-300 ease-in-out {{ request()->routeIs('products.indexClient') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"></span>
                        </li>
                        <li class="text-lg font-[Poppins] group inline-block relative">
                            <a class="transition-colors duration-200 {{ request()->routeIs('apropos') ? 'text-[#176abc] font-semibold' : 'text-gray-800 hover:text-[#176abc]' }}"  href="{{ route('apropos') }}">A propos</a>
                            <span class="absolute bottom-[-16px] left-0 h-[4px] w-full bg-[#176abc] transform transition-transform duration-300 ease-in-out {{ request()->routeIs('apropos') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"> </span>
                        </li>
                        <li class="text-lg font-[Poppins] group inline-block relative">
                            <a class="transition-colors duration-200 {{ request()->routeIs('services') ? 'text-[#176abc] font-semibold' : 'text-gray-800 hover:text-[#176abc]' }}" href="{{ route('services') }}">Services</a>
                            <span class="absolute bottom-[-16px] left-0 h-[4px] w-full bg-[#176abc] transform transition-transform duration-300 ease-in-out {{ request()->routeIs('services') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"> </span>
                        </li>
                        <li class="text-lg font-[Poppins] group inline-block relative">
                            <a class="transition-colors duration-200 {{ request()->routeIs('contacts') ? 'text-[#176abc] font-semibold' : 'text-gray-800 hover:text-[#176abc]' }}" href="{{ route('contacts') }}">Contacts</a>
                            <span class="absolute bottom-[-16px] left-0 h-[4px] w-full bg-[#176abc] transform transition-transform duration-300 ease-in-out {{ request()->routeIs('contacts') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"> </span>
                        </li>
                    </ul>
            </div>
            <div class="flex gap-5 items-center">
                @guest
                    <div class="flex justify-center ">
                        <a href="{{ route('login') }}" class="flex bg-[#176abc] rounded-xl shadow-[gray] shadow-sm text-white active:bg-[#176abc] focus:outline-[#176abc] focus:outline-2 focus:outline-offset-2 font-semibold gap-1 hover:text-[#176abc] hover:border hover:border-[#176abc] hover:bg-white hover:outline-2 px-2 py-[5px]">
                            <img src="{{ asset('assets/img/add-user.png') }}" alt="" class="h-[20px] w-[20px]">
                            Se connecter
                        </a>
                    </div>
                @endguest

                @auth
                    @role('client')
                        <a href="{{ route('cart.index') }}" class="text-gray-300 hover:text-white mr-4 relative">
                            <svg class="h-7 w-7 fill-current"  viewBox="0 0 25 24">
                                <path d="M10 19.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5c0-.829.672-1.5 1.5-1.5s1.5.671 1.5 1.5zm9-1.5c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5c.829 0 1.5-.671 1.5-1.5s-.671-1.5-1.5-1.5zm-5.48-7.19c-.034-.219-.053-.443-.053-.669 0-3.461 2.792-6.254 6.254-6.254h2.512c.03.226.049.451.049.678 0 .828-.672 1.5-1.5 1.5h-7.265c-3.272 0-5.93 2.658-5.93 5.929 0 .691.141 1.38.418 2.031l-1.53-3.109c-.047-.199-.28-.342-.486-.342h-2.214v2h2.09c.221.002.416.146.487.348l1.298 2.717c.269.564.832.945 1.472.945h6.557c.641 0 1.204-.381 1.472-.945l1.154-2.412c.278-.58.075-1.286-.464-1.633l-5.014-3.45c-.228-.157-.507-.157-.734 0z"/>
                            </svg>
                            <span id="cart-item-count" class="absolute top-0 right-0 bg-red-500 text-white rounded-full w-4 h-4 flex items-center justify-center text-xs">{{ session('cart') ? count(session('cart')) : 0 }}</span>
                        </a>
                        <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName" class="flex items-center text-sm pe-1 font-medium text-white rounded-lg hover:text-blue-600 dark:hover:text-blue-500 md:me-0    dark:text-gray-900" type="button">
                            <Span class="text-lg me-3 text-[#176abc]">{{ Auth::user()->name }}</Span>

                            @if (Auth::user()->photo)
                            <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="{{ Auth::user()->name }}" alt="user photo" class="rounded-full w-12 h-12" >
                            @else
                                <img class="img-profile rounded-circle w-12 h-12" alt="user photo"  src="{{asset('assets/img/undraw_profile.svg')}}">
                            @endif
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownAvatarName" class="z-10 hidden bg-gray-800 divide-y divide-gray-100 rounded-lg shadow-sm w-44 dark:bg-white dark:divide-[#44C244]">
                            <div class="px-4 py-3 text-sm text-white dark:text-gray-900">
                                <div class="font-bold ">{{ Auth::user()->name }}</div>
                                <div class="truncate">{{ Auth::user()->email }}</div>
                            </div>
                            <ul class="py-2 text-md text-white  dark:text-[#176abc]" aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
                                <li>
                                    <a href="{{ route('profile.editC') }}" class="block font-bold text-md px-4 py-2  hover:bg-[#176abc] dark:hover:bg-[#176abc] dark:hover:text-white">Profil</a>
                                </li>

                                <li>
                                    <a href="{{ route('orders.history') }}" class="block font-bold text-md px-4 py-2  hover:bg-[#176abc] dark:hover:bg-[#176abc] dark:hover:text-white">historique</a>
                                </li>
                            </ul>


                                <form method="POST" action="{{ route('logout') }}">
                                    <div class="py-2">
                                        @csrf
                                    <button type="submit" class="block font-bold px-7 py-2 text-md text-white hover:bg-gray-100 dark:hover:bg-[red] dark:text-[red] dark:hover:text-white">Se deconnecter</button>
                                    </div>
                                </form>


                        </div>
                    @endrole
                @endauth
                <ion-icon onclick="onToggleMenu(this)" name="menu-outline" class="text-[#176abc] text-5xl cursor-pointer md:hidden"></ion-icon>

            </div>
        </nav>
    </header>


    <div>
        @yield('content')
    </div>



    <!-- footer -->

    <footer class="bg-[#176abc] text-white">
        {{-- Conteneur principal des sections --}}
        <div class="container w-[75%] mx-auto px-4 py-10 lg:py-16">

            <div class="flex flex-col items-center text-center space-y-10 lg:flex-row lg:justify-between lg:items-start lg:text-left lg:space-y-0 lg:gap-8">

                {{-- Section 1: Logo et Réseaux Sociaux --}}
                <div class="w-full lg:w-auto">
                    {{-- Centré sur mobile (mx-auto), à gauche sur large (lg:mx-0) --}}
                    <div class="mx-auto lg:mx-0 mb-6">
                        <img src="{{ asset('assets/img/Logo Diilane fb_Plan de travail 1 copie 2.png') }}" alt="Logo Diilane" class="h-auto w-32 max-w-full cursor-pointer mx-auto lg:mx-0">
                    </div>
                    {{-- Icônes centrées sur mobile (justify-center), à gauche sur large (lg:justify-start) --}}
                    <div class="flex gap-4 justify-center lg:justify-start">
                        <a href="#" aria-label="Facebook"><img src="{{ asset('assets/img/facebo.png') }}" alt="Facebook" class="w-8 h-8 hover:opacity-80 transition-opacity"></a>
                        <a href="#" aria-label="Twitter"><img src="{{ asset('assets/img/twitter (2).png') }}" alt="Twitter" class="w-8 h-8 hover:opacity-80 transition-opacity"></a>
                        <a href="#" aria-label="Pinterest"><img src="{{ asset('assets/img/pintrest.png') }}" alt="Pinterest" class="w-8 h-8 hover:opacity-80 transition-opacity"></a>
                        <a href="#" aria-label="LinkedIn"><img src="{{ asset('assets/img/linkedln.png') }}" alt="LinkedIn" class="w-8 h-8 hover:opacity-80 transition-opacity"></a>
                    </div>
                </div>

                {{-- Section 2: Navigation --}}
                <div class="w-full lg:w-auto">
                    <h3 class="text-xl font-semibold mb-3">Navigation</h3>
                    {{-- Barre décorative centrée sur mobile, à gauche sur large --}}
                    <img src="{{ asset('assets/img/Rectangle 28.png') }}" alt="" class="w-16 h-1 mb-5 mx-auto lg:mx-0 bg-white"> {{-- Remplacement par div si c'est juste une ligne --}}
                    <ul>
                        {{-- Liens centrés sur mobile, à gauche sur large --}}
                        <li class="mb-3">
                            <a href="#" class="flex items-center justify-center lg:justify-start gap-2 hover:text-gray-300 transition-colors">
                                <img src="{{ asset('assets/img/Vector (1).png') }}" alt="" class="h-3">
                                <span>Accueil</span>
                            </a>
                        </li>
                        <li class="mb-3">
                             <a href="{{ route('apropos') }}" class="flex items-center justify-center lg:justify-start gap-2 hover:text-gray-300 transition-colors">
                                 <img src="{{ asset('assets/img/Vector (1).png') }}" alt="" class="h-3">
                                 <span>A Propos</span>
                             </a>
                        </li>
                        <li class="mb-3">
                             <a href="#" class="flex items-center justify-center lg:justify-start gap-2 hover:text-gray-300 transition-colors">
                                 <img src="{{ asset('assets/img/Vector (1).png') }}" alt="" class="h-3">
                                 <span>Services</span>
                             </a>
                        </li>
                        <li>
                             <a href="#" class="flex items-center justify-center lg:justify-start gap-2 hover:text-gray-300 transition-colors">
                                 <img src="{{ asset('assets/img/Vector (1).png') }}" alt="" class="h-3">
                                 <span>Contacts</span>
                             </a>
                        </li>
                    </ul>
                </div>

                {{-- Section 3: Horaire --}}
                <div class="w-full lg:w-auto">
                    <h3 class="text-xl font-semibold mb-3">Horaire</h3>
                     <img src="{{ asset('assets/img/Rectangle 28.png') }}" alt="" class="w-16 h-1 mb-5 mx-auto lg:mx-0 bg-white">
                    <p class="mb-4 text-base">
                        Nos services sont disponibles !! <br>
                        Nous restons à votre écoute pour <br>
                        répondre à vos besoins durant nos <br>
                        horaires d'ouverture.
                    </p>
                    {{-- Utilisation de flex pour un meilleur alignement potentiel --}}
                    <div class="space-y-1 text-base">
                        <p><span class="font-medium">Lundi-Vendredi</span> <span class="opacity-0">....</span> 7h00 - 22h30</p>
                        <p><span class="font-medium">Samedi-Dimanche</span> <span class="opacity-0">..</span> 7h00 - 22h30</p>
                    </div>
                </div>

                {{-- Section 4: Newsletter --}}
                <div class="w-full lg:w-auto">
                    <h3 class="text-xl font-semibold mb-3">Newsletter</h3>
                    <img src="{{ asset('assets/img/Rectangle 28.png') }}" alt="" class="w-16 h-1 mb-5 mx-auto lg:mx-0 bg-white">
                    <p class="mb-4 text-base">
                        Abonnez-vous à notre newsletter <br>
                        pour recevoir toutes nos actualités <br>
                        dans votre boîte mail.
                    </p>
                    {{-- Formulaire simplifié et responsif --}}
                    <form action="#" method="POST" class="mt-4">
                        {{--
                            flex-col: Input au-dessus du bouton sur mobile
                            sm:flex-row: Input à côté du bouton sur écrans sm et plus
                        --}}
                        <div class="flex flex-col sm:flex-row gap-2 justify-center lg:justify-start">
                            <label for="email-newsletter" class="sr-only">Email</label> {{-- Pour l'accessibilité --}}
                            <input type="email" id="email-newsletter" name="email" required
                                   class="w-full sm:w-auto flex-grow px-4 py-2 border-2 border-white rounded-md bg-transparent placeholder-white/70 focus:outline-none focus:border-white focus:ring-1 focus:ring-white text-white"
                                   placeholder="Votre Email">
                            <button type="submit"
                                    class="px-5 py-2 bg-white text-[#176abc] font-semibold rounded-md hover:bg-gray-200 transition-colors">
                                S'abonner
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        {{-- Ligne Copyright --}}
        <div class="border-t border-white/30 py-6 text-center">
             {{-- text-sm: petit texte sur mobile, md:text-base: texte normal sur écrans moyens et plus --}}
            <p class="text-sm md:text-base text-white">© Copyright {{ date('Y') }} | All Rights Reserved by TIWA Dilane</p>
        </div>
    </footer>


    <script src="{{ asset('assets/js/add.js') }}"></script>
    <script src="{{ asset('assets/js/welcome.js') }}"></script>
    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>

</body>
</html>
