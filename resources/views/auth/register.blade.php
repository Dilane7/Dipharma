<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<!-- bg-[#f2f4f7] ancien backgound-->
<body class=" bg-[url('{{ asset('assets/img/medicines-medical-supplies-placed-blue.jpg') }}')] bg-cover bg-center place-content-center">
    <section class="flex justify-center items-center  w-full ">
        <div class=" flex justify-between bg-[#ffffff] rounded-xl drop-shadow-2xl ">

            <div class=" hidden md:block lg:block  ">
                <img class="object-cover h-full rounded-tl-lg rounded-bl-xl " src="{{ asset('assets/img/funny-3d-cartoon-casual-character-woman.jpg') }}" alt="" >

            </div>

            <div class="p-5 items-center">
                <div class="flex justify-center mb-1 "><img src="{{ asset('assets/img/Logo dilane 2.png') }}" class="w-[100px] h-[70px]" alt=""></div>

                <form action="{{ route('register') }}" method="POST" class="w-[320px]">
                    @csrf
                    <div class="flex flex-col">
                        <label for="name" class="pb-1">Nom :</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="placeholder:text-center px-5 bg-white shadow-sm shadow-[#44c244]/75 rounded-md h-[35px] mb-3 focus:outline-1 focus:outline-green-500 " placeholder="Entrez Votre Nom" >
                        @error('name')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                     <div class="flex flex-col">
                        <label for="email" class="pb-1">E-mail :</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" class="placeholder:text-center px-5 bg-white shadow-sm shadow-[#44c244]/75 rounded-md h-[35px] mb-3 focus:outline-1 focus:outline-green-500 " placeholder="Entrez Votre adresse email" >
                        @error('email')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col">
                        <label for="telephone" class="pb-1">Tel :</label>
                        <input type="text" id="telephone" name="telephone" value="{{ old('telephone') }}"   class="placeholder:text-center px-5 bg-white shadow-sm shadow-[#44c244]/75 rounded-md h-[35px] mb-3 focus:outline-1 focus:outline-green-500 " placeholder="Entrez Votre numero" >
                        @error('telephone')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-2">
                        <label for="password" class="pb-1">Mot de passe :</label>
                        <input type="password" name="password" id="password" class="placeholder:text-center px-5 bg-white  shadow-sm shadow-[#44c244]/75 rounded-md h-[35px] mb-3 focus:outline-1 focus:outline-green-500" placeholder="Entrez votre mot passe" >
                        @error('password')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col mb-3">
                        <label for="password_confirmation" class="pb-1">Confirmez mot de passe :</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="placeholder:text-center px-5 bg-white  shadow-sm shadow-[#44c244]/75 rounded-md h-[35px] mb-3 focus:outline-1 focus:outline-green-500" placeholder="Confirmez votre mot passe" >
                        @error('password_confirmation')
                            <p class="text-red-500 text-xs italic">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex flex-col" >
                        <span class="flex justify-center ">
                            <button class="flex gap-2 bg-[#44C244] hover:bg-white hover:text-[#44c244] hover:border hover:boder-[#44c244] hover:outline-2  text-white rounded-md px-5 py-1 font-semibold shadow-sm shadow-[gray] focus:outline-2 focus:outline-offset-2 focus:outline-[#44C244] active:bg-[#44C244]">
                                S'inscrire
                            </button>
                        </span>
                        <p class="my-2 text-gray-400 text-center font-semibold">Vous avez déja un compte ?</p>
                        <span class="flex justify-center"><hr class="w-[280px] opacity-25"></span>

                        <span class="flex justify-center ">
                            <a href="{{ route('login') }}" class="flex gap-2 bg-[#176abc] hover:bg-white hover:text-[#176abc] hover:border hover:border-[#176abc] hover:outline-2 text-white rounded-md font-semibold px-4 py-1 mt-5 mb-1 shadow-sm shadow-[gray] focus:outline-2 focus:outline-offset-2 focus:outline-[#03A9F5] active:bg-[#03A9F5]">
                                Connexion
                            </a>
                        </span>
                    </div>

                </form>

            </div>



        </div>

    </section>
</body>
</html>
