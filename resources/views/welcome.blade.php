<x-app-layout>
  <x-hero/>
<section class="container px-4 py-12 mx-auto">
    <div class="mb-12">
      <div class="flex gap-4 justify-center flex-wrap">
        @foreach ($tags as $tag)
          <x-tag :$tag/>
        @endforeach
      </div>
    </div>
</section>

<section class="container px-4 mx-auto">
  <h2 class="text-4xl text-white  text-center capitalize font-bold my-16">Feaatured Post</h2>

  <div class="flex flex-wrap gap-16 justify-center mx-auto">




    @foreach ($listings->take(3) as $listing)



    <div class="bg-card px-8 py-6 flex flex-col w-[400px] shadow-2xl shadow-black/40 border hover:border-primary duration-300 transition-colors">
      <div class="flex justify-between">
          <div class="font-bold text-white self-start"> {{$listing->employer->name}} </div>
          <small class="text-white/50">Posted {{$listing->created_at->diffForHumans()}} </small>
      </div>
      <div class="flex  flex-col  mt-6">
        <h3 class="captalize text-center mb-4 h-16 overflow-y-clip text-2xl text-wrap text-white font-bold">
          {{ $listing->title }}
        </h3>
        <p class="uppercase text-xl font-bold text-white text-center mb-4">{{ $listing->salary }}</p>
        <p class="font-bold text-white uppercase text-center  "> @ {{$listing->location}} </p>
        <p class="font-bold text-white uppercase text-center"> {{$listing->schedule}}  </p>
      </div>
      <a href="{{ route('listings.show', $listing->slug)}}" class='py-2  inline-flex justify-center items-center  text-xs md:text-base font-bold uppercase px-2 border-2 border-primary text-background bg-primary hover:bg-white hover:border-white transition-colors duration-300 md:w-28 mt-14 mb-14 px-8 min-w-fit mx-auto cursor-pointer'>
        See More
      </a>

      <div class="flex justify-between items-center  mt-auto">
      <div class="flex gap-2 justify-between items-center  mt-auto ">
        @foreach ($listing->tags as $tag)
          <x-tag :$tag/>
        @endforeach
      </div>
      <div>
        <div class="w-24 h-24  rounded-full">
          <img class="object-fill h-24 w-24 rounded-full" src="/storage/{{$listing->employer->logo}}" alt="">
        </div>
      </div>
      </div>

    </div>

@endforeach

  </div>

</section>



<section class="container px-4 mx-auto">
  <h2 class="text-4xl text-white  text-center capitalize font-bold my-16">All Posts ( {{ $listings->count() }} )</h2>

  {{-- <div class="flex flex-col gap-5"> --}}
  <div class="flex flex-wrap lg:flex-col lg:flex-nowrap  lg:gap-5 gap-16 justify-center lg:justify-normal mx-auto ">

    @foreach ($listings as $listing)
        

    <div class="hidden lg:flex  shadow-xl shadow-black/30 p-8 items-center w-full bg-card border border-background hover:border-primary  hover:shadow-primary/5 transition-colors duration-300">
      <div class="w-36 h-36 rounded-full overflow-hidden bg-white  mr-10">
          <img src="/storage/{{$listing->employer->logo}}" class="rounded-full object-fill w-36 h-36" alt="">
      </div>
      <div class="flex flex-col items-start  w-1/2">
        <div class="text-white font-bold cappitilze">{{$listing->employer->name}}</div>
        <h3 class="text-white font-bold text-3xl mb-4"> {{$listing->title}} </h3>
        <p class="font-bold text-white uppercase mb-4"> {{$listing->salary}} </p>
        <p class="font-bold text-white uppercase "> @ {{$listing->location}} </p>
        <p class="font-bold text-white uppercase "> {{$listing->schedule}}  </p>
        <small class="text-white/50">Posted {{$listing->created_at->diffForHumans()}} </small>
      </div>
      <div class="ml-auto flex  flex-col justify-between items-end h-full">
        <div class="mb-8">
            <a href="{{ route('listings.show', $listing->slug) }}" class='py-2  inline-flex justify-center items-center  text-xs md:text-base font-bold uppercase px-2 border-2 border-primary text-background bg-primary hover:bg-white hover:border-white transition-colors duration-300 md:w-28 text-center min-w-44 '>
              See More
            </a>
        </div>
        <div class="flex gap-2 justify-between items-center  mt-auto ">
          @foreach ($listing->tags as $tag)
            <x-tag :$tag/>
          @endforeach
        </div>
      </div>
    </div>




    <div class="flex lg:hidden  bg-card px-8 py-6  flex-col w-[400px] shadow-2xl shadow-black/40 border border-background  hover:border-primary duration-300 transition-colors">

      <div class="flex justify-between">
          <div class="font-bold text-white self-start"> {{$listing->employer->name}} </div>
          <small class="text-white/50">Posted {{$listing->created_at->diffForHumans()}} </small>
      </div>
      <div class="flex  flex-col  mt-6">
        <h3 class="captalize text-center mb-4 h-16 overflow-y-clip text-2xl text-wrap text-white font-bold">
          {{ $listing->title }}
        </h3>
        <p class="uppercase text-xl font-bold text-white text-center mb-4">{{ $listing->salary }}</p>
        <p class="font-bold text-white uppercase text-center  "> @ {{$listing->location}} </p>
        <p class="font-bold text-white uppercase text-center"> {{$listing->schedule}}  </p>
      </div>
      <a href="{{ route('listings.show', $listing->slug)}}" class='py-2  inline-flex justify-center items-center  text-xs md:text-base font-bold uppercase px-2 border-2 border-primary text-background bg-primary hover:bg-white hover:border-white transition-colors duration-300 md:w-28 mt-14 mb-14 px-8 min-w-fit mx-auto cursor-pointer'>
        See More
      </a>

      <div class="flex justify-between items-center  mt-auto">
      <div class="flex gap-2 justify-between items-center  mt-auto ">
        @foreach ($listing->tags as $tag)
          <x-tag :$tag/>
        @endforeach
      </div>
      <div>
        <div class="w-24 h-24  rounded-full">
          <img class="object-fill h-24 w-24 rounded-full" src="/storage/{{$listing->employer->logo}}" alt="">
        </div>
      </div>
      </div>

    </div>



    @endforeach

    </div>




</section>



</x-app-layout>