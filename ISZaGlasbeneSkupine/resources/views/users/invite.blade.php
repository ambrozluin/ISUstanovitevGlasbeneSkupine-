<x-layout>
  <x-card class="p-10 max-w-lg mx-auto mt-24">
    <header class="text-center">
      <h2 class="text-2xl font-bold uppercase mb-1">Povabilo</h2>
      <p class="mb-4">Pošlji povabilo drugemu uporabniku.</p>
    </header>

    <form method="POST" action="/invite/store">
      @csrf
   
      <div hidden class="mb-6">
        <label for="email" class="inline-block text-lg mb-2">E-posta</label>
        <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{$users->email}}" />

        @error('email')
        <p class="text-red-500 text-xs mt-1"></p>
        @enderror
      </div>

      <div hidden class="mb-6">
        <label for="receiver_id" class="inline-block text-lg mb-2">receiver_id</label>
        <input type="number" class="border border-gray-200 rounded p-2 w-full" name="receiver_id" value="{{$users->id}}" />

        @error('email')
        <p class="text-red-500 text-xs mt-1"></p>
        @enderror
      </div>

      <div hidden class="mb-6">
        <label for="group_id" class="inline-block text-lg mb-2">group_id</label>
        <input type="number" class="border border-gray-200 rounded p-2 w-full" name="group_id" value="{{$group->id}}" />

        @error('email')
        <p class="text-red-500 text-xs mt-1"></p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="instrument" class="inline-block text-lg mb-2">Glasbeni instrument</label>
        <input type="instrument" class="border border-gray-200 rounded p-2 w-full" name="instrument" placeholder="Kitara, klavir, bobni.." />

        @error('instrument')
        <p class="text-red-500 text-xs mt-1"></p>
        @enderror
      </div>

      <div class="mb-6">
        <label for="namen" class="inline-block text-lg mb-2">Sporočilo</label>
        <textarea class="border border-gray-200 rounded p-2 w-full" 
          name="namen" rows="3" placeholder="Npr. potrebujemo novega pianista"></textarea>

        @error('namen')
        <p class="text-red-500 text-xs mt-1"></p>
        @enderror
      </div>
  
      <div class="mb-6">
        
        <button type="submit" class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
          Pošlji povabilo
        </button>
      </div>

    </form>
  </x-card>
</x-layout>