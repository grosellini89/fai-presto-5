<x-layout>

    {{-- Titolo categoria --}}
    <x-semi-header title="{{ $category->name }}"/>

    {{-- Lista annunci --}}
    <div class="container mt-3">
        <div class="row justify-content-center">
            @foreach ($announcements as $announcement)
                <div class="col-12 col-md-8">
                    @component('components.card', ['announcement'=>$announcement])
                    
                    @endcomponent
                </div> 
            @endforeach
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{ $announcements->links() }}
            </div>
        </div>
    </div>
    
</x-layout>