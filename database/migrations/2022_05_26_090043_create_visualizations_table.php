<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisualizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visualizations', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');

            $table->unsignedBigInteger('house_id');
            $table->foreign('house_id')
            ->references('id')
            ->on('houses')
            ->onDelete('cascade');

            $table->ipAddress('ip');
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
        Schema::dropIfExists('visualizations');
    }
}
