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
        Schema::create('fact_news', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->engine = 'InnoDB';
            
            $table->id();
            $table->foreignId('fk_fact_polling_stations')
                ->references('id')->on('fact_polling_stations')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->string('ip');
            $table->text('description_event');
            $table->text('management_description')->nullable();
            $table->enum('status', ['S', 'G', 'D'])->default('S');; //S (sin gestionar), G (Gestionada), D(Direccionado)
            $table->foreignId('fk_users')
                ->references('id')->on('users')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

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
        Schema::dropIfExists('fact_news');
    }
};
