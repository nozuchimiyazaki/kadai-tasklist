<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i <= 10; $i++){
            DB::table('tasks')->insert([
                'content' => 'test content ' . $i,
                'status' => 'status OK'
            ]);
        }
    }
}
