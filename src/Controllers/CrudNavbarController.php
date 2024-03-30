<?php

namespace Webudvikleren\CrudNavbar\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Webudvikleren\CrudNavbar\Models\CrudNavbar;

class CrudNavbarController extends Controller
{
	protected string $baseroute = 'admin.crudnavbar.';
	protected array $breadcrumbs = [];

    public function create()
	{
		$navbars = CrudNavbar::orderBy('parent')->orderBy('order')->get();
		$this->breadcrumbs[] = [trans('crudnavbar::navbar.navbars'), route($this->baseroute . 'index')];
		$navbars = CrudNavbar::orderBy('parent')->orderBy('order')->get();
		return view('crudnavbar::create')
				->with('baseroute', $this->baseroute)
				->with('breadcrumbs', $this->breadcrumbs)
				->with('navbars', $navbars);
	}

	public function delete($id)
	{
		$navbar = CrudNavbar::findOrFail($id);
		$navbar->delete();
		Cache::flush();

		session()->flash('success', trans('crudnavbar::navbar.deleted'));
		return redirect()->route($this->baseroute . 'index');
	}

	public function edit($id)
	{
		$navbar = CrudNavbar::findOrFail($id);
		$navbars = CrudNavbar::orderBy('parent')->orderBy('order')->get();
		$this->breadcrumbs[] = [trans('crudnavbar::navbar.navbars'), route($this->baseroute . 'index')];
		return view('crudnavbar::edit')
				->with('baseroute', $this->baseroute)
				->with('breadcrumbs', $this->breadcrumbs)
				->with('item', $navbar)
				->with('navbars', $navbars);
	}

	public function index()
	{
		$navbars = CrudNavbar::orderBy('location')->orderBy('parent')->orderBy('order')->get();
		return view('crudnavbar::index')
				->with('baseroute', $this->baseroute)
				->with('breadcrumbs', $this->breadcrumbs)
				->with('navbars', $navbars);
	}

	public function store(Request $request)
	{
		$validated = $request->validate([
			'location' => ['required', 'string'],
			'parent' => ['exists:navbar,id', 'integer', 'nullable'],
			'order' => ['integer', 'required'],
			'name' => ['required', 'string'],
			'slug' => ['nullable', 'string'],
		], [
			// TODO: Fix.
		]);

        CrudNavbar::create([
			'location' => $validated['location'],
			'parent' => $validated['parent'],
			'order' => $validated['order'],
			'name' => $validated['name'],
			'slug' => $validated['slug'],
        ]);
		Cache::flush();

		session()->flash('success', trans('crudnavbar::navbar.created'));
        return redirect()->route($this->baseroute . 'index');
	}

	public function update($id, Request $request)
	{
		$navbar = CrudNavbar::findOrFail($id);

		$validated = $request->validate([
			'location' => ['required', 'string'],
			'parent' => ['exists:navbar,id', 'integer', 'nullable'],
			'order' => ['integer', 'required'],
			'name' => ['required', 'string'],
			'slug' => ['nullable', 'string'],
		], [
			// TODO: Fix.
		]);

		$navbar->location = $validated['location'];
		$navbar->parent = $validated['parent'];
		$navbar->order = $validated['order'];
		$navbar->name = $validated['name'];
		$navbar->slug = $validated['slug'];
		$navbar->save();
		Cache::flush();

		session()->flash('success', trans('crudnavbar::navbar.updated'));
        return redirect()->route($this->baseroute . 'index');
	}
}
