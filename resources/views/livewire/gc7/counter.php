<?php

/**
 * (ɔ) LARAVEL.Sillo.org - 2015-2024
 */

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new
#[Layout('components.layouts.auth')]
class extends Component {
	// Propriétés de la classe
	// public ?data $data = null; // Série actuelle (ou null si aucune)
	public $data    = 789;
	public $count   = 111;
	public $version = 'GC7 counter';

	/**
	 * Méthode de montage initiale appelée lors de la création du composant.
	 */
	public function mount(): void
	{
		// $data = 1234;
		// $this->data = $data;
	}

	public function increment()
	{
		++$this->count;
		++$this->data;
	}

	public function decrement()
	{
		--$this->count;
	}
	/**
	 * Définit les variables passées à la vue.
	 */
	public function with(): array
	{
		return [
			// 'data' => $this->data,
		];
	}
};
