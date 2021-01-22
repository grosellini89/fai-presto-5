@props(['lang', 'nation'])

<form action="{{route('locale', $lang)}}" method="POST">
    @csrf
    <button type="submit" class="nav-link bandiera">
        <span class="flag-icon flag-icon-{{$nation}}"></span>
    </button>
</form>