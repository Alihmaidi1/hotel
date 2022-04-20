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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("type_id");
            $table->foreign("type_id")->references("id")->on("types");
            $table->string("number");
            $table->string("capacity");
            $table->integer("price");
            $table->text("view");
            $table->unsignedBigInteger("room_status_id");
            $table->foreign("room_status_id")->references("id")->on("room_statuses");
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
        Schema::dropIfExists('rooms');
    }
};
