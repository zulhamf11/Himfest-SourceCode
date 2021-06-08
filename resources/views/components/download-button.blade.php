@props(['type' => 'submission', 'id' => 0])

<form method="POST" action="{{ route('dashboard.download-file') }}">
    @csrf

    <x-input id="type" type="hidden" name="type" value="{{ $type }}" />
    <x-input id="id" type="hidden" name="id" value="{{ $id }}" />
    <button {{ $attributes->merge(['class' => 'bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded']) }}>
        {{ __('Download') }}
    </button>
</form>