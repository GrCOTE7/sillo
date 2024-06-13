<?php

/**
 * (ɔ) LARAVEL.Sillo.org - 2015-2024
 */

use App\Repositories\PostRepository;

// $data = testGenerateUniqueSlug();
$greetings = function ($nb = 0) {
	return trans_choice(':nb gars', $nb, ['nb' => $nb]);
};

$data = $greetings()
  . '<br>' . $greetings(1)
  . '<br>' . $greetings(2)
  . '<br>' . $greetings(15)
  . '<hr>' . testTextTranslations(11)
  . '<br>' . testTextTranslations(2)
  . '<br>' . testTextTranslations(1)
  . '<br>' . testTextTranslations(0);

function testGenerateUniqueSlug()
{
	$pr = new PostRepository();

	return $pr->generateUniqueSlug(('post-1'));
}
function testTextTranslations($count = 0)
{
	app()->setLocale('en');

	return trans_choice('Left: :count chars', $count, ['count' => $count, 'max_chars' => 100]);
}
