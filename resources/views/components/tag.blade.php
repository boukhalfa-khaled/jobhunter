@props(['tag'])
<a  href="{{$tag->slug === request()->get('tag') ? route('listings.index') :  route('listings.index', ['tag' => $tag->slug]) }}"
  class="inline-block  py-2 px-3 min-w-24 text-center tracking-wide text-xs  font-medium title-font py-0.5 px-1.5 border uppercase transition-colors duration-300
  {{ $tag->slug === request()->get('tag') ? 'bg-primary text-background border-primary' : 'bg-background text-gray-100 border-gray-500 hover:bg-primary hover:text-background' }}"
  >{{$tag->name}}
</a>