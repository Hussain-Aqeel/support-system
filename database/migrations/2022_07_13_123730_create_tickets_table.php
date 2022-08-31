<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        if (Schema::hasTable('tickets')) {
            return;
        }
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->uuid('key')->nullable();
            $table->bigInteger('user_id')->nullable()->unsigned()->index();
//      $table->unsignedBigInteger('ticket_id');
//      $table->foreign('ticket_id')
//        ->references('id')
//        ->on('ticket_types');

            $table->foreignId('ticket_type_id')
        ->unsigned()
        ->constrained();
            $table->string('title', 255);
            $table->text('description');
            $table->string('status')->default('pending');
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
