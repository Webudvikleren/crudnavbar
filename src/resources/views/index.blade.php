@extends('layout.app')
@section('meta_title', trans('crudnavbar::navbar.navbars'))

@section('content')
<h1>{{ trans('crudnavbar::navbar.navbars') }}</h1>
<x-crudnavbar::status />

<a class="btn btn-light mb-3" href="{{ route($baseroute . 'create') }}">
	<x-bi::plus-circle color="green" size="20" />
	{{ trans('crudnavbar::navbar.create') }}
</a>

<table class="table table-hover table-list">
	<thead>
		<td>{{ trans('crudnavbar::navbar.location') }}</td>
		<td>{{ trans('crudnavbar::navbar.parent') }}</td>
		<td>{{ trans('crudnavbar::navbar.order') }}</td>
		<td>{{ trans('crudnavbar::navbar.name') }}</td>
		<td>{{ trans('crudnavbar::navbar.slug') }}</td>
		<td class="text-center" colspan="2">{{ trans('crudnavbar::navbar.actions') }}</td>
	</thead>
	@foreach ($navbars as $navbar)
		<tr>
			<td>{{ $navbar->location }}</td>
			<td>{{ $navbar->parent }}</td>
			<td>{{ $navbar->order }}</td>
			<td>{{ $navbar->name }}</td>
			<td>{{ $navbar->slug }}</td>
			<td class="text-center">
				<a href="{{ route($baseroute . 'edit', ['id' => $navbar->id]) }}" :title="trans('crudnavbar::navbar.edit')">
					<x-bi::pencil-square />
				</a>
			</td>
			<td class="text-center">
				<a href="{{ route($baseroute . 'delete', ['id' => $navbar->id]) }}" onclick="return confirm('{{ trans('crudnavbar::navbar.delete.confirm') }}')" :title="trans('crudnavbar::navbar.delete')">
					<x-bi::trash color="red" />
				</a>
			</td>
		</tr>
	@endforeach
</table>
@endsection