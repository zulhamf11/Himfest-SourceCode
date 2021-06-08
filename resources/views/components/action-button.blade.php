@props(['link' => ''])

@if ($link == '')
<button
  {{ $attributes->merge(['type' => 'button', 'class' => 'mx-auto lg:mx-0 hover:underline bg-white font-bold rounded-full mt-4 lg:mt-0 py-2 px-6 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out']) }}>
  {{ $slot }}
</button>
@else
<a
  {{ $attributes->merge(['href' => $link, 'class' => 'action-button mx-auto lg:mx-0 hover:underline bg-white font-bold rounded-full mt-4 lg:mt-0 py-2 px-6 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out']) }}>
  {{ $slot }}
</a>
@endif