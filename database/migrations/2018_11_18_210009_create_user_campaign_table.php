<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCampaignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_campaign', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('campaign_id')->unsigned()->nullable();
            
            $table->foreign('user_id')->references('id')
                ->on('users')->onDelete('cascade');
            $table->foreign('campaign_id')->references('id')
                ->on('campaigns')->onDelete('cascade');
    
            $table->timestamps();
        });

       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_campaign');
    }
}
