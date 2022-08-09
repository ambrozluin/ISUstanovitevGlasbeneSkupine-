<x-layout>
  <x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-1">Uredi glasbeno skupino</h2>
      <p class="mb-4">Uredi: {{$glasbenaskupina->imeskupine}}</p>
    </header>

    <form method="POST" action="/glasbeneskupine/{{$glasbenaskupina->id}}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mb-6">
        <label for="imeskupine" class="inline-block text-lg mb-2">Ime glasbene skupine</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="imeskupine"
          value="{{$glasbenaskupina->imeskupine}}" />

        @error('imeskupine')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="lokacija" class="inline-block text-lg mb-2">Lokacija</label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="lokacija"
          placeholder="Example: Remote, Boston MA, etc" value="{{$glasbenaskupina->lokacija}}" />

        @error('lokacija')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="zanr" class="inline-block text-lg mb-2">
          Žanr
        </label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="zanr"
          placeholder="Rock, pop, blues" value="{{$glasbenaskupina->zanr}}" />

        @error('tags')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="tags" class="inline-block text-lg mb-2">
          Tags (Comma Separated)
        </label>
        <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
          placeholder="Example: rock, pop, blues" value="{{$glasbenaskupina->tags}}" />

        @error('tags')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="logo" class="inline-block text-lg mb-2">
          Logo skupine
        </label>
        <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />

        <img class="w-48 mr-6 mb-6"
          src="{{$glasbenaskupina->logo ? asset('storage/' . $glasbenaskupina->logo) : asset('/images/log.png')}}" alt="" />

        @error('logo')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="opis" class="inline-block text-lg mb-2">
          Opis
        </label>
        <textarea class="border border-gray-200 rounded p-2 w-full" name="opis" rows="10"
          placeholder="Zgodovina, ideje, misli">{{$glasbenaskupina->opis}}</textarea>

        @error('opis')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
      </div>

      <div class="mb-6">
        <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
          Posodobi Glasbeno skupino
        </button>

        <a href="/" class="text-black ml-4"> Nazaj </a>
      </div>
    </form>
  </x-card>
</x-layout>
