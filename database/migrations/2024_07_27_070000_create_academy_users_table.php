<?php

/**
 *  (ɔ) LARAVEL.Sillo.org - 2012-2024
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
	/**
	 * Run the migrations.
	 */
	public function up(): void {
		Schema::create('academy_users', function (Blueprint $table) {
			$table->id();
			$table->string('name');
			$table->string('firstname');
			$table->string('email')->unique();
			$table->enum('gender', ['unknown', 'female', 'male'])->default('unknown');

			$table->boolean('academyAccess')->default(false);
			$table->enum('role', ['none', 'student', 'tutor'])->default('none');
			$table->integer('parr');
			$table->integer('level')->default(0);
			$table->integer('lb')->default(0);
			$table->integer('rb')->default(0);

			$table->string('password');
			$table->rememberToken();
			$table->boolean('valid')->default(true);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void {
		Schema::dropIfExists('academy_users');
	}
};
