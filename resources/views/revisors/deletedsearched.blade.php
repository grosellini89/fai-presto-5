<x-layout>

    <div class="container my-5 py-5">
         <div class="row">
             <div class="col-12">
 
                 {{-- Box status --}}
                 <div class="col-12 mt-5 p-0 text-center">
                     @if (session('status'))
                         <div class="alert alert-success">
                             {{ session('status') }}
                         </div>
                     @endif
                 </div>
 
                 {{-- Search --}}
                 <div class="text-center">
                     <form action="{{ route('revisorsearch') }}" method="get" class="form-inline my-2 my-lg-0 mr-3">
                         <input class="form-control mr-sm-0 input-custom-search" type="search" placeholder="Cerca..." aria-label="Search" name="q">
                         <button class="btn my-2 my-sm-0 text-primary-color" type="submit"><i class="fab fa-searchengin fa-2x"></i></button>
                     </form>
                 </div>
 
                 {{-- Tabella --}}
                 <div class="table-responsive">
                     <table class="table table-hover">
                         <thead>
                             <tr>
                                 <th class="text-primary-color" scope="col">#id</th>
                                 <th class="text-primary-color" scope="col">{{ __('ui.titolo') }}</th>
                                 <th class="text-primary-color" scope="col">{{ __('ui.descrizione') }}</th>
                                 <th class="text-primary-color text-center" scope="col">{{ __('ui.stato') }}</th>
                                 <th class="text-primary-color" scope="col">{{ __('ui.ripristina') }}</th>
                             </tr>
                         </thead>
 
                        {{-- annunci cercati --}}
                         <tbody>
                             @foreach ($announcements as $announcement)
                                    @if ($announcement->is_accepted === 1 || $announcement->is_accepted === 0)
                                    <tr>
                                        <th scope="row">#{{ $announcement->id }}</th>
                                        <td class="font-weight-bold">{{ Str::limit($announcement->title,25)  }}</td>
                                        <td>{{ Str::limit($announcement->body,50) }}</td>
                                        <td class="text-center align-middle">
                                           @if ($announcement->is_accepted === 1)
                                               <i class="far fa-thumbs-up text-success"></i>
                                           @else 
                                               <i class="far fa-thumbs-down text-danger"></i>
                                           @endif
                                       </td>
                                        <td>
                                            {{-- Tasto ripristina --}}
                                            <form action="{{ route('revisor.restore', ['id'=>$announcement->id]) }}" method="post">
                                                @csrf
                                                @method('put')
                                                <button class="btn my-2 my-sm-0 text-primary-color" type="submit"><i class="fas fa-undo-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                        
                                    @endif
                             @endforeach
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
 
 </x-layout>