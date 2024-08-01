@props(['error' => false])

@if($error)
  <small class="text-red-500  ">{{ $error }}</small>
@endif