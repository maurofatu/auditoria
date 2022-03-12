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
        Schema::create('fact_potential_voters', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->engine = 'InnoDB';
            
            $table->id();
            $table->foreignId('fk_dim_cities')
                ->references('id')->on('dim_cities')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId('fk_dim_locations')
                ->references('id')->on('dim_locations')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->string('ip');
            $table->integer('amount');
            $table->foreignId('fk_users')
                ->references('id')->on('users')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->unique(['fk_dim_cities', 'fk_dim_locations'], 'fact_potential_voters_uq');

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
        Schema::dropIfExists('fact_potential_voters');
    }
};
