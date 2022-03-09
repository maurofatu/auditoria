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
        Schema::create('user_role_permits', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->engine = 'InnoDB';

            $table->id();
            $table->foreignId('fk_roles')->nullable()
                ->references('id')->on('roles')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            $table->foreignId('fk_users')->nullable()
                ->references('id')->on('users')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('fk_aplication_tables')
                ->references('id')->on('aplication_tables')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->boolean('select')->default(false);
            $table->boolean('insert')->default(false);
            $table->boolean('update')->default(false);
            $table->boolean('delete')->default(false);

            $table->unique(['fk_roles', 'fk_users', 'fk_aplication_tables'], 'user_role_permits_uq');

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
        Schema::dropIfExists('user_role_permits');
    }
};
