<?php

use Illuminate\Database\Seeder;

class CampaignTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campaigns')->insert(
        [
            'name' => 'Thank u dear colleague 2018',
            'company_name' => 'vivify ideas'
        ]
    
    );
    }
}
