@props(['skupina'])

<x-card>
  <div class="flex">
    <img class="hidden w-48 mr-6 md:block"
      src="{{$skupina->slika?asset('storage/' . $skupina->slika) : asset('/slike/logo.jpg')}}" alt="" />
    <div>
      <h3 class="text-2xl">
        <a href="/skupine/{{$skupina->id}}">{{$skupina->ime}}</a>
      </h3>
      <div class="text-xl font-bold mb-4">{{$skupina->zanr}}</div>
      <x-listing-tags :tagsCsv="$listing->tags" />
      <div class="text-lg mt-4">
        <i class="fa-solid fa-location-dot"></i> {{$listing->lokacija}}
      </div>
    </div>
  </div>
</x-card>