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
	public $data; // Série actuelle (ou null si aucune)

	/**
	 * Méthode de montage initiale appelée lors de la création du composant.
	 */
	public function mount(): void
	{
		$data = 123;
		include_once 'translation.php';
		$this->data = $data;
	}

	/**
	 * Définit les variables passées à la vue.
	 *
	 * @return array Les variables de la vue
	 */
	// public function with(): array
	// {
	// 	return [
	// 		'data' => $this->data,
	// 	];
	// }
};
