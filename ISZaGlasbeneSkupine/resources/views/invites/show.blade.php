<x-layout>
    <div>
        <h1 class="text-3xl text-center font-bold my-6 uppercase">
          Vsa povabila
        </h1>
    </div>

    <x-card class="p-10 mx-auto mt-24">
        <header>
            <h3 class="text-3xl text-center font-bold my-6 uppercase">
              Prejeta povabila
            </h3>
          </header>
        <table class="w3-table w3-striped w3-bordered">
            <thead>
                <th scope="col">#</th>
                <th scope="col">E-pošta</th>
                <th scope="col">Namen</th>
                <th scope="col">Instrument</th>
                </thead>
                <tbody>
                    @unless($invites->isEmpty())
                        @auth
                            @foreach($invites as $invite)
                                @if ( !Auth::user()->isMyGroup($invite->group) )
                                    <tr>
                                        <td scope="row">{{$invite->id}} </td>
                                        <td scope="row">{{$invite->email}} </td>
                                        <td scope="row">{{$invite->namen}} </td>
                                        <td scope="row">{{$invite->instrument}} </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endauth
                    @else
                    <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <p class="text-center">Vaš poštni nabiralnik je prazen.</p>
                    </td>
                    </tr>
                    @endunless
                </tbody>
        </table>
    </x-card>
</x-layout>