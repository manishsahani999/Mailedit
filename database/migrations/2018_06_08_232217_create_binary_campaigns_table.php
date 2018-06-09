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
            $table->string('subject')->nullable();
            $table->string('from_name')->nullable();
            $table->string('from_email')->nullable();
            $table->string('reply_to')->nullable();
            $table->string('name')->default('Default Name');
            $table->string('description')->default('Default Description');
            $table->longText('html')->nullable();
            $table->longText('text')->nullable();
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->bigInteger('recipients_count')->default(0);
            $table->bigInteger('sent_count')->default(0);
            $table->bigInteger('sending_count')->default(0);
            $table->enum('status', ['draft', 'sent', 'scheduled', 'cancelled', 'sending']);
            $table->softDeletes();
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
