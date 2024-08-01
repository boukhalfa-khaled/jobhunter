@props(['label', 'name'])

<div>
  @if($label)
    <x-forms.label :$name :$label />
  @endif
    {{$slot}}
    <x-forms.error :error="$errors->first($name)"/>
</div>