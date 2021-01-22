<x-layout>
    <div class="container mt-5 pt-5">
        <div class="row">
            <div class="col-12 mb-5">
                <h2 class="text-primary-color text-center">{{ __('ui.annuncio') }}</h2>
            </div>
            <div class="col-12">
                <form method="POST" action="{{route('announcement.store')}}">
                    @csrf
                    <div class="row">
                        <input type="hidden" name="uniqueSecret" value="{{ $uniqueSecret }}">
                        <div class="col-12 col-md-6 form-group">
                            <label for="title">{{ __('ui.titolo_annuncio') }}</label>
                            <input type="text" class="form-control input-custom" name="title" id="title" value="{{old('title')}}" placeholder="{{ __('ui.place_titolo_annuncio') }}">
                            @error('title')
                            <div class="alert alert-danger validate">{{ __('ui.alert_annuncio') }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 form-group">
                            <label for="price">{{ __('ui.prezzo') }}</label>
                            <input type="number" step='0.01' class="form-control input-custom" name="price" id="price" value="{{old('price')}}" placeholder="0.99">
                            @error('title')
                            <div class="alert alert-danger validate">{{ __('ui.alert_prezzo') }}</div>
                            @enderror
                        </div>
                        <div class="col-12 form-group">
                            <label for="body">{{ __('ui.testo_annuncio') }}</label>
                            <textarea name="body" class="w-100 input-custom" rows="10" id="body" placeholder="{{ __('ui.place_testo_annuncio') }}">{{old('body')}}</textarea>
                            @error('body')
                            <div class="alert alert-danger validate">{{ __('ui.alert_testo_annuncio') }}</div>
                            @enderror
                        </div>
                        <div class="col-12 col-md-6 form-group">
                            <label for="category">{{ __('ui.categoria') }}</label>
                            <select name="category" id="category" aria-placeholder="{{ __('ui.categoria') }}" class="input-custom">
                                <option value="" disabled selected>{{ __('ui.seleziona') }}</option>
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <div class="alert alert-danger validate">{{ __('ui.categoria') }}</div>
                            @enderror
                        </div>
                        <div class="col-12 form-group row">
                            <label class="col-md-12" for="images">{{ __('ui.inserisci_immagine') }}</label>
                            <div class="col-md-12">
                                <div class="dropzone" id="drophere"></div>
                                @error('images')
                                    <div class="alert alert-danger validate">...</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 col-md-6 text-center text-md-right">
                            <button type="submit" class="btn btn-custom px-5 py-2">{{ __('ui.invia') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</x-layout>