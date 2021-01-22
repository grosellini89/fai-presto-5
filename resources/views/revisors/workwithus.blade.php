<x-layout>
    
    <div class="container my-5 py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if (Auth::user()->is_admin)
                    <p class='text-center mb-5 h4'> {{ __('ui.ciao') }} <strong>{{ Auth::user()->name }}</strong> {{ __('ui.gia_admin') }}</p>
                @elseif (Auth::user()->is_revisor)
                    <p class='text-center mb-5 h4'>{{ __('ui.ciao') }} <strong>{{ Auth::user()->name }}</strong>{{ __('ui.gia_revisore') }}</p>
                @else
                    <p class='text-center mb-5 h4'>{{ __('ui.ciao') }} <strong>{{ Auth::user()->name }}</strong>{{ __('ui.diventare_revisore') }}</p>
                @endif
                
                <form method="POST" action="{{ route('askwork') }}">
                    @csrf

                    {{-- Nome precompilato --}}
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ui.tuo_nome') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control input-custom @error('name') is-invalid @enderror" name="name" value="{{Auth::user()->name}}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    {{-- Mail precompilata --}}
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('ui.tua_mail') }}</label>
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control input-custom @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- Messaggio da inviare --}}
                    <div class="form-group row">
                        <label for="message" class="col-12 col-md-4 col-form-label text-md-right">{{ __('ui.mess_richiesta') }}</label>
                        <textarea name="message" class="col-12 col-md-6 input-custom" rows="5" id="message">{{old('message')}}</textarea>
                        @error('message')
                        <div class="alert alert-danger validate">{{ __('ui.alert_messaggio') }}</div>
                        @enderror
                    </div>

                    <div class="form-group row my-5" >
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-custom">
                                {{ __('ui.invia_richiesta') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-layout>