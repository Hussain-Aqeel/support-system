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
    public function up() {
        Schema::create('assigned_tos', function (Blueprint $table) {
          $table->id();
          $table->foreignId('ticket_id')->unsigned()->constrained();
          $table->foreignId('user_id')->unsigned()->constrained();
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('assigned_tos');
    }
};
