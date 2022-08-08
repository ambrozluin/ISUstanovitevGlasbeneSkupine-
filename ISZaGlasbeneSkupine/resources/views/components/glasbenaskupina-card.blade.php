@props(['glasbenaskupina'])


<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block"
          src="{{$glasbenaskupina->logo ? asset('storage/' . $glasbenaskupina->logo) : asset('/slike/logo.jpg')}}" alt="" />
        <div>
          <h3 class="text-2xl">
            <a href="/glasbeneskupine/{{$glasbenaskupina->id}}">{{$glasbenaskupina->imeskupine}}</a>
          </h3>
          <div class="text-xl font-bold mb-4">{{$glasbenaskupina->zanr}}</div>
          <x-glasbenaskupina-tags :tagsCsv="$glasbenaskupina->tags" />
          <div class="text-lg mt-4">
            <i class="fa-solid fa-location-dot"></i> {{$glasbenaskupina->lokacija}}
          </div>
        </div>
      </div>
</x-card>