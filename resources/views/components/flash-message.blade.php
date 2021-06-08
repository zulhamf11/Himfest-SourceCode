@props(['message'])

@if ($message = Session::get('success'))
<div class="alert alert-success alert-block text-sm text-green-300">
  <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block text-sm text-red-600">
  <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block text-sm text-yellow-400">
  <strong>{{ $message }}</strong>
</div>
@endif

@if ($message = Session::get('info'))
<div class="alert alert-info alert-block text-sm text-blue-500">
  <strong>{{ $message }}</strong>
</div>
@endif