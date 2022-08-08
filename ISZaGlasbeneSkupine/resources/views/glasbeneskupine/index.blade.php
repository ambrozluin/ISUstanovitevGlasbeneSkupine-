<x-layout>
 
    @include('components.hero')

  
    @include('components.search')
  
    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
  
        @unless(count($glasbeneskupine) == 0)

        @foreach($glasbeneskupine as $glasbenaskupina)
            <x-glasbenaskupina-card :glasbenaskupina="$glasbenaskupina" />
        @endforeach
    
        @else
        <p>No listings found</p>
        @endunless
        

 
    
    </div>
  
    <div class="mt-6 p-4">
        {{$glasbeneskupine->links()}}
    </div>
</x-layout>
  