<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connexion</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <script src="test.js"></script>
</head>
<body class="bg-[url('{{ asset('assets/img/medicines-medical-supplies-placed-blue.jpg') }}')] h-screen bg-cover bg-center place-content-center">
    <section class="flex justify-center items-center  w-full h-screen">
        <div class=" flex justify-between bg-[#f5f7fb] rounded-xl drop-shadow-2xl">
            <div class="">
                <img class="object-cove  h-full rounded-tl-lg rounded-bl-xl rounded-tr-[70px] " src="{{ asset('assets/img/GST CAM 939-10.jpg') }}" alt=""  >
            </div>
            <div class="p-5  ">
                <div class="flex justify-center mb-1 "><img src="{{ asset('assets/img/Logo dilane 2.png') }}" class="w-[100px] h-[80px]" alt=""></div>

                <form action="" class="w-[310px] ">

                     <div class="flex flex-col">
                        <label for="" class="pb-2">E-mail :</label>
                        <input type="email" class="placeholder:text-center px-5 bg-white shadow-sm shadow-[#44c244]/75 rounded-md h-[40px] mb-5 focus:outline-1 focus:outline-green-500 " placeholder="exemple@gmail.com" >
                    </div>
                    <div class="flex flex-col mb-2">
                        <label for="" class="pb-2">Mot de passe :</label>
                        <input type="password" class="placeholder:text-center px-5 bg-white  shadow-sm shadow-[#44c244]/75 rounded-md h-[40px] mb-5 focus:outline-1 focus:outline-green-500" placeholder="password" >
                    </div>
                    <div class="flex flex-col" >
                        <span class="flex justify-center ">
                            <button class="flex gap-1 bg-[#44C244] hover:bg-[#3daf3d] hover:outline-2  text-white rounded-md px-3 py-1 font-semibold shadow-sm shadow-[gray] focus:outline-2 focus:outline-offset-2 focus:outline-[#44C244#03A9F5] active:bg-[#44C244]">
                                <img src="{{ asset('assets/img/connexion.png') }}" alt="" class="w-[20px] ">
                                Connexion
                            </button>
                        </span>
                        <p class="my-2 text-gray-400 text-center font-semibold">Vous n'avez pas de compte ?</p>
                        <span class="flex justify-center"><hr class="w-[280px] opacity-25"></span>

                        <span class="flex justify-center ">

                            <a href="inscripton.html" class="flex gap-1 bg-[#176abc] hover:bg-[#0398dd] hover:outline-2 text-white rounded-md font-semibold px-3 py-1 mt-5 mb-1 shadow-sm shadow-[gray] focus:outline-2 focus:outline-offset-2 focus:outline-[#03A9F5] active:bg-[#03A9F5]">
                                <img src="{{ asset('assets/img/add-user.png') }}" alt="" class="w-[20px] h-[20px]">
                                S'inscrire
                            </a>
                        </span>
                    </div>

                </form>

            </div>
        </div>

    </section>
</body>
</html>
