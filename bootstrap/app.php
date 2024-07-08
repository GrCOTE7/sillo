<?php

/**
 * (ɔ) LARAVEL.Sillo.org - 2015-2024
 */

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\{Exceptions, Middleware};

return Application::configure(basePath: dirname(__DIR__))
	->withRouting(
		web: __DIR__ . '/../routes/web.php',
		commands: __DIR__ . '/../routes/console.php',
		channels: __DIR__ . '/../routes/channels.php',
		health: '/up',
	)
	->withMiddleware(function (Middleware $middleware) {
	})
	->withExceptions(function (Exceptions $exceptions) {
	})->create();
