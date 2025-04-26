<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         // Réinitialiser les rôles et permissions mis en cache
        // Important pour éviter les erreurs lors de re-seed fréquent
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Créer les rôles
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'employe']);
        Role::create(['name' => 'client']);
    }
}
