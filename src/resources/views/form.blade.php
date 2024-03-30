<form action="@if (isset($item)) {{ route($baseroute . 'edit', ['id' => $item->id]) }} @else {{ route($baseroute . 'create') }} @endif" method="post">
	@csrf

	<div class="row">
		<x-formcomponents::input col="col-md-6" id="location" :name="trans('crudnavbar::navbar.location')" :value="old('location', isset($item) ? $item->location : '')" />
			
		@if (isset($item))
			<x-formcomponents::select col="col-md-6" id="parent" :name="trans('crudnavbar::navbar.parent')">
				@if ($item->parent === null)
					<option selected value="">{{ trans('crudnavbar::navbar.no-parent') }}</option>
					@foreach ($navbars as $navbarItem)
						<option value="{{ $navbarItem->id }}">{{ $navbarItem->name }}</option>
					@endforeach	
				@else
					<option selected value="">{{ trans('crudnavbar::navbar.no-parent') }}</option>
					@foreach ($navbars as $navbarItem)
						<option @if ($item->parent == $navbarItem->id) selected @endif value="{{ $navbarItem->id }}">{{ $navbarItem->name }}</option>
					@endforeach	
				@endif
			</x-formcomponents::select>
		@else
			<x-formcomponents::select col="col-md-6" id="parent" :name="trans('crudnavbar::navbar.parent')">
				<option value="">{{ trans('crudnavbar::navbar.no-parent') }}</option>
				@foreach ($navbars as $navbarItem)
					<option value="{{ $navbarItem->id }}">{{ $navbarItem->name }}</option>
				@endforeach
			</x-formcomponents::select>
		@endif

		<x-formcomponents::input col="col-md-6" id="order" :name="trans('crudnavbar::navbar.order')" :value="old('order', isset($item) ? $item->order : '')" />
		<x-formcomponents::input col="col-md-6" id="name" :name="trans('crudnavbar::navbar.name')" :value="old('name', isset($item) ? $item->name : '')" />
		<x-formcomponents::input col="col-md-6" id="slug" :name="trans('crudnavbar::navbar.slug')" :value="old('slug', isset($item) ? $item->slug : '')" />

		<x-formcomponents::button>
			@if (isset($item)) 
				{{ trans('crudnavbar::navbar.update') }}
			@else
				{{ trans('crudnavbar::navbar.create') }}
			@endif
		</x-formcomponents::button>
	</div>
</form>