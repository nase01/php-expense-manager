<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpensesCategory extends Model
{
    protected $table = 'expenses_category';
	public $timestamps = true;
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'description'
	];
}
