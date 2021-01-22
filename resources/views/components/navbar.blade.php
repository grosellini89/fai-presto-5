<nav class="navbar navbar-expand-md navbar-light bg-white fixed-top shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="/img/logo-arancione.png" alt="" width="50px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

                <!-- Bandiere -->
{{--                 <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        lang
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"> --}}

                        <li class="nav-item">
                            <x-language
                                lang='it'
                                nation='it'
                            />
                        </li>

                        <li class="nav-item">
                            <x-language
                                lang='en'
                                nation='gb'
                            />
                        </li>

{{--                     </div>
                </div> --}}

                {{-- Dropdown categorie --}}
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ __('ui.categoria') }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        @foreach ($categories as $category)
                        <a class="dropdown-item" href="{{route('filtercategory', ['name'=>$category->name, 'id'=>$category->id])}}"><span class=" badge badge-pill badge-primary-color"> {{ count($category->announcements->where('is_accepted', true)) }} </span> {{$category->name}}</a>
                        @endforeach
                    </div>
                </div>
                
            </ul>
            
            <!-- Central Side Of Navbar -->
            <ul class="navbar-nav mx-auto">
                <li><a href="{{route('announcement.create')}}" class="nav-link">{{ __('ui.inserisci_annuncio') }}</a></li>
            </ul>
            
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">

                {{-- Search --}}
                <form action="{{ route('search') }}" method="get" class="form-inline my-2 my-lg-0 mr-3">
                    <input class="form-control mr-sm-0 input-custom-search" type="search" placeholder="{{ __('ui.cerca') }}" aria-label="Search" name="q">
                    <button class="btn my-2 my-sm-0 text-primary-color" type="submit"><i class="fab fa-searchengin fa-2x"></i></button>
                </form>
                <!-- Authentication Links -->
                @if (Auth::user() && Auth::user()->is_revisor)
                <li class="nav-item">
                    <a href="{{route('revisor.homepage')}}" class="nav-link">{{ __('ui.revisionare') }} 
                        <span class="badge badge-pill badge-primary-color">{{App\Models\Announcement::ToBeRevisionedCount()}}</span>
                    </a>
                </li>
                
                @endif
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
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>
                    
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        @if (Auth::user() && Auth::user()->is_admin)
                        <a class="dropdown-item" href="{{route('pickrevisor')}}">{{ __('ui.amministra_utenti') }}</a>
                        @endif
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