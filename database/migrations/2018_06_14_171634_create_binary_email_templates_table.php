<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBinaryEmailTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binary_email_templates', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique()->index();
            $table->string('name')->default('Default Name');
            $table->string('subject')->nullable();
            $table->integer('user_id')->unsigned()->default(1);
            $table->integer('channel_id')->unsigned()->nullable();
            $table->string('parent_template')->nullable();
            $table->longtext('content')->nullable();
            $table->string('markdown')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('binary_email_templates');
    }
}
