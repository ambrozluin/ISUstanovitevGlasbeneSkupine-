<x-layout>
    <div>
        <h1 class="text-3xl text-center font-bold my-6 uppercase">
          Pošlji povabilo prijatelju
        </h1>
    </div>

    <x-card class="p-10 mx-auto mt-24">
        <header>
            <h3 class="text-3xl text-center font-bold my-6 uppercase">
              Vsi uporabniki
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
                    <tr>
                        <td scope="row">{{$user->id}} </td>
                        <td scope="row">{{$user->name}} </td>
                        <td scope="row">{{$user->email}} </td>
                        <td scope="row">
                            <button class="h-8 w-20 text-white rounded-lg bg-yellow-500 hover:bg-yellow-600"
                             onclick="location.href='/invite/{{$user->id}}'" type="button">Povabi</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </table>
    </x-card>
</x-layout>
