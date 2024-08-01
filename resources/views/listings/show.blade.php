<x-app-layout>

<section class="container  px-5  mx-auto">
  <div class="mb-10 mt-24">
    <h2 class="text-white text-3xl font-bold mb-4 ">
      {{$listing->title}}
    </h2>
    <div class="flex gap-3">
    @foreach ($listing->tags as $tag)
      <x-tag :$tag/>  
    @endforeach
    </div>
  </div>
  <div class="flex mb-72 flex-col lg:flex-row-reverse lg:gap-20 ">
    <div class=" w-72 flex flex-col">
      <div class="w-72 mb-2">
        <img src="/storage/{{$listing->employer->logo}}" alt="">
      </div>
        <p class="text-white capitalize text-xl mb-4 text-center">Created By {{$listing->employer->name}}</p>
        <p class="text-white capitalize text-xl text-center mb-4">{{$listing->salary}} Per Month</p>
        <div class="flex justify-between mb-2">
          <p class="text-white capitalize  ">@ {{$listing->location}}</p>
          <p class="text-white capitalize  ">{{$listing->schedule}}</p>
        </div>
        <a href="{{ route('listings.apply', $listing->slug ) }}" target="_blank" class='py-2  inline-flex justify-center items-center  text-xl  font-bold uppercase px-2 border-2 border-primary text-background bg-primary hover:bg-white hover:border-white transition-colors duration-300 '>
          Apply Now
        </a>
    </div>
    <div class="text-white mt-12 lg:mt-0"> 
        {!! $listing->content!!}
    </div>
  </div>

</section>
</x-app-layout>