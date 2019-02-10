<?php

use Illuminate\Database\Seeder;

class User_CampaignTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_campaign')->insert(
            [
                'user_id' => 1,
                'campaign_id' => 1
            ]
        
        );
    }
}
