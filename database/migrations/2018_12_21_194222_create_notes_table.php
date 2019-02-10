<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->text('text');
            $table->integer('from_user')->unsigned();
            $table->integer('to_user')->unsigned();
            $table->integer('campaign_id')->unsigned();

            $table->foreign('from_user')->references('id')
                ->on('users')->onDelete('cascade');
            $table->foreign('to_user')->references('id')
                ->on('users')->onDelete('cascade');
            $table->foreign('campaign_id')->references('id')
                ->on('campaigns')->onDelete('cascade');
            $table->unique(['id','from_user', 'to_user', 'campaign_id']);
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
        Schema::dropIfExists('notes');
    }
}
