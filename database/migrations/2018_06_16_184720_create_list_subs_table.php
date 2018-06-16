<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateListSubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_subs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('list_id')->unsigned();
            $table->integer('subscriber_id')->unsigned();            
            $table->foreign('list_id')->references('id')->on('binary_subs_lists')->onDelete('cascade');
            $table->foreign('subscriber_id')->references('id')->on('binary_subscribers')->onDelete('cascade');
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
        Schema::dropIfExists('list_subs');
    }
}
