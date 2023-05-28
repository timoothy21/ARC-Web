@extends('layouts.front')

@section('title', 'Booking Success')

@section('content')

    <!-- success -->
    <section class="w-auto flex min-h-[85vh] pt-6 pb-20 mx-auto lg:mx-12 px-4">
        <div class="m-auto text-center h-auto">

            <svg class="mb-6 w-full" width="490" height="350" viewBox="0 0 490 350" fill="none"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink">
                <circle cx="245" cy="175" r="174" stroke="#F4F4FA" stroke-width="2" stroke-linecap="round"/>
                <circle cx="245" cy="175" r="110" fill="white" stroke="#F4F4FA" stroke-width="40"/>
                <g filter="url(#filter0_d)">
                    <mask id="mask0" mask-type="alpha" maskUnits="userSpaceOnUse" x="375" y="125" width="100" height="100">
                        <circle r="50" transform="matrix(-1 0 0 1 425 175)" fill="#C4C4C4"/>
                    </mask>
                    <g mask="url(#mask0)">
                        <rect x="375" y="126" width="100" height="99" fill="url(#pattern0)"/>
                    </g>
                    <circle r="49" transform="matrix(-1 0 0 1 425 175)" stroke="white" stroke-width="2"/>
                </g>
                <g filter="url(#filter1_d)">
                    <mask id="mask1" mask-type="alpha" maskUnits="userSpaceOnUse" x="15" y="126" width="100" height="100">
                        <circle r="50" transform="matrix(-1 0 0 1 65 176)" fill="#C4C4C4"/>
                    </mask>
                    <g mask="url(#mask1)">
                        <rect x="15" y="125" width="100" height="100" fill="url(#pattern1)"/>
                    </g>
                    <circle r="49" transform="matrix(-1 0 0 1 65 176)" stroke="white" stroke-width="2"/>
                </g>
                <circle r="6.5" transform="matrix(1 0 0 -1 368.5 52.5)" fill="#22B07D"/>
                <circle r="6.5" transform="matrix(1 0 0 -1 113.5 58.5)" fill="#22B07D"/>
                <circle r="6.5" transform="matrix(1 0 0 -1 296.5 291.5)" fill="#22B07D"/>
                <line x1="116" y1="175" x2="374" y2="175" stroke="#22B07D" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="12 12"/>
                <circle cx="245" cy="175" r="30" fill="#FF7878"/>
                {{-- path logo --}}
                <defs>
                    <filter id="filter0_d" x="360" y="110" width="130" height="130" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                        <feOffset/>
                        <feGaussianBlur stdDeviation="7.5"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0.3625 0 0 0 0 0.3625 0 0 0 0 0.3625 0 0 0 0.16 0"/>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
                    </filter>
                    <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                        <use xlink:href="#image1" transform="translate(0 -0.00505051) scale(0.002)"/>
                    </pattern>
                    <filter id="filter1_d" x="0" y="111" width="130" height="130" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"/>
                        <feOffset/>
                        <feGaussianBlur stdDeviation="7.5"/>
                        <feColorMatrix type="matrix" values="0 0 0 0 0.3625 0 0 0 0 0.3625 0 0 0 0 0.3625 0 0 0 0.16 0"/>
                        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow"/>
                        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow" result="shape"/>
                    </filter>
                    <pattern id="pattern1" patternContentUnits="objectBoundingBox" width="1" height="1">
                        <use xlink:href="#image0" transform="scale(0.002)"/>
                    </pattern>
                    <!-- Gambar kiri -->
                    <image id="image0" width="500" height="500" xlink:href="https://img.freepik.com/free-photo/portrait-happy-young-woman-looking-camera_23-2147892777.jpg"/>
                    <!-- Gambar kanan -->
                    <image id="image1" width="500" height="500" xlink:href="https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8bWFsZSUyMHByb2ZpbGV8ZW58MHx8MHx8fDA%3D&w=1000&q=80"/>
                </defs>
            </svg>

            <h1 class="text-3xl font-bold mb-4">Successful Booking</h1>

            <p class="leading-8 text-serv-text mb-6">
            To continue payment, please contact directly <br class="lg:block hidden">
            our Freelancer through WhatsApp
            </p>

            <a href="http://wa.me/628123456789" class="bg-arc-bg text-white text-md font-medium py-4 w-80 my-2 rounded-2xl text-center inline-block">
                Continue to Chat
            </a>

            <br>

            <a href="{{ route('index')}}" class="bg-serv-services-bg text-serv-bg text-md font-medium py-4 w-80 my-2 rounded-2xl text-center inline-block">
                Back to Home
            </a>

        </div>
    </section>

@endsection
