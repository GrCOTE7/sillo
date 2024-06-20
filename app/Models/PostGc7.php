<?php

/**
 * (ɔ) LARAVEL.Sillo.org - 2015-2024
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostGc7 extends Model
{
	use HasFactory;

	protected $table    = 'posts_gc7';
	protected $fillable = [
		'title',
		'content',
	];
}