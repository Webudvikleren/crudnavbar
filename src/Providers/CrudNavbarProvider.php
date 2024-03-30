<?php

namespace Webudvikleren\CrudNavbar\Providers;

use Illuminate\Support\ServiceProvider;

class CrudNavbarProvider extends ServiceProvider
{
	/**
	 * Bootstrap services.
	 * 
	 * @return void
	 */
	public function boot()
	{
		$this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
		$this->loadTranslationsFrom(__DIR__ . '/../lang', 'crudnavbar');
		$this->loadViewsFrom(__DIR__ . '/../resources/views', 'crudnavbar');
		//$this->mergeConfigFrom(__DIR__.'/../config/crudnavbar.php', 'crudnavbar');
	}
}