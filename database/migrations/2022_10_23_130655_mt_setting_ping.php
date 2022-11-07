<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mt_setting_pings', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('ping_count');
            $table->integer('ping_interval');
            $table->integer('ping_packet_size');
            $table->integer('ping_timeout');
            $table->integer('time_ttl');
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('created_by');
            $table->timestamps();
            $table->unsignedBigInteger('updated_by');
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
        Schema::dropIfExists('mt_setting_pings');
    }
};
