<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('department')->insert(
        [
          [
            'name' => 'IT',
            'email' => 'it@aymakan.com.sa',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'name' => 'Operations',
            'email' => 'ops@aymakan.com.sa',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'name' => 'Sales',
            'email' => 'sales@aymakan.com.sa',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'name' => 'CX',
            'email' => 'cx@aymakan.com.sa',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'name' => 'CS',
            'email' => 'cs@aymakan.com.sa',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
          ],
        ]);
    }
}
