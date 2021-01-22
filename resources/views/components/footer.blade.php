<!-- Footer -->
<footer class="container-fluid bg-dark px-3 pt-5 text-white mt-5">
  <div class="row">
    <div class="col-12 text-center">
      <img class="img-fluid " src="/img/logo-arancione.png" width="60px">
      <h3 class="text-primary-color ">Presto</h3>
    </div>
    <div class="container">
      <div class="row">
        {{-- Prima colonna footer --}}
        <div class="col-12 col-md-4 mb-3">
          <p>{{ __('ui.mappa') }}</p>
          <ul class="fa-ul">
            @foreach ($categories as $category)
              <li>
                <a class="text-decoration-none text-white" href="{{route('filtercategory', ['name'=>$category->name, 'id'=>$category->id])}}">{{$category->name}}</a>
              </li>
            @endforeach    
          </ul>
        </div>

        {{-- Seconda colonna footer --}}
        <div class="col-12 col-md-4 mb-3">
          <p>{{ __('ui.link_utili') }}</p>
          <ul class="fa-ul">
            <li>
              <a href="" class="text-decoration-none text-white">
                {{ __('ui.chi_siamo') }}
              </a>
            </li>
            <li>
              <a href="{{route('workwithus')}}" class="text-decoration-none text-white">
                {{ __('ui.lavora') }}
              </a>
            </li>
            <li>
              <a href="" class="text-decoration-none text-white">
                FAQ
              </a>
            </li>
            <li>
              <a href="" class="text-decoration-none text-white">
                {{ __('ui.termini_condizioni') }}
              </a>
            </li>
            <li>
              <a href="" class="text-decoration-none text-white">
                Privacy policy
              </a>
            </li>
            <li>
              <a href="" class="text-decoration-none text-white">
                {{ __('ui.spedizioni') }}
              </a>
            </li>
          </ul>
        </div>

        {{-- Terza colonna footer --}}
        <div class="col-12 col-md-4 mb-3">
          <p>{{ __('ui.social') }}</p>
          <a href="" class="text-decoration-none text-white mr-4"><i class="fab fa-facebook-f fa-2x"></i></a>
          <a href="" class="text-decoration-none text-white mr-4"><i class="fab fa-instagram fa-2x"></i></a>
          <a href="" class="text-decoration-none text-white mr-4"><i class="fab fa-whatsapp fa-2x"></i></a>
          <a href="" class="text-decoration-none text-white mr-4"><i class="fab fa-twitter fa-2x"></i></a>
        </div>

        <!-- Copyright -->
        <div class="col-12 footer-copyright text-center mb-2">© 2020 Copyright:
          <a href="" class=""> fai-presto.com </a> <span>- P.IVA 1234567890</span>
        </div>

      </div>
    </div>
  </div>
</footer>