<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBinarySubsListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binary_subs_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('Default List');
            $table->uuid('uuid')->unique();
            $table->integer('user_id')->unsigned();
            $table->integer('binary_brand_id')->unsigned();
            $table->softDeletes();
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
        Schema::dropIfExists('binary_subs_lists');
    }
}
