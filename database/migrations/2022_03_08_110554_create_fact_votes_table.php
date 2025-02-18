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
        Schema::create('fact_votes', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->engine = 'InnoDB';
            
            $table->id();
            $table->foreignId('fk_fact_polling_stations')
                ->references('id')->on('fact_polling_stations')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId('fk_fact_candidates')
                ->references('id')->on('fact_candidates')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->string('ip');
            $table->integer('amount');
            $table->foreignId('fk_users')
                ->references('id')->on('users')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId('fk_dim_elections')
                ->references('id')->on('dim_elections')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->unique(['fk_fact_polling_stations', 'fk_fact_candidates', 'fk_dim_elections'], 'fact_votes_uq');

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
        Schema::dropIfExists('fact_votes');
    }
};
