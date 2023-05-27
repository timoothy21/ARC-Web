@extends('layouts.front')

@section('title', 'Home')

@section('content')

<!-- top -->
    <div class="hero-bg">

        <!-- hero -->
        <div class="hero">
            <div class="mx-auto flex pt-16 pb-16 lg:pb-20 lg:px-24 md:px-16 sm:px-8 px-8 lg:flex-row flex-col">
                <!-- Left Column -->
                <div
                    class="lg:flex-grow lg:w-1/2 flex flex-col lg:items-start lg:text-left mb-3 md:mb-12 lg:mb-0 items-center text-center justify-center">
                    <h1
                        class="text-black-1 lg:leading-normal sm:text-4xl lg:text-5xl text-3xl mb-5 font-semibold lg:mt-20 text-arc-bg">
                        Recruit the best architect
                            <br class="lg:block hidden">
                        for your project
                    </h1>
                    <p class="text-lg leading-relaxed text-slate-400 font-light tracking-wide mb-10 lg:mb-18 ">
                        Find variety of amazing architect with the best skill<br class="lg:block hidden">
                        that can suit your  needed.
                    </p>
                    <div
                        class="md:flex contents items-center mx-auto lg:mx-0 lg:flex justify-center lg:space-x-8 md:space-x-2 space-x-0">
                        <button class="bg-arc-bg text-white text-lg font-semibold py-4 px-12 my-2 rounded-lg" onclick="toggleModal('registerModal')">
                            Get Started
                        </button>
                    </div>
                </div>
                <!-- Right Column -->
                <div class="w-full flex lg:w-1/2 text-center lg:justify-end lg:items-center justify-center items-center">
                    <img class="bottom-0 lg:block lg:right-24 md:right-16 sm:right-8 right-8 w-75"
                        src="{{ asset('/assets/hero-image2.png')}}" alt="" />
                </div>
            </div>
            <div class="lg:mb-20 mb-10 flex sm:space-x-4 space-x-1">
                <div class="flex-1 flex items-center justify-center py-3 px-6">
                    <img src="{{ url('images/brand-logo/netflix.svg')}}" alt="">
                </div>
                <div class="flex-1 flex items-center justify-center py-3 px-6">
                    <img src="{{ url('images/brand-logo/amazon.svg')}}" alt="">
                </div>
                <div class="flex-1 flex items-center justify-center py-3 px-6">
                    <img src="{{ url('images/brand-logo/uber.svg')}}" alt="">
                </div>
                <div class="flex-1 flex items-center justify-center py-3 px-6">
                    <img src="{{ url('images/brand-logo/grab.svg')}}" alt="">
                </div>
                <div class="flex-1 flex items-center justify-center py-3 px-6">
                    <img src="{{ url('images/brand-logo/google.svg')}}" alt="">
                </div>
            </div>
        </div>
    </div>

<!-- content -->
    <div class="content">
        <!-- services -->
        <div class="bg-arc-soft overflow-hidden">
            <div class="pt-16 pb-16 lg:pb-20 lg:pl-24 md:pl-16 sm:pl-8 pl-8 mx-auto ">
                <div class="flex flex-col w-full items-center">
                    <h2 class="sm:text-2xl md:text-3xl md:mb-4 xl:text-4xl tracking-wider font-semibold  text-arc-bg">
                        Featured Services</h2>
                </div>
                <div class="flex overflow-x-scroll pb-10 hide-scroll-bar dragscroll -mx-3">
                    <div class="flex flex-nowrap">
                        @forelse ($services as $item)
                            @include('components.landing.service')

                            @empty
                            {{-- empty --}}

                        @endforelse
                    </div>

                </div>
            </div>
        </div>

        <!-- call to action -->
        <div class="py-10 lg:py-24 flex lg:flex-col flex-col items-center cta-bg">
            <!-- Atas Column -->
            <!-- <div class="w-full lg:w-1/2 text-center justify-center flex lg:mb-0 mb-12">
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" data-lity>
                    <img id="hero" src="{{ asset('/assets/images/video-placeholder.png')}}" alt="" class="p-5" />
                </a>
            </div> -->

            <div class="w-full lg:w-1/2 text-center justify-center flex md:mb-4 sm:m-0">

                <h2 class="text-2xl tracking-wider font-semibold mb-5 text-arc-bg md:text-3xl xl:text-4xl ">Testimoni</h2>

            </div>



            <!-- Bawah Column -->
            <!-- <div class="lg:w-1/2 w-full flex flex-col lg:items-start items-center lg:text-left text-center">
                <h2 class="md:text-4xl text-3xl font-semibold mb-10 lg:leading-normal text-medium-black">
                    Increase Productivity. <br>
                    Save Your Time & Budget.
                </h2>
                <p class="text-lg leading-relaxed text-serv-text font-light mb-10 lg:mb-18">
                    Find thousands of skilled and experienced <br class="lg:block hidden">
                    remote workers to help you accomplishing <br class="lg:block hidden">
                    your projects.
                </p>
                <a
                    href="explore.php"
                    class="bg-serv-button px-10 py-4 text-base text-white font-semibold rounded-xl cursor-pointer focus:outline-none tracking-wide">
                    Learn More
                </a> -->

                <div class="w-3/4  bg-arc-soft flex-col rounded-lg py-8 items-start justify-start mx-auto px-10 shadow-md">

                    <div class="container flex items-center pb-6 md:pb-4">
                        <div class="hidden md:flex md:justify-center md:items-center md:w-20 md:h-20">
                            <img src="{{ asset('/assets/Profil pic1.png')}}" alt="">
                        </div>

                        <div class="flex-row justify-center items-center md:pl-4 xl:text-xl sm:text-sm">
                            <p>Profesional telah mencapai kesepakatan dalam pengerjaan proyek <span class="text-arc-bg">Renovasi Desain Rumah Bapak Adi C (Tangerang)</span></p>
                            <p>02 Apr 2023</p>
                        </div>


                    </div>

                    <div class="container flex items-center pb-6 md:pb-4">
                        <div class="hidden md:flex md:justify-center md:items-center md:w-20 md:h-20">
                            <img src="{{ asset('/assets/Profil pic2.png')}}" alt="">
                        </div>

                        <div class="flex-row justify-center items-center md:pl-4 xl:text-xl sm:text-sm">
                            <p>Profesional telah mencapai kesepakatan dalam pengerjaan proyek <span class="text-arc-bg">Pra Konstruksi Take Over - Rumah Ibu Elyana</span></p>
                            <p>02 Apr 2023</p>
                        </div>


                    </div>



                </div>



            </div>
        </div>
    </div>

@endsection
