<x-layout>
  <x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-1">Ustvari novo glasbeno skupino</h2>
      <p class="mb-4">Ustvari glasbeno skupino, da najdeš nove člane</p>
    </header>

    <form method="POST" action="/glasbeneskupine" enctype="multipart/form-data">
      @csrf
      <div class="mb-6">
        <label for="imeskupine" class="inline-block text-lg mb-2">Ime skupine</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="imeskupine"
          value="{{old('imeskupine')}}" />

        @error('imeskupine')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="lokacija" class="inline-block text-lg mb-2">Lokacija</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="lokacija"
          placeholder="Primer: Slovenija, LJ" value="{{old('lokacija')}}" />

        @error('lokacija')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="zanr" class="inline-block text-lg mb-2">Žanr</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="zanr"
          placeholder="Example: Rock, pop, blues" value="{{old('zanr')}}" />

        @error('zanr')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="tags" class="inline-block text-lg mb-2">
          Oznake (loči z vejico)
        </label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
          placeholder="Primer: Rock, pop, blues ipd." value="{{old('tags')}}" />

        @error('tags')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      
      <div class="mb-6">
        <label for="opis" class="inline-block text-lg mb-2">
          Opis glasbene skupine:
        </label>
        <textarea class="border border-gray-200 rounded p-2 w-full" name="opis" rows="10"
          placeholder="Zgodovina nastanka, predhodnji nastopi, ideje in misli..">{{old('opis')}}</textarea>

        @error('opis')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="logo" class="inline-block text-lg mb-2">
          Slika skupine
        </label>
        <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />

        @error('logo')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>


      <div class="mb-6">
        <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
          Ustvari skupino
        </button>

        <a href="/" class="text-black ml-4"> Back </a>
      </div>
    </form>
  </x-card>
</x-layout>
