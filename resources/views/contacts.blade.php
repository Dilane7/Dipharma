@extends('base')

@section('content')

<section>
    <div class="relative w-full my-10">
        <img src="{{ asset('assets/img/fun-bg.jpg') }}" alt="" class="object-cover h-80 w-full">
        <div class="bg-[#176abc]/70 text-white  h-80 absolute w-full top-0 z-1 flex justify-center items-center">
            <div>
                <h1 class="font-semibold text-4xl">Contactez-nous</h1>
                <span class="flex justify-center gap-2 my-2">
                    <a href="index.html" class="hover:text-[#014c6e]">Acceuil</a> <span> >  Contacts</span>
                </span>
            </div>
        </div>
    </div>
</section>
<section class="">
    <div class=" md:flex  flex-column md:justify-between w-[75%] h-155  mx-auto mb-5 shadow-sm shadow-[gray] rounded-sm">
        <div class="w-full md:w-1/2 h-full">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1074.5703079058596!2d9.769857342793625!3d4.0874460131797!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10610c2cb25acddf%3A0xac32c10f4e1c059e!2sGabon%20Bar%2C%20Douala!5e0!3m2!1sfr!2scm!4v1743005724420!5m2!1sfr!2scm"
                class="h-full w-full"
                style="border:0;"
                allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
        <div class="w-full md:w-1/2 p-8 mx-0 md:mx-7 ">
            <form action="">
                <h1 class="text-3xl text-[#176abc] ">Contactez-nous</h1>
                <img src="{{ asset('assets/img/Rectangle.png') }}" class="w-25 my-4 pl-1" alt="">
                <h3 class=" text-xl">Si vous avez des questions, n'hésitez pas à nous contacter.</h3>
                <div class="pt-5 ">
                    <div class="w-full flex justify-between gap-10">
                        <div class="w-1/2">
                            <input type="text" class="w-full  px-4 h-[45px] mt-2 rounded-md shadow-sm shadow-[#176abc]/75 outline-[#44C244]/75 " placeholder="Nom" >
                        </div>
                        <div class="w-1/2">
                            <input type="text" class="w-full  px-4  h-[45px] mt-2 rounded-md shadow-sm shadow-[#176abc]/75  outline-[#44C244]/75 " placeholder="Prenom">
                        </div>
                    </div>
                    <div class="w-full flex justify-between gap-10 mt-5">
                        <div class="w-1/2">
                            <input type="text" class="w-full  px-4 h-[45px] mt-2 rounded-md shadow-sm shadow-[#176abc]/75 outline-[#44C244]/75 " placeholder="Tel" >
                        </div>
                        <div class="w-1/2">
                            <input type="text" class="w-full  px-4  h-[45px] mt-2 rounded-md shadow-sm shadow-[#176abc]/75  outline-[#44C244]/75 " placeholder="Email">
                        </div>
                    </div>
                    <div class="w-full flex justify-between gap-10 mt-5">
                        <div class="w-full">
                            <input type="text" class="w-full  px-4 h-[45px] mt-2 rounded-md shadow-sm shadow-[#176abc]/75 outline-[#44C244]/75 " placeholder="Objet" >
                        </div>
                    </div>
                    <div class="w-full flex justify-between gap-10 my-7">
                        <div class="w-full">
                            <textarea name="" id="" rows="5" class="w-full  px-4  mt-2 rounded-md shadow-sm shadow-[#176abc]/75 outline-[#44C244]/75 " placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="w-full flex justify-between gap-10 mt-5">
                        <div class="w-full">
                            <button class="bg-[#44C244] text-white w-full text-center rounded-md py-1 text-2xl shadow-sm shadow-[gray] font-bold ">
                                Envoyer
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<section>
    <div class=" flex justify-between w-[75%] mx-auto mt-10 mb-5">
        <div class="flex justify-between items-center bg-[#176abc] py-9 px-10 rounded-xl gap-3 shadow-md shadow-[gray]/50 hover:">
            <img src="{{ asset('assets/img/location-sign.png') }}" alt="" class="w-10 h-10">
            <h3 class="text-white text-2xl ">Logpom, Douala</h3>
        </div>
        <div class="flex justify-between items-center bg-[#176abc] py-9 px-10 rounded-xl gap-3 shadow-md shadow-[gray]/50">
            <img src="{{ asset('assets/img/email.png') }}" alt="" class="w-10 h-10">
            <h3 class="text-white text-xl ">tsaguedilane7@gmail.com</h3>
        </div>
        <div class="flex justify-between items-center bg-[#176abc] py-9 px-10 rounded-xl gap-3 shadow-md shadow-[gray]/50">
            <img src="{{ asset('assets/img/phone-call.png') }}" alt=""  class="w-10 h-10">
            <h3 class="text-white text-xl ">(+237)6 95 74 63 80</h3>
        </div>
    </div>
</section>

@endsection
