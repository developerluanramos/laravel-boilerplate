<?php

namespace App\Providers;

use App\Models\Invitation;
use App\Models\User;
use App\Observers\InvitationObserver;
use Illuminate\Support\ServiceProvider;
use \Illuminate\Support\Facades\Event;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Invitation::observe(InvitationObserver::class);

        // Inicializa contador ao criar usuário
        User::created(function ($user) {
            $user->qtd_seguidores = 0;
            $user->save();
        });

        // Atualiza contador ao seguir/deixar de seguir
        Event::listen('eloquent.attached: seguidores', function ($user, $relation, $ids) {
            $user->increment('qtd_seguidores', count($ids));
        });

        Event::listen('eloquent.detached: seguidores', function ($user, $relation, $ids) {
            $user->decrement('qtd_seguidores', count($ids));
        });
    }
}
