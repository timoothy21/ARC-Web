@extends('layouts.app')

@section('title', 'Add Service')

@section('content')

    <main class="h-full overflow-y-auto">
        <div class="container mx-auto">
            <div class="grid w-full gap-5 px-10 mx-auto md:grid-cols-12">
                <div class="col-span-12">
                    <h2 class="mt-8 mb-1 text-2xl font-semibold text-gray-700">
                        Add Your Service
                    </h2>
                    <p class="text-sm text-gray-400">
                        Upload the services you provide
                    </p>
                </div>
            </div>
        </div>

        <!-- breadcrumb -->
        <nav class="mx-10 mt-8 text-sm" aria-label="Breadcrumb">
            <ol class="inline-flex p-0 list-none">
                <li class="flex items-center">
                    <a href="{{ route('member.service.index') }}" class="text-gray-400">My Services</a>
                    <svg class="w-3 h-3 mx-3 text-gray-400 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                        <path d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" />
                    </svg>
                </li>
                <li class="flex items-center">
                    <p href="#" class="font-medium">Add Your Service</p>
                </li>
            </ol>
        </nav>

        <section class="container px-6 mx-auto mt-5">
            <div class="grid gap-5 md:grid-cols-12">
                <main class="col-span-12 p-4 md:pt-0">
                    <div class="px-2 py-2 mt-2 bg-white rounded-xl">

                        <form action="{{ route('member.service.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div>
                                <div class="px-4 py-5 sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6">
                                            <label for="title" class="block mb-3 font-medium text-gray-700 text-md">Judul Service</label>
                                            <input placeholder="Service apa yang ingin kamu tawarkan?" type="text" name="title" id="title" autocomplete="service-name" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('title') }}" required>

                                            @if($errors->has('title'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('title') }}</p>
                                            @endif

                                        </div>

                                        <div class="col-span-6">
                                            <label for="description" class="block mb-3 font-medium text-gray-700 text-md">Deskripsi Service</label>
                                            <input placeholder="Jelaskan Service apa yang kamu tawarkan?" type="text" name="description" id="description" autocomplete="service-name" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('description') }}" required>

                                        @if($errors->has('description'))
                                            <p class="text-red-500 mb-3 text-sm">{{ $errors->first('description') }}</p>
                                        @endif

                                        </div>

                                        <div class="col-span-6">
                                            <label for="addvantage-service" class="block mb-2 font-medium text-gray-700 text-md">Keunggulan Service kamu</label>
                                            <p class="block mb-3 text-sm text-gray-700">
                                                Hal apa aja yang didapatkan dari service kamu?
                                            </p>

                                            <div class="inputFormServicesRow relative">
                                                <input placeholder="Keunggulan Service" type="text" name="advantage-service[]" id="addvantage-service" autocomplete="addvantage-service" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('advantage-service[]') }}" required>
                                            </div>

                                            <div id="newServicesRow"></div>
                                            <button type="button" class="inline-flex justify-center px-3 py-2 mt-3 text-xs font-medium text-gray-700 bg-gray-100 border border-transparent rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" id="addServicesRow">
                                                Tambahkan Keunggulan +
                                            </button>
                                        </div>

                                        <div class="col-span-6 -mb-6">
                                            <label for="estimation & revision" class="block mb-3 font-medium text-gray-700 text-md">Estimasi Service & Jumlah Revisi</label>
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <input placeholder="Butuh Berapa hari service kamu selesai?" type="number" name="delivery_time" id="delivery_time" autocomplete="delivery_time" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('delivery_time') }}" required>
                                            @if($errors->has('delivery-time'))
                                                <p class="text-red-500 mb-3 text-sm">
                                                    {{ $errors->first('delivery-time') }}
                                                </p>
                                            @endif

                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <input placeholder="Maksimal Revisi" type="number" name="revision_limit" id="revision_limit" autocomplete="revision_limit" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('revision_limit') }}" required>
                                            @if($errors->has('revision-limit'))
                                                <p class="text-red-500 mb-3 text-sm">
                                                    {{ $errors->first('revision-limit') }}
                                                </p>
                                            @endif
                                        </div>

                                        <div class="col-span-6">
                                            <label for="price" class="block mb-3 font-medium text-gray-700 text-md">Harga Service Kamu</label>
                                            <input placeholder="Total Harga Service Kamu" type="number" name="price" id="price" autocomplete="price" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('price') }}" required>
                                            @if($errors->has('price'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('price') }}</p>
                                            @endif
                                        </div>

                                        <div class="col-span-6">
                                            <label for="thumbnail-service" class="block mb-3 font-medium text-gray-700 text-md">Thumbnail Service Feeds</label>
                                            {{-- <input placeholder="Thumbnail" type="file" name="thumbnail[]" id="thumbnail" autocomplete="thumbnail" class="block w-full py-3 pl-5 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm"> --}}

                                            <div class="inputFormThumbnailRow relative">
                                                <input placeholder="Thumbnail" type="file" name="thumbnail[]" id="thumbnail" autocomplete="thumbnail" class="block w-full py-3 pl-5 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">
                                            </div>

                                            <div id="newThumbnailRow"></div>
                                            <button type="button" class="inline-flex justify-center px-3 py-2 mt-3 text-xs font-medium text-gray-700 bg-gray-100 border border-transparent rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" id="addThumbnailRow">
                                                Tambahkan Gambar +
                                            </button>
                                        </div>

                                        <div class="col-span-6">
                                            <label for="advantage_user" class="block mb-3 font-medium text-gray-700 text-md">My Experiences</label>
                                            <div class="inputFormAdvantagesRow relative">
                                                <input placeholder="Keunggulan" type="text" name="advantage-user[]" id="advantage_user" autocomplete="advantage_user" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{old('advantage-user[]')}}" required>
                                            </div>

                                            <div id="newAdvantagesRow"></div>
                                            <button type="button" class="inline-flex justify-center px-3 py-2 mt-3 text-xs font-medium text-gray-700 bg-gray-100 border border-transparent rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" id="addAdvantagesRow">
                                                Tambahkan Experience +
                                            </button>
                                        </div>
                                        <div class="col-span-6">
                                            <label for="note" class="block mb-3 font-medium text-gray-700 text-md">Note <span class="text-gray-400"></span></label>
                                            <input placeholder="Hal yang ingin disampaikan oleh kamu?" type="text" name="note" id="note" autocomplete="note" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('note')}}">

                                            @if($errors->has('note'))
                                                <p class="text-red-500 mb-3 text-sm">{{ $errors->first('note') }}</p>
                                            @endif

                                        </div>
                                        <div class="col-span-6">
                                            <label for="taglines" class="block mb-3 font-medium text-gray-700 text-md">My Skills<span class="text-gray-400"></span></label>
                                            <div class="inputFormTaglineRow relative">
                                                <input placeholder="Tagline" type="text" name="tagline[]" id="tagline" autocomplete="tagline" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" value="{{ old('tagline[]')}}" required>
                                            </div>

                                            <div id="newTaglineRow"></div>
                                            <button type="button" class="inline-flex justify-center px-3 py-2 mt-3 text-xs font-medium text-gray-700 bg-gray-100 border border-transparent rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" id="addTaglineRow">
                                                Tambahkan Skill +
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 text-right sm:px-6">
                                    <a href="{{ route('member.service.index') }}" class="inline-flex justify-center items-center px-4 py-2 mr-4 text-sm font-medium text-gray-700 bg-white border border-gray-600 rounded-lg shadow-sm hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-300" onclick="return confirm('Are you sure want to cancel? , Any changes you make will not be saved.')">
                                        Cancel
                                    </a>
                                    <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-green-600 border border-transparent rounded-lg shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                        Create Service
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </main>
            </div>
        </section>
    </main>

