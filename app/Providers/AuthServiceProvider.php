<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\Chofer;
use App\Policies\ChoferPolicy;
use App\Models\Turno;
use App\Policies\TurnoPolicy;
use App\Models\Viaje;
use App\Policies\ViajePolicy;
use App\Models\Pasajero;
use App\Policies\PasajeroPolicy;
use App\Models\PasajeroEsperando;
use App\Policies\PasajeroEsperandoPolicy;
use App\Models\TransporteDisponible;
use App\Policies\TransporteDisponiblePolicy;
use App\Models\AvisoPasajero;
use App\Policies\AvisoPasajeroPolicy;
use App\Models\HistorialBaneo;
use App\Policies\HistorialBaneoPolicy;
use App\Models\Usuario;
use App\Policies\UsuarioPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<string, string>
     */
    protected $policies = [
        Chofer::class => ChoferPolicy::class,
        Turno::class => TurnoPolicy::class,
        Viaje::class => ViajePolicy::class,
        Pasajero::class => PasajeroPolicy::class,
        PasajeroEsperando::class => PasajeroEsperandoPolicy::class,
        TransporteDisponible::class => TransporteDisponiblePolicy::class,
        AvisoPasajero::class => AvisoPasajeroPolicy::class,
        HistorialBaneo::class => HistorialBaneoPolicy::class,
        Usuario::class => UsuarioPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        //
    }
}
