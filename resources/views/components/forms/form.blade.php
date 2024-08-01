<form {{ $attributes(["class" => "bg-card   w-[500px] text-white shadow-lg shadow-black p-8", "method" => "GET"]) }} >
  @if($attributes->get('method', 'GET') !== 'GET')
    @csrf
    @method($attributes->get('method'))
  @endif
  {{ $slot }}
</form>