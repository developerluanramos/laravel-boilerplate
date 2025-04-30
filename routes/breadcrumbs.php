<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// Home > Profile
Breadcrumbs::for('profile', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Perfil', route('profile'));
});

// -- invitations
Breadcrumbs::for('invitations', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Convites', route('invitations.index'));
});
Breadcrumbs::for('invitations.create', function (BreadcrumbTrail $trail) {
    $trail->parent('invitations');
    $trail->push('Novo convite');
});

// -- users
Breadcrumbs::for('users', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Usuários', route('users.index'));
});