@endsection

@push('after-script')

    <script src="{{ url('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js')}}"></script>
    <script type="text/javascript">
        // add row
        $("#addAdvantagesRow").click(function() {
            var html = '';
            html += '<div class="inputFormAdvantagesRow relative">';
            html += '<input placeholder="Keunggulan Anda" type="text" name="advantage-user[]" id="advantage-user" autocomplete="advantage-user" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>';
            html += '<button type="button" class="removeAdvantagesRow absolute top-0 right-0 mt-1 mr-1 rounded-full bg-red-500 p-1 hover:bg-red-600" title="Hapus">'
            html += '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">'
            html += '<path fill-rule="evenodd" d="M10 1.667c-4.601 0-8.333 3.732-8.333 8.333 0 4.6 3.732 8.332 8.333 8.332 4.6 0 8.332-3.732 8.332-8.332 0-4.601-3.732-8.333-8.332-8.333zm0 1.666c3.633 0 6.667 2.934 6.667 6.667 0 3.634-2.934 6.668-6.667 6.668-3.634 0-6.668-2.934-6.668-6.668 0-3.633 2.934-6.667 6.668-6.667zm4.817 5.102l-1.92-1.92L10 8.083 7.103 5.086l-1.92 1.92L8.082 10l-2.997 2.897 1.92 1.92L10 11.918l2.897 2.996 1.92-1.92L11.918 10l2.897-2.897z" clip-rule="evenodd" />'
            html += '</svg>'
            html += '</button>'
            html += '</div>'

            $('#newAdvantagesRow').append(html);
        });

        // remove row
        $(document).on('click', '.removeAdvantagesRow', function() {
            $(this).closest('.inputFormAdvantagesRow').remove();
        });
    </script>

    <script type="text/javascript">
        // add row
        $("#addServicesRow").click(function() {
            var html = '';
            html += '<div class="inputFormServicesRow relative">';
            html += '<input placeholder="Keunggulan Service" type="text" name="advantage-service[]" id="addvantage-service" autocomplete="addvantage-service" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>';
            html += '<button type="button" class="removeServicesRow absolute top-0 right-0 mt-1 mr-1 rounded-full bg-red-500 p-1 hover:bg-red-600" title="Hapus">'
            html += '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">'
            html += '<path fill-rule="evenodd" d="M10 1.667c-4.601 0-8.333 3.732-8.333 8.333 0 4.6 3.732 8.332 8.333 8.332 4.6 0 8.332-3.732 8.332-8.332 0-4.601-3.732-8.333-8.332-8.333zm0 1.666c3.633 0 6.667 2.934 6.667 6.667 0 3.634-2.934 6.668-6.667 6.668-3.634 0-6.668-2.934-6.668-6.668 0-3.633 2.934-6.667 6.668-6.667zm4.817 5.102l-1.92-1.92L10 8.083 7.103 5.086l-1.92 1.92L8.082 10l-2.997 2.897 1.92 1.92L10 11.918l2.897 2.996 1.92-1.92L11.918 10l2.897-2.897z" clip-rule="evenodd" />'
            html += '</svg>'
            html += '</button>'
            html += '</div>'

            $('#newServicesRow').append(html);
        });

        // remove row
        $(document).on('click', '.removeServicesRow', function() {
            $(this).closest('.inputFormServicesRow').remove();
        });
    </script>

    <script type="text/javascript">
        // add row
        $("#addTaglineRow").click(function() {
            var html = '';
            html += '<div class="inputFormTaglineRow relative">';
            html += '<input placeholder="Tagline" type="text" name="tagline[]" id="tagline" autocomplete="tagline" class="block w-full py-3 mt-1 border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm" required>';
            html += '<button type="button" class="removeTaglineRow absolute top-0 right-0 mt-1 mr-1 rounded-full bg-red-500 p-1 hover:bg-red-600" title="Hapus">'
            html += '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">'
            html += '<path fill-rule="evenodd" d="M10 1.667c-4.601 0-8.333 3.732-8.333 8.333 0 4.6 3.732 8.332 8.333 8.332 4.6 0 8.332-3.732 8.332-8.332 0-4.601-3.732-8.333-8.332-8.333zm0 1.666c3.633 0 6.667 2.934 6.667 6.667 0 3.634-2.934 6.668-6.667 6.668-3.634 0-6.668-2.934-6.668-6.668 0-3.633 2.934-6.667 6.668-6.667zm4.817 5.102l-1.92-1.92L10 8.083 7.103 5.086l-1.92 1.92L8.082 10l-2.997 2.897 1.92 1.92L10 11.918l2.897 2.996 1.92-1.92L11.918 10l2.897-2.897z" clip-rule="evenodd" />'
            html += '</svg>'
            html += '</button>'
            html += '</div>'

            $('#newTaglineRow').append(html);
        });

        // remove row
        $(document).on('click', '.removeTaglineRow', function() {
            $(this).closest('.inputFormTaglineRow').remove();
        });
    </script>

    <script type="text/javascript">
        // add row
        $("#addThumbnailRow").click(function() {
            var html = '';
            html += '<div class="inputFormThumbnailRow relative">';
            html += '<input placeholder="Thumbnail" type="file" name="thumbnail[]" id="thumbnail" autocomplete="thumbnail" class="block w-full py-3 pl-5 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-green-500 focus:border-green-500 sm:text-sm">';
            html += '<button type="button" class="removeThumbnailRow absolute top-0 right-0 mt-1 mr-1 rounded-full bg-red-500 p-1 hover:bg-red-600" title="Hapus">'
            html += '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">'
            html += '<path fill-rule="evenodd" d="M10 1.667c-4.601 0-8.333 3.732-8.333 8.333 0 4.6 3.732 8.332 8.333 8.332 4.6 0 8.332-3.732 8.332-8.332 0-4.601-3.732-8.333-8.332-8.333zm0 1.666c3.633 0 6.667 2.934 6.667 6.667 0 3.634-2.934 6.668-6.667 6.668-3.634 0-6.668-2.934-6.668-6.668 0-3.633 2.934-6.667 6.668-6.667zm4.817 5.102l-1.92-1.92L10 8.083 7.103 5.086l-1.92 1.92L8.082 10l-2.997 2.897 1.92 1.92L10 11.918l2.897 2.996 1.92-1.92L11.918 10l2.897-2.897z" clip-rule="evenodd" />'
            html += '</svg>'
            html += '</button>'
            html += '</div>'

            $('#newThumbnailRow').append(html);
        });

        // remove row
        $(document).on('click', '.removeThumbnailRow', function() {
            $(this).closest('.inputFormThumbnailRow').remove();
        });
    </script>

@endpush
