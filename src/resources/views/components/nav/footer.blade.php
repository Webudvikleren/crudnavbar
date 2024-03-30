@props([
	'name',
	'children',
])

<div class="col-md-3 col-sm-4 mb-2">
	<p class="fs-5 fw-bold mb-1">{{ $name }}</p>
	</a>
	@foreach ($children as $child)
		<x-nav.footer-item :name="$child['name']" :url="config('url') . '/' . $child['slug']" />
	@endforeach 
</div>