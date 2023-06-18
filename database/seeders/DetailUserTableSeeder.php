<?php

namespace Database\Seeders;

use App\Models\DetailUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DetailUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $detail_user = [
            [
                'users_id' => 1,
                'photo' => '',
                'role' => 'Admin',
                'contact_number' => '',
                'biography' => '',
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
                'users_id' => 2,
                'photo' => '',
                'role' => 'Arsitek',
                'contact_number' => '',
                'biography' => '',
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
            ],
            [
                'users_id' => 3,
                'photo' => '',
                'role' => 'Client',
                'contact_number' => '',
                'biography' => '',
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s'),
            ]
            ];

        DetailUser::insert($detail_user);
    }
}
