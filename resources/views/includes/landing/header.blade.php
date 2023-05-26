<section
    class="h-full w-full border-box transition-all duration-500 linear lg:px-16 md:px-20 px-8 py-8 bg-white">
    <div class="navbar-1-1" style="font-family: 'Poppins', sans-serif">
        <div class=" mx-auto flex flex-wrap flex-row items-center justify-between">

            <label for="menu-toggle" class="cursor-pointer lg:hidden block">
                <svg class="w-6 h-6" fill="none" stroke="#092A33" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </label>

            <input class="hidden" type="checkbox" id="menu-toggle" />

            <div class="hidden lg:flex lg:items-center lg:w-auto w-full flex-wrap items-center text-base justify-center" id="menu">
                <nav class="lg:space-x-12 space-x-0 lg:flex items-center justify-between text-base pt-8 lg:pt-0 lg:space-y-0 space-y-6">
                    <a href="{{ route('index') }}" class="block {{request()->is('/') ? 'nav-link active font-medium' : 'nav-link text-gray-500'}}">Home</a>
                    <a href="{{ route('explore.landing') }}" class="block {{request()->is('explore') ? 'nav-link active font-medium' : 'nav-link text-gray-500'}}">Daftar Service</a>
                    <a href="#" class="block nav-link text-gray-500">About Us</a>
                </nav>
            </div>

            {{-- nama ARC pojok kiri header --}}
            <div>
                <a href="{{ route('index')}}" class="flex text-3xl font-bold items-center">
                    <img src="{{asset('/assets/images/brand-logo/logo-arc.png')}}" alt="ARC" width="88" height="47">
                </a>
            </div>

            <div class="hidden lg:flex lg:items-center lg:w-auto w-full lg:px-3" id="menu">
                <button
                    onclick="toggleModal('loginModal')"
                    class="lg:bg-btn-deactive items-center border-0 lg:inline-block lg:py-3 lg:px-10 focus:outline-none rounded-2xl font-medium text-base mt-6 mr-1 lg:mt-0">
                    Sign In
                </button>

                <button
                    onclick="toggleModal('registerModal')"
                    class="lg:bg-arc-bg items-center border-0 lg:inline-block lg:py-3 lg:px-10 focus:outline-none rounded-2xl font-medium text-white mt-6 lg:mt-0">
                    Sign Up
                </button>
            </div>

        </div>
    </div>
</section>
