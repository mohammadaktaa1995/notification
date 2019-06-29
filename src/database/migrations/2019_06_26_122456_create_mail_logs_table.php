<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailLogsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('mail_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject')->nullable();
            $table->text('content')->nullable();
            $table->text('meta')->nullable();
            $table->string('notify_to')->default('email');
            $table->string('notify_by')->default('email');
            $table->unsignedInteger('fired_by');
            $table->foreign('fired_by')->references('id')->on('users')->onDelete('no action')->onUpdate('no action');
            $table->timestamp('fired_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('mail_logs');
    }
}
