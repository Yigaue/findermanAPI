<?php

use App\People;
use Illuminate\Database\Seeder;

class personTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(People::class, 50)->create();
    }
}
