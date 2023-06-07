<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            Open Market Charity
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                <a onclick="load_modal('{{ route('cart.list') }}', 'Current Cart', '')" href="#1" class="flex items-center">
                <svg class="w-5 h-5 text-purple-600" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
                <span style="margin-left:7px;" class="text-red-700">{{ Cart::getTotalQuantity()}}</span> 
                </a>
                    @if (Auth::user()->id == 1)
                    <li class="nav-item dropdown">


                        <a id="contentDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Content
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="contentDropdown">

                            <a class="dropdown-item" href="{{ route('content.index') }}">
                                View Contents
                            </a>

                            <a class="dropdown-item" onclick="load_modal('{{ route('create-slot') }}', 'Add Slot', 'small')" href="#1">
                                Add Slot
                            </a>
                            <a class="dropdown-item" onclick="load_modal('{{ route('create-category') }}', 'Add Category', 'small')" href="#1">
                                Add Category
                            </a>
                            <a class="dropdown-item" onclick="load_modal('{{ route('content.create') }}', 'Add Content')" href="#1">
                                Add Content
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endif




                    <li class="nav-item dropdown">

                        <a id="navbarDropdownProducts" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Charities by Owner
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownProducts">
                            
                @foreach ($product_owners as $owner)

                    <a class="dropdown-item" onclick="window.location.replace('/product?product_owner={{ $owner->id }}');" href="#1">
                        {{ $owner->name }}
                    </a>
                @endforeach


                        
                        </div>
                    </li>

                    <li class="nav-item dropdown">

                        <a id="navbarDropdownProducts" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Charities
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownProducts">
                            <a class="dropdown-item" href="{{ route('product.index') }}">
                                My Charity
                            </a>
                            <a class="dropdown-item" href="{{ route('product.create') }}"> 
                                Add New Charity
                            </a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">


                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" onclick="load_modal('{{ route('profile.change-password') }}', 'Change Password', 'small')" href="#1">
                                Change Password
                            </a>
                            <a class="dropdown-item" onclick="load_modal('{{ route('profile.index') }}', 'Update Profile', 'small')" href="#1">
                                Update Profile
                            </a>
                            <a class="dropdown-item" onclick="delete_account('{{ route('profile.delete-profile') }}')" href="#1">
                                Delete Profile
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>