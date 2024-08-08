<?php

/**
 * (ɔ) LARAVEL.Sillo.org - 2012-2024
 */

use App\Models\AcademyUser;
use Livewire\Attributes\{Layout, Title};
use Livewire\Volt\Component;

new
#[Title('Test')]
#[Layout('components.layouts.academy')]
class() extends Component {
	public $users;

	public function mount()
	{
		$this->users = AcademyUser::all();

		$this->users = collect([
			(object) [
				'id'        => 1,
				'name'      => 'Doe',
				'firstname' => 'John',
				'email'     => 'john@example.com',
			],
			(object) [
				'id'        => 2,
				'name'      => 'Doe',
				'firstname' => 'Jane',
				'email'     => 'jane@example.com',
			],
			(object) [
				'id'        => 3,
				'name'      => 'Doe',
				'firstname' => 'Mike',
				'email'     => 'mike@example.com',
			],
		]);
		$this->create();
	}

	public function create()
	{
		// Créer un nouvel utilisateur
		$this->users->push(AcademyUser::factory()->make());
		// User::save();
	}
};
