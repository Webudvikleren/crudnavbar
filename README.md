

## Requirements
The package views uses Bootstrap 5. 

The package assumes you have a layout-file `layout.app` that can be extended. In your layout-file you also have the following sections: 

* content
  * The main content of the webpage.
* meta_title
  * The title of your webpage. 

## Installation

> composer require webudvikleren/crudnavbar

## Usage

Add something like this to your `routes/web.php` to be able to edit your navbar:

```
<?php
use Webudvikleren\CrudNavbar\Controllers\CrudNavbarController;

Route::controller(CrudNavbarController::class)->middleware('can:navbar crud')->name('admin.crudnavbar.')->prefix('navbar')->group(function () {
	Route::get('', 'index')->name('index');
	Route::get('create', 'create')->name('create');
	Route::post('create', 'store');
	Route::get('{id}/delete', 'delete')->name('delete');
	Route::get('{id}/edit', 'edit')->name('edit');
	Route::post('{id}/edit', 'update');
});
```

The navbar items and their diffferent lo

```
View::composer('*', function($view)
{
	$navbar = Cache::remember('navbar', Carbon::now()->addHours(8), function () {
		$arr = [];
		$navbars = Navbar::where('location', 'navbar')->where('parent', null)->orderBy('order', 'asc')->get();

		foreach ($navbars as $navbar)
		{
			$arr[] = $navbar->asArray();
		}
		return $arr;
	});
	$view->with('navbar', $navbar);

	$navbarFooter = Cache::remember('navbarFooter', Carbon::now()->addHours(8), function () {
		$arr = [];
		$navbars = Navbar::where('location', 'navbarFooter')->where('parent', null)->orderBy('order', 'asc')->get();

		foreach ($navbars as $navbar)
		{
			$arr[] = $navbar->asArray();
		}
		return $arr;
	});
	$view->with('navbarFooter', $navbarFooter);
});
```

The navbar items can then be used in your layout like so: 

```
@foreach ($navbar as $item)
	@if ($item['children'] !== [])
		<x-crudnavbar::nav.dropdown :children="$item['children']" :name="$item['name']" />
	@else
		<x-crudnavbar::nav.item :name="$item['name']" :url="config('url') . '/' . $item['slug']" />	
	@endif
@endforeach
```