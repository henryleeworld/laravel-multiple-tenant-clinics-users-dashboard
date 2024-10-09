<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeders.
     */
    public function run(): void
    {
        User::factory()
            ->masterAdmin()
            ->create([
                'name' => __('Master Administrator'),
                'email' => 'master@admin.com',
            ]);

        User::factory()
            ->clinicOwner()
            ->create([
                'name' => __('Clinic Owner'),
                'email' => 'owner@clinic.com',
            ]);

        User::factory()
            ->clinicAdmin()
            ->create([
                'name' => __('Clinic Administrator'),
                'email' => 'admin@clinic.com',
            ]);

        User::factory()
            ->staff()
            ->create([
                'name' => __('Staff'),
                'email' => 'staff@clinic.com',
            ]);

        User::factory()
            ->patient()
            ->create([
                'name' => __('Patient'),
                'email' => 'user@clinic.com',
            ]);

        User::factory(5)
            ->patient()
            ->create();

        User::factory(5)
            ->doctor()
            ->create();

        User::factory(5)
            ->staff()
            ->create();
    }
}
