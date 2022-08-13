<x-layout>
  <x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-1">Objavi oglas</h2>
      <p class="mb-4">Ponudi glasbeni prostor</p>
    </header>

    <form method="POST" action="/places/store" enctype="multipart/form-data">
      @csrf
      <div class="mb-6">
        <label for="lokacija" class="inline-block text-lg mb-2">Lokacija</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="lokacija"
          placeholder="Primer: Slovenija, LJ" value="{{old('lokacija')}}" />

        @error('lokacija')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>
      <div class="mb-6">
        <label for="cena" class="inline-block text-lg mb-2">Cena najema v €/mesec</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="cena"
          placeholder="Vstavi samo število" value="{{old('cena')}}" />

        @error('cena')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>
      
      <div class="mb-6">
        <label for="tags" class="inline-block text-lg mb-2">
          Vrsta prostora (loči z vejico)
        </label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
          placeholder="Primer: Garaza, studio, klet ipd." value="{{old('tags')}}" />

        @error('tags')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="telefon" class="inline-block text-lg mb-2">Telefon</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="telefon"
          placeholder="068618956" value="{{old('telefon')}}" />

        @error('telefon')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>


      <div class="mb-6">
        <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
          Objavi prostor
        </button>

        <a href="/places" class="text-black ml-4"> Back </a>
      </div>
    </form>
  </x-card>
</x-layout>
