<?php

/**
 *  (ɔ) LARAVEL.Sillo.org - 2012-2024
 */

namespace Database\Seeders\Main;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
	use WithoutModelEvents;

	public static $nbrCategories;

	public function run()
	{
		$data               = [];
		$numberOfCategories = 3;

		for ($i = 1; $i <= $numberOfCategories; ++$i)
		{
			$category = "Category {$i}";
			$data[]   = [
				'title' => $category,
				'slug'  => Str::of($category)->slug('-'),
			];
		}

		// Insérer les données dans la table categories
		DB::table('categories')->insert($data);

		// Mettre à jour le nombre de catégories
		self::$nbrCategories = count($data);
	}
}
