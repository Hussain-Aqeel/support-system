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
      DB::table('departments')->insert(
        [
        'name' => 'IT',
        'email' => 'it@aymakan.com.sa',
        'status' => 1,
        ]);
      DB::table('departments')->insert([
        'name' => 'Operations',
        'email' => 'ops@aymakan.com.sa',
        'status' => 1,
      ]);
      DB::table('departments')->insert([
        'name' => 'Sales',
        'email' => 'sales@aymakan.com.sa',
        'status' => 1,
      ]);
      DB::table('departments')->insert( [
        'name' => 'CX',
        'email' => 'cx@aymakan.com.sa',
        'status' => 1,
      ]);
      DB::table('departments')->insert([
        'name' => 'CS',
        'email' => 'cs@aymakan.com.sa',
        'status' => 1,
      ]);
    }
}
