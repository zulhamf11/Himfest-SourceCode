@props(['disabled' => false])

<button {{ $disabled ? 'disabled' : '' }}
    {{ $attributes->merge(['type' => 'submit', 'class' => 'items-center px-4 py-2 gradient hover:underline bg-white font-bold rounded-full mt-4 lg:mt-0 py-2 px-6 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out text-white']) }}>
    {{ $slot }}
</button>