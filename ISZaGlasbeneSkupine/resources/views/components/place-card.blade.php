@props(['place'])

<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 md:block"
        src="{{asset('/slike/house.jpg')}}" alt="" />

        <div>
            <h3 class="text-2xl">
              <a href="/places/{{$place->id}}">
                    <p class="text-xl font-weight-bold">
                        <i class="fa-solid fa-location-dot"></i> Lokacijia:
                    </p> 
                    <i class="text-xl m-4"> {{$place->lokacija}}</i>
                </a>
            </h3>
            <div class="text-xl font-bold mb-4 m-2">Cena najema: {{$place->cena}} €/MESEC</div>
                <x-place-tags :tagsCsv="$place->tags" />
            <div class="text-lg mt-4">
                <p class="text-xl font-weight-bold">
                    <i class="fa-solid"></i> Telefonska številka:
                </p> 
                <i class="text-xl m-4"> {{$place->telefon}}</i>
            </div>
        </div>

    
      </div>
</x-card>