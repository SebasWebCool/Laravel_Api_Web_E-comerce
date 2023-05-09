<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Sock
 *
 * @property $id
 * @property $name
 * @property $description
 * @property $price
 * @property $color
 * @property $size
 * @property $sku
 * @property $image
 * @property $stock
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Sock extends Model
{
    
    static $rules = [
		'name' => 'required',
		'description' => 'required',
		'price' => 'required',
		'color' => 'required',
		'size' => 'required',
		'sku' => 'required',
		'stock' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name','description','price','color','size','sku','image','stock'];



}
