<?php

use Illuminate\Database\Seeder;

class Campaign_UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campaign_user')->insert(
            [
                'campaign_id' => 6,
                'user_id' => 1
            ]
        
        );
    }
}
