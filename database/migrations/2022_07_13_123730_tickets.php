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
    if(Schema::hasTable('tickets')) return;
    Schema::create('tickets', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('user_id')->nullable()->unsigned()->index();
      $table->string('title', 255);
      $table->string('description', 4028);
      $table->timestamps();
    });
  }
  
  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down() {
    Schema::dropIfExists('tickets');
  }
};
