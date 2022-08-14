<x-layout>
    <x-herog></x-herog>

    <x-card class="text-left">
        <a class="btn btn-info btn-lg" href="/instruments">Vsi Instrumenti</a>
        <a class="btn btn-info btn-lg active" href="/instruments/list">Moji Instrumenti</a>
    </x-card>

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
                            <form>
                            <td scope="row">{{$instrument->id}} </td>
                            <td scope="row">{{$instrument->ime}}</td>
                            <td scope="row">{{$instrument->cena}} € </td>
                            <td scope="row">{{$instrument->vrsta}} </td>
                            <td scope="row">
                                <a href="/instruments/remove/{{$instrument->id}}" class="btn btn-danger"> Odstani</a>
                            </td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
        </table>
    </x-card>


</x-layout>