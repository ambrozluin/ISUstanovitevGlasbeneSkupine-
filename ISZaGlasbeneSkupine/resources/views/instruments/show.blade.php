<x-layout>

    <x-card class="p-10 mx-auto mt-24">
        <header>
            <h3 class="text-3xl text-center font-bold my-6 uppercase">
              Vsa razpoložljiva glasbila
            </h3>
          </header>
        <table class="w3-table w3-striped w3-bordered">
            <thead>
                <th scope="col">#</th>
                <th scope="col">Znamka</th>
                <th scope="col">Cena</th>
                <th scope="col">Vrsta</th>
                <th scope="col">Dodaj med svoje</th>
                </thead>
                <tbody>
                    @foreach($instruments as $instrument)
                        <tr>
                            <td scope="row">{{$instrument->id}} </td>
                            <td scope="row">{{$instrument->ime}}</td>
                            <td scope="row">{{$instrument->cena}} € </td>
                            <td scope="row">{{$instrument->vrsta}} </td>
                            <td scope="row">
                                <a href="invites/{{$instrument->id}}" class="btn btn-warning"> Dodaj</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
    </x-card>


</x-layout>