<x-layout>
    <x-heroPlaces></x-heroPlaces>
    
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
        @foreach($places as $place)
            <x-place-card :place="$place" />
        @endforeach
    </div>

    @if (count($places)==0)
        <div class="lg:grid lg:grid-cols-1 gap-4 space-y-4 md:space-y-0 mx-4 text-center font-weight-bold">
            <x-card> Ni objavljenih oglasov </x-card>
        </div>
    @endif
  

</x-layout>