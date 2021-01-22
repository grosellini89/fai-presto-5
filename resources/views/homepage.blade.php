<x-layout>

    @if (session('access.denied.revisor.only'))
        {{ session('access.denied.revisor.only') }}          
    @endif

    {{-- Above the fold --}}
    <header class="half-header">
        <div class="container h-100 ">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center pt-5">

                    <h1 class="text-primary-color mt-n5 text-left display-2 d-md-none">Presto! </h1>
                    {{-- Search da fixare --}}
                                <form action="{{ route('headersearch') }}" method="get" class="form-inline my-2 my-lg-0 mr-3">
                                <input class="form-control mr-sm-0 input-custom-search" type="search" placeholder="{{ __('ui.cerca') }}" aria-label="Search" name="q">
                                <select name="category" id="category" aria-placeholder="{{ __('ui.categoria') }}" class="input-custom-select">
                                <option value="" disabled selected>{{ __('ui.categoria') }}</option>
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                                <button class="btn my-0 my-sm-0 text-white" type="submit"><i class="fab fa-searchengin fa-2x"></i></button>
                                </form>
                    <h1 class="text-primary-color text-left display-2 d-none d-md-block">Presto! </h1>
                </div>
            </div>
        </div>
    </header>    

    {{-- Annunci --}}
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 mb-5">
                <h2 class="text-primary-color text-center">{{ __('ui.ultimi_annunci') }}</h2>
            </div>
            @foreach ($announcements as $announcement)
            <div class="col-12 col-md-8">
                @component('components.card', ['announcement'=>$announcement])
                    
                @endcomponent
            </div> 
            @endforeach  
        </div>
    </div>
</x-layout>