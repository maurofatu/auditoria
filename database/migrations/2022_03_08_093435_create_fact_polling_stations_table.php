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
        Schema::create('fact_polling_stations', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->engine = 'InnoDB';
            
            $table->id();
            $table->foreignId('fk_dim_cities')
                ->references('id')->on('dim_cities')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId('fk_dim_communes')->nullable()
                ->references('id')->on('dim_communes')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId('fk_dim_locations')
                ->references('id')->on('dim_locations')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId('fk_dim_tables')
                ->references('id')->on('dim_tables')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId('fk_dim_elections')
                ->references('id')->on('dim_elections')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->string('url_photo_e4');

            $table->unique(['fk_dim_cities', 'fk_dim_communes', 'fk_dim_locations', 'fk_dim_tables', 'fk_dim_elections'], 'fact_polling_stations_uq');

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
        Schema::dropIfExists('fact_polling_stations');
    }
};
