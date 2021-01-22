    <x-layout>

        {{-- Titolo annuncio --}}
        <x-semi-header title="{{ $announcement->title }}"/>

        {{-- Carousel --}}
        <div class="container my-5 py-5">
            <div class="row">
                <div class="col-12 col-md-5 mb-5 ">
                    <div class="row">
                        <div class="col-12 mb-1">
                            <div class="slider-for">
                                @if(count($announcement->images)>0)
                                    @foreach ($announcement->images as $image)
                                        <img src={{ $image->getUrl(500,500)}} class="img-fluid" alt="">
                                    @endforeach
                                @else
                                    @for ($i = 0; $i < 4; $i++)
                                        <img src="https://picsum.photos/500" class="img-fluid" alt="">
                                    @endfor
                                @endif
                            </div>    
                        </div>
                        <div class="col-12">
                            <div class="slider-nav">
                                    @if(count($announcement->images)>0)
                                        @foreach ($announcement->images as $image)
                                            <img src={{ $image->getUrl(100,100)}} class="img-fluid" alt="">
                                        @endforeach
                                    @else
                                        @for ($i = 0; $i < 4; $i++)
                                            <img src="https://picsum.photos/100" class="img-fluid" alt="">
                                        @endfor
                                    @endif
                            </div>
                        </div>
                    </div>      
                </div>
        
                {{-- Dettagli annuncio --}}
                <div class="col-12 col-md-7 d-flex flex-column">
                    <p class="h3 mb-1 text-primary-color"> {{ $announcement->title }} <span class="text-dark float-right">{{ $announcement->price }} € </span></p>
                    <p class="small">{{ $announcement->category->name }}</p>
                    <p class="">{{$announcement->body}}</p>
                    <p class="mb-0 mt-5">{{ __('ui.venduto_da') }}<a href="" class="text-decoration-none">{{$announcement->user->name}}</a>
                    <span class="float-right">{{ __('ui.caricato') }} {{ $announcement->created_at->format('d/m/Y') }}</span></p>
                </div>
            </div>
        </div>

    </x-layout>