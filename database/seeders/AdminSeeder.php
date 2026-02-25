<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // إنشاء دور admin إذا لم يكن موجود
        $adminRole = Role::firstOrCreate(
            ['role_name' => 'admin']
        );

        // إنشاء حساب الأدمن إذا لم يكن موجود
        User::firstOrCreate(
            ['email' => 'admin@library.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('12345678'),
                'role_id' => $adminRole->id,
            ]
        );
    }
}
