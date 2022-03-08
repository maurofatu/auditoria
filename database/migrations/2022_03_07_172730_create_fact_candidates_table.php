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
        Schema::create('fact_candidates', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->engine = 'InnoDB';
            
            $table->id();
            
            $table->foreignId('fk_dim_political_parties')
                ->references('id')->on('dim_political_parties')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId('fk_dim_identifications')
                ->references('id')->on('dim_identifications')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId('fk_dim_people')
                ->references('id')->on('dim_people')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->unique(['fk_dim_political_parties', 'fk_dim_identifications', 'fk_dim_people'], 'fact_candidates_uq');

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
        Schema::dropIfExists('fact_candidates');
    }
};
