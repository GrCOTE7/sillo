<?php

/**
 * (ɔ) LARAVEL.Sillo.org - 2015-2024
 */

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MyEmail extends Mailable
{
	use Queueable;
	use SerializesModels;

	public $sujet;
	public $contenu;
	public $message;
	public $name;

	public function __construct($sujet, $contenu)
	{
		$this->sujet   = $sujet;
		$this->contenu = $contenu;
	}

	public function build()
	{
		return $this->subject($this->sujet)
			->view('emails.my-email')
			->with([
				'contenu' => $this->contenu,
			]);
	}
}
