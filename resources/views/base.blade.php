<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <header class="bg-white w-full left-0 md:fixed top-0 z-10" >
        <nav class="flex justify-between w-[75%] items-center mx-auto pt-1">
            <div>
                <img src="{{ asset('assets/img/Logo dilane 1.png') }}" alt="" class="h-auto w-22 cursor-pointer max-w-full py-2">
            </div>
            <div class="flex nav-links bg-white w-full absolute items-center left-0 md:min-h-fit md:static md:w-auto min-h-[45vh] px-15 top-[-100%] z-1">
                    <ul class="flex flex-col gap-10 md:flex-row md:gap-[4vw] md:items-center">
                        <li class="text-lg font-[Poppins] group inline-block relative">
                            <a class="text-[#176abc] hover:text-[#176abc]"  href="{{ route('welcome') }}">Acceuil</a>
                            <span class="bg-[#176abc] h-[3px] w-full absolute bottom-[-33px] group-hover:scale-x-100 left-0"></span>
                        </li>
                        <li class="text-lg font-[Poppins] group inline-block relative">
                            <a class="hover:text-[#176abc]" href="">Produits</a>
                            <span class="bg-[#176abc] h-[3px] w-full absolute bottom-[-33px] duration-300 ease-in-out group-hover:scale-x-100 left-0 scale-x-0 transform transition-transform"></span>
                        </li>
                        <li class="text-lg font-[Poppins] group inline-block relative">
                            <a class="hover:text-[#176abc]" href="#propos">A propos</a>
                            <span class="bg-[#176abc] h-[3px] w-full absolute bottom-[-33px] duration-300 ease-in-out group-hover:scale-x-100 left-0 scale-x-0 transform transition-transform"></span>
                        </li>
                        <li class="text-lg font-[Poppins] group inline-block relative">
                            <a class="hover:text-[#176abc]" href="#services">Services</a>
                            <span class="bg-[#176abc] h-[3px] w-full absolute bottom-[-33px] duration-300 ease-in-out group-hover:scale-x-100 left-0 scale-x-0 transform transition-transform"></span>
                        </li>
                        <li class="text-lg font-[Poppins] group inline-block relative">
                            <a class="hover:text-[#176abc]" href="{{ route('contacts') }}">Contacts</a>
                            <span class="bg-[#176abc] h-[3px] w-full absolute bottom-[-33px] duration-300 ease-in-out group-hover:scale-x-100 left-0 scale-x-0 transform transition-transform"></span>
                        </li>
                    </ul>
            </div>
            <div class="flex gap-5 items-center">
                <div class="flex justify-center ">
                    <a href="{{ route('login') }}" class="flex bg-[#176abc] rounded-xl shadow-[gray] shadow-sm text-white active:bg-[#176abc] focus:outline-[#176abc] focus:outline-2 focus:outline-offset-2 font-semibold gap-1 hover:bg-[#0398dd] hover:outline-2 px-2 py-[5px]">
                        <img src="{{ asset('assets/img/add-user.png') }}" alt="" class="h-[20px] w-[20px]">
                        Se connecter
                    </a>
                </div>
                <ion-icon onclick="onToggleMenu(this)" name="menu-outline" class="text-[#176abc] text-5xl cursor-pointer md:hidden"></ion-icon>
            </div>
        </nav>
    </header>


    <div>
        @yield('content')
    </div>



    <!-- footer -->

    <footer class="bg-[#176abc] mt-15">
        <div class="flex justify-between w-[75%] py-13 mx-auto text-white">
            <div>
                <div>
                    <img src="{{ asset('assets/img/Logo Diilane fb_Plan de travail 1 copie 2.png') }}" alt="" class="h-auto w-25 cursor-pointer max-w-full">
                </div>
                <div class="flex gap-4 mt-8">
                    <img src="{{ asset('assets/img/facebo.png') }}" alt="" class="w-8 h-8">
                    <img src="{{ asset('assets/img/twitter (2).png') }}" alt="" class="w-8 h-8">
                    <img src="{{ asset('assets/img/pintrest.png') }}" alt="" class="w-8 h-8">
                    <img src="{{ asset('assets/img/linkedln.png') }}" alt="" class="w-8 h-8">
                </div>
            </div>
            <div>
                <h1 class="text-xl  mb-3">Navigation</h1>
                <img src="{{ asset('assets/img/Rectangle 28.png') }}" alt="" class="w-15">
                <ul class="text-lg  gap-5">

                    <li class="flex items-center pt-5 pb-3 gap-2"><img src="{{ asset('assets/img/Vector (1).png') }}" alt="" class="h-3 "><a href="">Acceuil</a> </li>
                    <li class="flex items-center  gap-2"><img src="{{ asset('assets/img/Vector (1).png') }}" alt="" class="h-3 ">A Propos</li>
                    <li class="flex items-center py-4 gap-2"><img src="{{ asset('assets/img/Vector (1).png') }}" alt="" class="h-3 ">Services</li>
                    <li class="flex items-center gap-2"><img src="{{ asset('assets/img/Vector (1).png') }}" alt="" class="h-3 ">Contacts</li>
                </ul>
            </div>
            <div>
                <h1 class="text-xl  mb-3">Horaire</h1>
                <img src="{{ asset('assets/img/Rectangle 28.png') }}" alt="" class="w-15 mb-5">
                <p class="text-lg ">Lundi-Vendredi <span class="text-white">...........</span>   7h00-22h30</p>
                <p class="text-lg ">Samedi-Dimanche <span class="text-white">.......</span>   7h00-22h30</p>

            </div>
            <div>
                <h1 class="text-xl  mb-3">Newsletter</h1>
                <img src="{{ asset('assets/img/Rectangle 28.png') }}" alt="" class="w-15">
                <h3 class="py-4 text-lg font-[poppins]">
                    Abonnez-vous à notre newsletter <br>
                    pour recevoir toutes nos actualités <br>
                    dans votre boîte mail.
                </h3>
                <span class="relative">
                    <input type="email" class="w-full outline-white border-2 h-[44px] border-white rounded-md px-4" placeholder="Email">
                    <img src="{{ asset('assets/img/Group 25.png') }}" alt="" class="absolute -bottom-3  right-0 h-[45px] rounded-tr rounded-br ">
                </span>
            </div>
        </div>
        <div class="flex justify-center py-9 border-t border-white/50">
            <h2 class="text-lg text-white">© Copyright 2025 | All Rights Reserved by TIWA Dilane</h2>
        </div>
    </footer>



    <script src="{{ asset('assets/js/welcome.js') }}"></script>
    <script src="https://unpkg.com/flowbite@1.4.0/dist/flowbite.js"></script>

</body>
</html>
