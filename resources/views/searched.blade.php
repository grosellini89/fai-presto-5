<x-layout>

    <x-semi-header title="Risultati per {{$q}}:"/>
    
    {{-- Risultati ricerca --}}
    <div class="container mt-3">
        <div class="row justify-content-center">
            @foreach ($announcements as $announcement)
                <div class="col-12 col-md-8">
                    @component('components.card', ['announcement'=>$announcement])
                    
                    @endcomponent
                </div> 
            @endforeach
        </div>
    </div>

</x-layout>