@props([
	'name',
	'children',
])

<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
		{{ $name }}
	</a>
	<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		@foreach ($children as $child)
			<x-crudnavbar::nav.dropdown-item :name="$child['name']" :url="config('url') . '/' . $child['slug']" />
		@endforeach 
	</ul>
</li>