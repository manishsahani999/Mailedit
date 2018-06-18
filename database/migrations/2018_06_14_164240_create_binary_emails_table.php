<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBinaryEmailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binary_emails', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique()->index();
            $table->integer('binary_subscriber_id')->unsigned();
            $table->integer('binary_campaign_id')->nullable()->unsigned();
            $table->integer('binary_template_id')->nullable()->unsigned();
            $table->string('subject')->default('Default Subject');
            $table->mediumText('preheader')->nullable();
            $table->longText('content')->nullable();
            $table->string('from_name')->nullable();
            $table->string('from_email')->nullable();
            $table->string('reply_to')->nullable();
            $table->string('token');
            $table->string('ses_message_id')->nullable();
            $table->longText('meta')->nullable();
            $table->timestamp('scheduled_time')->nullable();
            $table->timestamp('sent_on')->nullable();
            $table->enum('status', ['not_sent' , 'queued' , 'sent', 'delivered', 'hard_bounced', 'soft_bounced']);
            $table->boolean('opened')->default(false);
            $table->integer('clicks')->default(0);
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
        Schema::dropIfExists('binary_emails');
    }
}
