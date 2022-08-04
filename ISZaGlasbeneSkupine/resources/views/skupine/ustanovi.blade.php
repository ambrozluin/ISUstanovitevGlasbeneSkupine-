<x-layout>
    <x-card class="p-10 max-w-lg mx-auto mt-24">
      <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">Ustanovi glasbeno skupino</h2>
        <p class="mb-4">Ustanovi skupino, da pridobiš nove člane</p>
      </header>
  
      <form method="POST" action="/Gskupine" enctype="multipart/form-data">
        @csrf
        <div class="mb-6">
          <label for="Glasbena Skupina" class="inline-block text-lg mb-2">Ime skupine</label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="Glasbena Skupina"
            value="{{old('Glasbena Skupina')}}" />
  
          @error('Glasbena Skupina')
          <p class="text-red-500 text-xs mt-1"> </p>
          @enderror
        </div>
  
        <div class="mb-6">
          <label for="žanr" class="inline-block text-lg mb-2">Žanr</label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="žanr"
            placeholder="Primer: Rock, Pop, Blues ipd." value="{{old('žanr')}}" />
  
          @error('žanr')
          <p class="text-red-500 text-xs mt-1"> </p>
          @enderror
        </div>
  
        <div class="mb-6">
          <label for="Lokacija" class="inline-block text-lg mb-2">Lokacija</label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="Lokacija"
            placeholder="Primer: Slovenija, Ljubljana" value="{{old('Lokacija')}}" />
  
          @error('Lokacija')
          <p class="text-red-500 text-xs mt-1"> </p>
          @enderror
        </div>
  
  
        <div class="mb-6">
          <label for="oznake" class="inline-block text-lg mb-2">
            Oznake (Comma Separated)
          </label>
          <input type="text" class="border border-gray-200 rounded p-2 w-full" name="oznake"
            placeholder="Example: Laravel, Backend, Postgres, etc" value="{{old('oznake')}}" />
  
          @error('oznake')
          <p class="text-red-500 text-xs mt-1"></p>
          @enderror
        </div>
  
        <div class="mb-6">
          <label for="slika" class="inline-block text-lg mb-2">
            Slika GlasbeneSkupine
          </label>
          <input type="file" class="border border-gray-200 rounded p-2 w-full" name="slika" />
  
          @error('slika')
          <p class="text-red-500 text-xs mt-1"> </p>
          @enderror
        </div>
  
        <div class="mb-6">
          <label for="opis" class="inline-block text-lg mb-2">
            Opis skupine
          </label>
          <textarea class="border border-gray-200 rounded p-2 w-full" name="opis" rows="10"
            placeholder="Začetki ustvarjanja, glavne ideje, vizija ipd. ">{{old('opis')}}</textarea>
  
          @error('opis')
          <p class="text-red-500 text-xs mt-1"> </p>
          @enderror
        </div>
  
        <div class="mb-6">
          <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
            Ustvari skupino
          </button>
  
          <a href="/" class="text-black ml-4"> Nazaj </a>
        </div>
      </form>
    </x-card>
  </x-layout>
  