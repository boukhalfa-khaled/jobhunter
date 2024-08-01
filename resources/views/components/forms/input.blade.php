@props(['label', 'name'])

@php


  $defaults = [
    'type' => 'text',
    'id' => $name,
    'name' => $name,
    'class' => 'w-full p-4 border  bg-background',
    'value' => old($name)
];
if($errors->first($name)){
  $defaults['class'] .= 'w-full p-4 border  bg-background border-red-500';
}

@endphp


<x-forms.field :$label :$name >
        <input {{$attributes($defaults)}}>
</x-forms.field>