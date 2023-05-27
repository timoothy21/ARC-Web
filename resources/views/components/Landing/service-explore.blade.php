<a href="{{route('detail.landing', $item->id)}}" class="inline-block px-3">
    <div class="w-96 h-auto overflow-hidden md:p-5 p-4 bg-white rounded-2xl inline-block">
        <div class="flex items-center space-x-2 mb-6">

            {{-- @if ($item->user->detail_user->photo != NULL)
                <img class="w-14 h-14 object-cover rounded-full mr-1" src="{{url(Storage::url($item->user->detail_user->photo))}}" alt="photo arsitek" loading="lazy">
            @else
                <svg>

                </svg>
            @endif --}}

            <div>
                <!--Author name-->
                {{-- <p class="text-gray-900 font-semibold text-lg">{{$item->user->name ?? ''}}</p>
                <p class="text-serv-text font-light text-md">
                    {{$item->user->detail_user->role ?? ''}}
                </p> --}}
            </div>
        </div>

        <!--Banner image-->

        @if ($item->thumbnail_service[0]->thumbnail != NULL)
            <img class="rounded-2xl object-cover h-48 w-full" src="{{url(Storage::url($item->thumbnail_service[0]->thumbnail))}}" alt="photo arsitek" loading="lazy">
        @else
            <img class="rounded-2xl w-full" src="{{ url('https://via.placeholder.com/750x500')}}" alt="placeholder" />
        @endif



        <!--Title-->
        <h1 class="font-semibold text-gray-900 text-lg mt-1 leading-normal py-4">
            {{$item->title ?? ''}}
        </h1>
        <!--Description-->
        <div class="max-w-full">
            @include('components.landing.rating')
        </div>

        <div class="text-center mt-5 flex justify-between w-full">
            <span
                class="text-serv-text mr-3 inline-flex items-center leading-none text-md py-1 ">
                Price starts from:
            </span>
            <span
                class="text-serv-button inline-flex items-center leading-none text-md font-semibold">
                {{number_format($item->price) ?? ''}}
            </span>
        </div>
    </div>
</a>
