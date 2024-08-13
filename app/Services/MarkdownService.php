<?php

/**
 * (ɔ) LARAVEL.Sillo.org - 2012-2024
 */

namespace App\Services;

class MarkdownService
{
	protected $parsedown;

	public function __construct(\Parsedown $parsedown)
	{
		$this->parsedown = $parsedown;
	}

	public function parse($content)
	{
		// $content = preg_replace_callback(
		// 	'/!\[([^\]]*)\]\(((?:\.\.\/)*public\/[^)]+)\)/',
		// 	function ($matches) {
		// 		$path = preg_replace('/^(?:\.\.\/)*public\//', '', $matches[2]);

		// 		return '![' . $matches[1] . '](' . asset($path) . ')';
		// 	},
		// 	$content
		// );

		$content = preg_replace_callback(
			'/<div style="text-align:\s*center">\s*!\[([^\]]*)\]\(((?:\.\.\/)*public\/[^)]+)\)\s*<\/div>/i',
			function ($matches) {
				$altText  = $matches[1];
				$path     = preg_replace('/^(?:\.\.\/)*public\//', '', $matches[2]);
				$imageUrl = asset($path);

				return "<div style=\"text-align: center;\"><img src=\"{$imageUrl}\" alt=\"{$altText}\" style=\"display: inline-block;\"></div>";
			},
			$content
		);

		// Traiter les images normales
        $content = preg_replace_callback(
            '/!\[([^\]]*)\]\(((?:\.\.\/)*public\/[^)]+)\)/',
            function ($matches) {
                $path = preg_replace('/^(?:\.\.\/)*public\//', '', $matches[2]);
                return '![' . $matches[1] . '](' . asset($path) . ')';
            },
            $content
        );
		return $this->parsedown->text($content);
	}
}
