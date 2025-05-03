<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
        $middleware->alias([
            // Vous pouvez ajouter d'autres alias ici si nécessaire,
            // mais ceux de base comme 'auth' sont souvent gérés ailleurs ou automatiquement.
            // Assurez-vous de ne pas recréer des alias déjà existants par défaut.

            // Alias pour Spatie Laravel Permission
            'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class, ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
