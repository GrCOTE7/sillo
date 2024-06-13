<?php

/**
 * (ɔ) LARAVEL.Sillo.org - 2015-2024
 */

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.auth')]
class extends Component {
	public int $nb2        = 1000;
	public int $charsNbLeft = 789;

	public function mount()
	{
		$this->nb2 = 8888;
	}

	public function with()
	{
		return [
			'nb2' => $this->nb2,
		];
	}
};
