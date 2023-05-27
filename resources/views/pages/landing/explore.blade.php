@extends('layouts.front')

@section('title', 'Explore')

@section('content')
    <div class="content">
        <!-- services -->
        <div class="bg-arc-soft/10 overflow-hidden">

            {{-- containter content --}}
            <div class="pt-16 pb-16 lg:pb-20 md:px-16 sm:px-8 px-8 mx-auto">

                {{-- judul page center --}}
                <div class="text-center">
                    <h1 class="text-3xl font-semibold mb-1">Katalog Service</h1>
                    <p class="leading-8 text-gray-700">
                        ARC Platform menyediakan berbagai macam service dari para arsitek handal
                    </p>
                    <p class="leading-8 text-gray-700 mb-10">
                        yang dapat membantu anda dalam memenuhi kebutuhan
                    </p>
                </div>

                {{-- container category + isi --}}
                <div class="flex ">
                    {{-- buat category --}}
                    <div class="category-option">
                        <h2 class=" font-bold text-2xl">Category</h2>
                        <nav class="my-2" aria-label="navigation">
                            <a class="bg-arc-bg text-white block sm:inline-block my-1 py-2 px-8 font-medium rounded-xl" href="#">
                                All Services
                            </a>
                            <a class="bg-arc-bg/10 text-black/80 block sm:inline-block my-1 py-2 px-8 font-medium rounded-xl" href="#">
                                Programming & Tech
                            </a>
                            <a class="bg-arc-bg/10 text-black/80 block sm:inline-block my-1 py-2 px-8 font-medium rounded-xl" href="#">
                                Graphic Design
                            </a>
                            <a class="bg-arc-bg/10 text-black/80 block sm:inline-block my-1 py-2 px-8 font-medium rounded-xl" href="#">
                                Digital Marketing
                            </a>
                            <a class="bg-arc-bg/10 text-black/80 block sm:inline-block my-1 py-2 px-8 font-medium rounded-xl" href="#">
                                Business
                            </a>
                        </nav>
                    </div>

                    <div class="content-isi">
                        <div class="grid grid-cols lg:grid-cols-3 md:grid-cols-2 gap-4">
                            @include('components.landing.service-explore')
                        </div>
                        <div class="text-center mt-10">
                            <a class="bg-arc-bg text-white block sm:inline-block my-2 py-2 px-8 mx-4 font-medium rounded-xl" href="#">
                                Load More
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
@endsection
