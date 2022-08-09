<?php
  
  namespace Database\Seeders;
  
  use Illuminate\Database\Console\Seeds\WithoutModelEvents;
  use Illuminate\Database\Seeder;
  use Illuminate\Support\Facades\DB;
  
  class TypesSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('ticket_types')->insert(
        [
          [
            'department_id' => 1,
            'title' => 'IT',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'department_id' => 2,
            'title' => 'Operations',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'department_id' => 5,
            'title' => 'Customer support',
            'status' => 0,
            'created_at' => now(),
            'updated_at' => now(),
          ],
          [
            'department_id' => 3,
            'title' => 'Sales',
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
          ],
        ]);
    }
  }