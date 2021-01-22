<x-layout>
    <x-semi-header title=" "/>
    <div class="container">
        <div class="row">
            <div class="col-12 mt-5">
                <h3 class="text-success text-center"> @if (session('status'))
                    {{ session('status') }}  
                @endif
                </h3>
            </div>
        </div>
    </div>
</x-layout>