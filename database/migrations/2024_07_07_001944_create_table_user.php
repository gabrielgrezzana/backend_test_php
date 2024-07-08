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
        Schema::create('usuario', function (Blueprint $table) {
            $table->integer('id_user')->unsigned()->autoIncrement();
            $table->string('nome', 300);
            $table->string('cpf', 11)->unique();
            $table->string('email', 100)->unique();
            $table->string('senha', 300);
            $table->datetime('dt_cadastro');
            $table->datetime('dt_alteracao');
            $table->unique(['cpf', 'email']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
};
