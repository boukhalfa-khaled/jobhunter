@props(['job'])
<x-panel class="flex flex-col text-center">
  <div class="self-start text-sm">{{$listing->employer->name}}</div>
      <div class="py-8 ">
          <h3 class="font-bold text-xl  group-hover:text-blue-600  transition-colors duration-300">{{$listing->title}}</h3>
          <p class="text-sm mt-4">{{$listing->salary}}</p>
      </div>
      <div class="flex justify-between items-center  mt-auto">
          <div>
              @foreach($listing->tags as $tag)
              <x-tag :$tag size="small"/>
              @endforeach
          </div>

        <x-employer-logo :width="45" />
  </div>
</x-panel>