@props([
	'name',
	'url',
])

<a class="nav-link" href="{{ $url }}">{{ $name }}</a>