<?php

namespace Webudvikleren\CrudNavbar\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrudNavbar extends Model
{
    use HasFactory;

	protected $guarded = [];
	protected $table = 'crud_navbar';

	public function asArray(): array
	{
		return [
			'name' => $this->name,
			'slug' => $this->slug,
			'children' => $this->getChildrenAsArray(),
			'parent' => $this->parent === null ? false : true,
		];
	}

	private function getChildrenAsArray(): array
	{
		$arr = [];
		$navbars = CrudNavbar::where('parent', $this->id)->orderBy('order', 'asc')->get();
		foreach ($navbars as $navbar)
		{
			$arr[] = $navbar->asArray();
		}
		return $arr;
	}
}
