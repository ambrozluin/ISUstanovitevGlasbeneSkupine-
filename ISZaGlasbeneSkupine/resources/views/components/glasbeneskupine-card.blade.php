@props(['skupina'])

<x-card>
  <div class="flex">
    <img class="hidden w-48 mr-6 md:block"
      src="{{$skupina->slika?asset('storage/' . $skupina->slika) : asset('/slike/logo.jpg')}}" alt="" />
    <div>
      <h3 class="text-2xl">
        <a href="/glasbeneskupine/{{$skupina->id}}">{{$skupina->ime}}</a>
      </h3>
      <div class="text-xl font-bold mb-4">{{$skupina->zanr}}</div>
      <x-skupina-oznake :tagsCsv="$skupina->oznake" />
      <div class="text-lg mt-4">
        <i class="fa-solid fa-location-dot"></i> {{$skupina->lokacija}}
      </div>
    </div>
  </div>
</x-card>