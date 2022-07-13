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
      if(Schema::hasTable('departments')) return;
      Schema::create('departments', function (Blueprint $table) {
        $table->string('id')->primary();
        $table->string('name', 255);
        $table->string('email', 255)->unique();
        $table->boolean('status');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
      Schema::dropIfExists('departments');
    }
};
