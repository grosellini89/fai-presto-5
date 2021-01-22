<x-layout>

    @if ($announcement)
        {{-- Titolo annuncio in revisione --}}
        <x-semi-header title="{{ $announcement->title }}"/>

        {{-- Tasto ripristina --}}
        <div class="container  my-5">
            <div class="row">
                <div class="col-12 text-right">
                    <a class="btn btn-warning font-weight-bold py-2 px-4" href="{{ route('revisor.deleted') }}">{{ __('ui.ripristina') }}</a>
                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row">

                {{-- Carousel --}}
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
                    <p class="">{{ $announcement->category->name }}</p>
                    <p class="">{{$announcement->body}}</p>
                    <p class="mb-0 mt-5">Venduto da <a href="" class="text-decoration-none">{{$announcement->user->name}}</a>
                        <span class="float-right">Caricato il {{ $announcement->created_at->format('d/m/Y') }}</span></p>
                </div>
                    
                {{-- Tabella API --}}
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Labels</th>
                                <th class="text-center" scope="col">Adult</th>
                                <th class="text-center" scope="col">Medical</th>
                                <th class="text-center" scope="col">Spoof</th>
                                <th class="text-center" scope="col">Violence</th>
                                <th class="text-center" scope="col">Racy</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($announcement->images as $image)
                                <tr>
                                    <th scope="row"><img src={{ $image->getUrl(100,100)}} class="img-fluid" alt=""></th>
                                    <td>
                                        <a class="btn" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><i class="fas fa-info-circle text-info"></i></a>
                                        <div class="row">
                                            <div class="col">
                                              <div class="collapse multi-collapse" id="multiCollapseExample1">
                                                <div class="card card-body">
                                                    @foreach ( $image->labels  as $label) 
                                                        <small>{{ $label }} </small>
                                                    @endforeach
                                                </div>
                                              </div>
                                            </div>                             
                                    </td>
                                    <td class="text-center">
                                        @switch($image->adult)
                                            @case("VERY_UNLIKELY")
                                                <i class="fas fa-circle font-weight-bold align-middle text-success"></i>
                                                @break
                                            @case("UNLIKELY")
                                                <i class="fas fa-circle font-weight-bold align-middle text-warning"></i>
                                                @break
                                            @case("POSSIBLE")
                                                <i class="fas fa-circle font-weight-bold align-middle text-primary-color"></i>
                                                @break
                                            @case("LIKELY")
                                                <i class="fas fa-circle font-weight-bold align-middle text-danger"></i>
                                                @break
                                            @case("VERY_LIKELY")
                                                <i class="fas fa-circle font-weight-bold align-middle text-danger"></i>
                                                @break
                                            @default
                                                <i class="fas fa-circle font-weight-bold align-middle text-success"></i>
                                        @endswitch
                                    </td>
                                    <td class="text-center">
                                        @switch($image->medical)
                                        @case("VERY_UNLIKELY")
                                        <i class="fas fa-circle font-weight-bold align-middle text-success"></i>
                                        @break
                                    @case("UNLIKELY")
                                        <i class="fas fa-circle font-weight-bold align-middle text-warning"></i>
                                        @break
                                    @case("POSSIBLE")
                                        <i class="fas fa-circle font-weight-bold align-middle text-primary-color"></i>
                                        @break
                                    @case("LIKELY")
                                        <i class="fas fa-circle font-weight-bold align-middle text-danger"></i>
                                        @break
                                    @case("VERY_LIKELY")
                                        <i class="fas fa-circle font-weight-bold align-middle text-danger"></i>
                                        @break
                                    @default
                                        <i class="fas fa-circle font-weight-bold align-middle text-success"></i>
                                @endswitch
                                </td>
                                    <td class="text-center">
                                        @switch($image->spoof)
                                        @case("VERY_UNLIKELY")
                                        <i class="fas fa-circle font-weight-bold align-middle text-success"></i>
                                        @break
                                    @case("UNLIKELY")
                                        <i class="fas fa-circle font-weight-bold align-middle text-warning"></i>
                                        @break
                                    @case("POSSIBLE")
                                        <i class="fas fa-circle font-weight-bold align-middle text-primary-color"></i>
                                        @break
                                    @case("LIKELY")
                                        <i class="fas fa-circle font-weight-bold align-middle text-danger"></i>
                                        @break
                                    @case("VERY_LIKELY")
                                        <i class="fas fa-circle font-weight-bold align-middle text-danger"></i>
                                        @break
                                    @default
                                        <i class="fas fa-circle font-weight-bold align-middle text-success"></i>
                                @endswitch
                                    </td>
                                    <td class="text-center">
                                        @switch($image->violence)
                                        @case("VERY_UNLIKELY")
                                        <i class="fas fa-circle font-weight-bold align-middle text-success"></i>
                                        @break
                                    @case("UNLIKELY")
                                        <i class="fas fa-circle font-weight-bold align-middle text-warning"></i>
                                        @break
                                    @case("POSSIBLE")
                                        <i class="fas fa-circle font-weight-bold align-middle text-primary-color"></i>
                                        @break
                                    @case("LIKELY")
                                        <i class="fas fa-circle font-weight-bold align-middle text-danger"></i>
                                        @break
                                    @case("VERY_LIKELY")
                                        <i class="fas fa-circle font-weight-bold align-middle text-danger"></i>
                                        @break
                                    @default
                                        <i class="fas fa-circle font-weight-bold align-middle text-success"></i>
                                @endswitch
                                    </td>
                                    <td class="text-center">
                                        @switch($image->racy)
                                        @case("VERY_UNLIKELY")
                                        <i class="fas fa-circle font-weight-bold align-middle text-success"></i>
                                        @break
                                    @case("UNLIKELY")
                                        <i class="fas fa-circle font-weight-bold align-middle text-warning"></i>
                                        @break
                                    @case("POSSIBLE")
                                        <i class="fas fa-circle font-weight-bold align-middle text-primary-color"></i>
                                        @break
                                    @case("LIKELY")
                                        <i class="fas fa-circle font-weight-bold align-middle text-danger"></i>
                                        @break
                                    @case("VERY_LIKELY")
                                        <i class="fas fa-circle font-weight-bold align-middle text-danger"></i>
                                        @break
                                    @default
                                        <i class="fas fa-circle font-weight-bold align-middle text-success"></i>
                                @endswitch
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Bottoni accetta/rifiuta --}}
                <div class="col-6 pt-2">
                    <form action="{{route('revisor.accept', ['id'=>$announcement->id])}}" method="post">
                        @method('put')
                        @csrf
                        <button type="submit" class="btn btn-success font-weight-bold py-2 px-4">
                            {{ __('ui.accetta') }}
                        </button>
                    </form>
                </div>
                <div class="col-6 pt-2 text-right">
                    <form action="{{route('revisor.reject', ['id'=>$announcement->id])}}" method="post">
                        @method('put')
                        @csrf
                        <button type="submit" class="btn btn-danger font-weight-bold py-2 px-4">
                            {{ __('ui.rifiuta') }}
                        </button>
                    </form>
                </div>   
            </div>
        </div>  
    @else
        {{-- Senza annunci in revisione --}}
        <div class="container my-5 py-5">
            <div class="row">
                <div class="col-12 text-center text-primary-color">
                    <h3>{{ __('ui.no_annunci_revisionare') }}</h3>
                </div>
            </div>
        </div>

        {{-- Tasto ripristina --}}
        <div class="container">
            <div class="row">
                <div class="col-12 text-right mt-3">
                    <a class="btn btn-warning font-weight-bold py-2 px-4" href="{{ route('revisor.deleted') }}">{{ __('ui.ripristina') }}</a>
                </div>
            </div>
        </div>
    @endif
</x-layout>