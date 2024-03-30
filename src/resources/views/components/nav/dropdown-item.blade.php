@props([
	'name',
	'url',
])

@if ($url !== '/')
	<li><a class="dropdown-item" href="{{ $url }}">{{ $name }}</a></li>
@else
	<li class="dropdown-header">{{ $name }}</li>
@endif