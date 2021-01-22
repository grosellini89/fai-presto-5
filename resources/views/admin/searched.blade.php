<x-layout>
    
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">

                {{-- Box status --}}
                <div class="col-12 mt-5 p-0 text-center">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>  

                <div class="text-center">
                    {{-- Search --}}
                    <form action="{{ route('adminsearch') }}" method="get" class="form-inline my-2 my-lg-0 mr-3">
                        <input class="form-control mr-sm-0 input-custom-search" type="search" placeholder="Cerca..." aria-label="Search" name="q">
                        <button class="btn my-2 my-sm-0 text-primary-color" type="submit"><i class="fab fa-searchengin fa-2x"></i></button>
                    </form>
                </div>

                {{-- Tabella --}}
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#id</th>
                                <th scope="col">{{ __('ui.nome') }}</th>
                                <th scope="col">Email</th>
                                <th scope="col">{{ __('ui.revisor') }}</th>
                                <th scope="col">{{ __('ui.admin') }}</th>
                            </tr>
                        </thead>

                        {{-- Elenco users --}}
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">#{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>
                                        @if ($user->is_revisor == false)
                                        {{-- Tasto rendi revisor --}}
                                        <form action="{{route ('acceptrevisor', ['id'=>$user->id])}}" method="post">
                                            @csrf
                                            @method('put')
                                            <button type="submit" class="btn btn-outline-success"><i class="fas fa-user-plus"></i></button>
                                        </form>
    
                                        @else
                                        {{-- Tasto rimuovi revisor --}}
                                        <form action="{{route ('removerevisor', ['id'=>$user->id])}}" method="post">
                                            @csrf
                                            @method('put')
                                            <button type="submit" class="btn btn-outline-danger"><i class="fas fa-user-slash"></i></button>
                                        </form>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($user->is_admin == false)
                                        {{-- Tasto rendi admin --}}
                                        <form action="{{route ('acceptadmin', ['id'=>$user->id])}}" method="post">
                                            @csrf
                                            @method('put')
                                            <button type="submit" class="btn btn-outline-success"><i class="fas fa-user-plus"></i></button>
                                        </form>
    
                                        @else
                                        {{-- Tasto rimuovi admin --}}
                                        <form action="{{route ('removeadmin', ['id'=>$user->id])}}" method="post">
                                            @csrf
                                            @method('put')
                                            <button type="submit" class="btn btn-outline-danger"><i class="fas fa-user-slash"></i></button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            {{ $users->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>