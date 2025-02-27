<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $adminUser = User::factory()->create([
            'loginId' => 'test',
        ]);

        User::factory()->create([
            'loginId' => 'test1',
        ]);

        $adminRole = Role::create(['name' => 'admin']);

        $registerPermission = Permission::create(['name' => 'register']);

        $adminRole->givePermissionTo($registerPermission);

        $adminUser->assignRole($adminRole);
    }
}
