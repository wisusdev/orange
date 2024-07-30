<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Provider extends Model
{
    use HasFactory;

	protected $fillable = ['name', 'address', 'phone', 'description'];

	public function products(): HasMany
	{
		return $this->hasMany(Product::class);
	}
}
