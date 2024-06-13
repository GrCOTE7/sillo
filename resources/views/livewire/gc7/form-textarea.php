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

	public string $text = '';
	public int $charsNbLeft;
	public int $charsMax;
	public $var             = 3;
	public $value           = 55;
	public $textareaContent = 'abc';

	/**
	 * Méthode de montage initiale appelée lors de la création du composant.
	 */
	public function mount(): void
	{
		$this->charsMax    = env('APP_NUMBER_OF_CHARS_IN_COMMENTS_FORM', 100) ?? 100;
		$this->charsNbLeft = $this->charsMax;
	}

	public function updatedText()
	{
		$this->charsNbLeft = $this->charsMax - strlen($this->text);
		// $this->var *= 2;
	}

	
	public function updateCharsNbLeft()
{
    $this->charsNbLeft = $this->charsMax - strlen($this->text);
}
	// update lié au meilleur choix
	public function updatedTextareaContent()
	{
		// $this->textareaContent = substr($this->textareaContent, 0, 12);
		$this->charsNbLeft = $this->charsMax - strlen($this->textareaContent);
	}

	public function save_form()
	{
		echo 'save_form()';
		error_log('updatedText has been called: ' . $this->text . '
			', 3, 'error.log');
	}

	// Définit les variables passées à la vue.
	public function with(): array
	{
		return [
			// 'charsNbLeft' => $this->charsNbLeft,
			// 'var' => 789,
		];
	}
};
