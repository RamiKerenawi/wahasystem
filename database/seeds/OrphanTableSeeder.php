<?php

use Illuminate\Database\Seeder;

class OrphanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		
        DB::table('orphans')->insert([
            'breadwinner_id' => rand(1,20),
            'first_name	' => str_random(10),
            'father_name' => str_random(10),
			'grandfather_name'=>str_random(10),
			'family_name'	=>str_random(10),
			
			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
			
        ]);		
    }
}
