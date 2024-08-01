<x-app-layout>
    <section class="container px-5 mx-auto mt-20 ">
        <div class="flex flex-col items-center  justify-center gap-4 mb-4">
            <div class="rounded-full overflow-hidden w-56 h-56" >
                <img class="w-56 h-56" class="object-fill" src="/storage/{{$user->employer->logo}}" alt="">
            </div>
        </div>
        <div>
            <p class="mb-4 font-bold text-center text-xl text-primary">{{$user->employer->name}}</p>
        <form method="POST" action="{{ route('logout')}}" class="block text-center">
            @csrf
            <button
                href="{{ route('listings.create') }}"
                type="submit"
            class='py-2  inline-flex border justify-center items-center   text-xs md:text-base font-bold uppercase px-2 text-white   hover:text-red-500 transition-colors duration-300 md:w-28'>
                Logout
            </button>

        </form>
        </div>

         
    </section>

<section class="container px-4 mx-auto">
  <h2 class="text-4xl text-white  text-center capitalize font-bold my-16"> Jobs You Posted ( {{ $user->employer->listings()->count() }} )</h2>

  {{-- <div class="flex flex-col gap-5"> --}}
  <div class="flex flex-wrap lg:flex-col lg:flex-nowrap  lg:gap-5 gap-16 justify-center lg:justify-normal mx-auto ">

    @foreach ($user->employer->listings as $listing)
        

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
        <div class="mb-8 flex flex-col space-y-4">
            <a href="{{ route('listings.show', $listing->slug) }}" class='py-2  inline-flex justify-center items-center  text-xs md:text-base font-bold uppercase px-2 border-2 border-primary text-background bg-primary hover:bg-white hover:border-white transition-colors duration-300 md:w-28 text-center min-w-44 '>
              See More
            </a>
            <a href="{{ route('listings.toggleActive', $listing->slug) }}" class='py-2  inline-flex justify-center items-center  text-xs md:text-base font-bold uppercase px-2 border-2 text-background bg-primary hover:bg-white hover:border-white hover:text-background transition-colors duration-300 md:w-28 text-center min-w-44  {{ $listing->is_active  ? 'bg-primay text-background border-primary' : 'bg-red-500 text-white border-red-500'}} '>
               {{ $listing->is_active  ? 'Active' : 'Unactive'}}
            </a>
            <div   class='py-2  inline-flex justify-center items-center  text-xs md:text-base font-bold uppercase px-2 border-2 border-background text-white bg-background md:w-28 text-center min-w-44 '>
                Clicks ( {{$listing->clicks->count()}} )
            </div>
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
<div class="my-8 flex flex-col space-y-4">
            <a href="{{ route('listings.show', $listing->slug) }}" class='py-2  inline-flex justify-center items-center  text-xs md:text-base font-bold uppercase px-2 border-2 border-primary text-background bg-primary hover:bg-white hover:border-white transition-colors duration-300 md:w-28 text-center min-w-44 '>
              See More
            </a>
            <a href="{{ route('listings.toggleActive', $listing->slug) }}" class='py-2  inline-flex justify-center items-center  text-xs md:text-base font-bold uppercase px-2 border-2 text-background bg-primary hover:bg-white hover:border-white hover:text-background transition-colors duration-300 md:w-28 text-center min-w-44  {{ $listing->is_active  ? 'bg-primay text-background border-primary' : 'bg-red-500 text-white border-red-500'}} '>
               {{ $listing->is_active  ? 'Active' : 'Unactive'}}
            </a>
            <div   class='py-2  inline-flex justify-center items-center  text-xs md:text-base font-bold uppercase px-2 border-2 border-background text-white bg-background md:w-28 text-center min-w-44 '>
                Clicks ( {{$listing->clicks->count()}} )
            </div>
        </div>

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
