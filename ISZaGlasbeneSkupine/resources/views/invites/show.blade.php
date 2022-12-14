<x-layout>
    <div>
        <h1 class="text-3xl m-10 text-left font-bold my-6 uppercase">
            <i class="fa-solid fa-envelope"></i> Vsa povabila
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
                <th scope="col">Pošiljatelj</th>
                <th scope="col">Prejemnik</th>
                <th scope="col">Namen</th>
                <th scope="col">Instrument</th>
                <th scope="col">Status</th>
                </thead>
                <tbody>
                    @unless($invites->isEmpty())
                        @auth
                            @foreach($invites as $invite)
                                @if ($invite->status=='prejeto' && Auth::user()->email==$invite->email) <!-- restrict and show only messegaes sended to me -->
                                    @if (!Auth::user()->isMyGroup($invite->group))
                                        <tr>
                                            <td scope="row">{{$invite->id}} </td>
                                            <td scope="row">{{$invite->sender_email}}</td>
                                            <td scope="row">{{$invite->email}} </td>
                                            <td scope="row">{{$invite->namen}} </td>
                                            <td scope="row">{{$invite->instrument}} </td>
                                            <td scope="row">
                                                <a href="invites/{{$invite->id}}" class="btn btn-warning"> Sprejmi</a>
                                                <a href="invites/dump/{{$invite->id}}" class="btn btn-danger"> Zavrni</a>
                                            </td>
                                        </tr>
                                    @endif
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

    <x-card class="p-10 mx-auto mt-24">
        <header>
            <h3 class="text-3xl text-center font-bold my-6 uppercase">
            Povabila v obdelavi
            </h3>
        </header>
        <table class="w3-table w3-striped w3-bordered">
            <thead>
                <th scope="col">#</th>
                <th scope="col">Pošiljatelj</th>
                <th scope="col">Prejemnik</th>
                <th scope="col">Namen</th>
                <th scope="col">Instrument</th>
                <th scope="col">Status</th>
                </thead>
                <tbody>
                    @unless($invites->isEmpty())
                        @auth
                            @foreach($invites as $invite)
                                @if ($invite->status=="prejeto")  <!-- restrict and show only messegaes sended to me -->  
                                    @if (Auth::user()->email==$invite->sender_email )
                                        <tr> 
                                            <td scope="row">{{$invite->id}} </td>
                                            <td scope="row">{{$invite->sender_email}}</td>
                                            <td scope="row">{{$invite->email}} </td>
                                            <td scope="row">{{$invite->namen}} </td>
                                            <td scope="row">{{$invite->instrument}} </td>
                                            <td scope="row">V obdelavi</td>
                                        </tr>
                                    @endif
                                @endif
                            @endforeach
                        @endauth
                    @else
                    <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <p class="text-center">Ni potrjenih povabil</p>
                    </td>
                    </tr>
                    @endunless
                </tbody>
        </table>
    </x-card>
    
    <x-card class="p-10 mx-auto mt-24">
        <header>
            <h3 class="text-3xl text-center font-bold my-6 uppercase">
            Potrjena povabila
            </h3>
        </header>
        <table class="w3-table w3-striped w3-bordered">
            <thead>
                <th scope="col">#</th>
                <th scope="col">Pošiljatelj</th>
                <th scope="col">Prejemnik</th>
                <th scope="col">Namen</th>
                <th scope="col">Instrument</th>
                <th scope="col">Status</th>
                </thead>
                <tbody>
                    @unless($invites->isEmpty())
                        @auth
                            @foreach($invites as $invite)
                                @if ($invite->status=="potrjeno")  <!-- restrict and show only messegaes sended to me -->  
                                    @if (Auth::user()->email==$invite->sender_email || (Auth::user()->email==$invite->email))
                                        <tr> 
                                            <td scope="row">{{$invite->id}} </td>
                                            <td scope="row">{{$invite->sender_email}}</td>
                                            <td scope="row">{{$invite->email}} </td>
                                            <td scope="row">{{$invite->namen}} </td>
                                            <td scope="row">{{$invite->instrument}} </td>
                                            <td scope="row">Sprejeto </td>
                                        </tr>
                                    @endif
                                @endif
                            @endforeach
                        @endauth
                    @else
                    <tr class="border-gray-300">
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <p class="text-center">Ni potrjenih povabil</p>
                    </td>
                    </tr>
                    @endunless
                </tbody>
        </table>
    </x-card>
</x-layout>
