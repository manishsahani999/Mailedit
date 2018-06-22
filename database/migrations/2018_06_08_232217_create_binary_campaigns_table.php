<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBinaryCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binary_campaigns', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique()->index();
            $table->string('name');
            $table->text('subject')->nullable();
            $table->integer('binary_brand_id')->unsigned();
            $table->string('from_name')->nullable();
            $table->string('from_email')->nullable();
            $table->string('reply_to')->nullable();
            $table->string('description')->default('Default Description');
            $table->longText('html')->nullable();
            $table->longText('text')->nullable();
            $table->text('data')->nullable();
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->bigInteger('recipients_count')->default(0);
            $table->bigInteger('sent_count')->default(0);
            $table->bigInteger('sending_count')->default(0);
            $table->bigInteger('error_count')->default(0);
            $table->string('allowed_files')->nullable();
            $table->string('brand_logo')->nullable();
            $table->enum('status', ['draft', 'sent', 'scheduled', 'cancelled', 'sending']);
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
        Schema::dropIfExists('binary_campaigns');
    }
}
