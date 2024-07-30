<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

	protected $fillable = ['name', 'price', 'description', 'provider_id'];

	public function provider(): BelongsTo
	{
		return $this->belongsTo(Provider::class);
	}
}
