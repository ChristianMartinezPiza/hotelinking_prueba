<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersOfertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_ofertas', function (Blueprint $table) {      
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')
              ->references('id')
              ->on('users')->onDelete('cascade');
            $table->bigInteger('oferta_id')->unsigned();
            $table->foreign('oferta_id')
              ->references('id')
              ->on('ofertas')->onDelete('cascade');
            $table->string('codigo')->unique();
            $table->boolean('canjeado')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_ofertas');
    }
}
