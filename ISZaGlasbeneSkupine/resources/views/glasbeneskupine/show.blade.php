<x-layout>
  <a href="/" class="inline-block text-black ml-4 mb-4"><i class="fa-solid fa-arrow-left"></i> Back
  </a>
  <div class="mx-4">
    <x-card class="p-10">
      <div class="flex flex-col items-center justify-center text-center">
        <img class="w-48 mr-6 mb-6"
          src="{{$glasbeneskupine->logo ? asset('storage/' . $glasbeneskupine->logo) : asset('/slike/logo.jpg')}}" alt="" />

        <h3 class="text-2xl mb-2">
          {{$glasbeneskupine->imeskupine}}
        </h3>
        <div class="text-xl font-bold mb-4">{{$glasbeneskupine->zanr}}</div>

        <x-glasbenaskupina-tags :tagsCsv="$glasbeneskupine->tags" />

        <div class="text-lg my-4">
          <i class="fa-solid fa-location-dot"></i> {{$glasbeneskupine->lokacija}}
        </div>
        <div class="border border-gray-200 w-full mb-6"></div>
        <div>
          <h3 class="text-3xl font-bold mb-4">Opis glasbene skupine</h3>
          <div class="text-lg space-y-6">
            {{$glasbeneskupine->opis}}

           
          </div>
        </div>
      </div>
    </x-card>


    @if ($authUser==$glasbeneskupine->user_id) <!--preveri ali sem ustvaril skupino !-->
        
   
    <x-card class="p-10 mx-auto mt-24">
      <header>
          <h3 class="text-3xl text-center font-bold my-6 uppercase">
            Povabi uporabnike v skupino
          </h3>
        </header>
      <table class="w3-table w3-striped w3-bordered">
          <thead>
              <th scope="col">#</th>
              <th scope="col">Ime</th>
              <th scope="col">E-pošta</th>
              <th scope="col">Sodelovanje</th>
              </thead>
              <tbody>
                  
                    @foreach($users as $user)
                      @if ( !$user->isMyGroup($glasbeneskupine) )
                        <tr>
                          <td scope="row">{{$user->id}} </td>
                          <td scope="row">{{$user->name}} </td>
                          <td scope="row">{{$user->email}} </td>
                          <td scope="row">
                              {{-- <button class="h-8 w-20 text-white rounded-lg bg-yellow-500 hover:bg-yellow-600"
                              onclick="location.href='/invite/{{$user}}/{{$glasbeneskupine}}'" type="button">Povabi</button> --}}
                              <a href=" {{ route('inviteToGroup', [$user, $glasbeneskupine]) }}" class="btn btn-warning"> Povabi</a>
                              {{-- <button class="h-8 w-20 text-white rounded-lg bg-yellow-500 hover:bg-yellow-600"
                              onclick="route('inviteToGroup', [])" type="button">Povabi</button> --}}
                          </td>
                        </tr>
                      @endif
                    @endforeach 
                  

              </tbody>
      </table>
    </x-card>
    @endif

    
    {{-- <x-card class="mt-4 p-2 flex space-x-6">
      <a href="/listings/{{$listing->id}}/edit">
        <i class="fa-solid fa-pencil"></i> Edit
      </a>

      <form method="POST" action="/listings/{{$listing->id}}">
        @csrf
        @method('DELETE')
        <button class="text-red-500"><i class="fa-solid fa-trash"></i> Delete</button>
      </form>
    </x-card> --}}
  </div>
</x-layout>