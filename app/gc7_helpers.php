<?php

/**
 * (ɔ) LARAVEL.Sillo.org - 2015-2024
 */

use Livewire\Volt\Volt;

if (!function_exists('getGc7FrameworksLinks')) {
	function getGc7FrameworksLinks()
	{
		return [
			'livewire' => ['basics', 'blog', 'create-post', 'todos', 'counter', 'new-form', 'serie7'],
			'alpinejs' => ['basics', 'test', 'pets', 'accordion', 'ga', 'characters', 'drag-drop', 'chats', 'divers'],
		];
	}
}

if (!function_exists('getGc7FrameworksRoutes')) {
	function getGc7FrameworksRoutes()
	{
		$frameworksLinks = getGc7FrameworksLinks();

		foreach ($frameworksLinks as $framework => $links) {
			foreach ($links as $link) {
				Volt::route("/{$framework}/{$link}", "gc7.frameworks.{$framework}.{$link}")->name("{$framework}.{$link}");
			}
		}
	}
}
