<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $admin = Admin::factory()->create([
            'first_name' => 'ادریس',
            'last_name' => 'رنجبر',
            'username' => 'edris',
            'mobile' => '09380342995',
            'password' => '11100077',
            'is_superuser' => true
        ]);
    }
}
