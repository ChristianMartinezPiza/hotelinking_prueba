<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfertasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ofertas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        DB::table('ofertas')->insert(
            array(
                'title' => 'Oferta verano hotel + vuelo 20% descuento',
            )
        );

        DB::table('ofertas')->insert(
            array(
                'title' => 'Oferta verano parque acuático gratis para niños',
            )
        );

        DB::table('ofertas')->insert(
            array(
                'title' => 'Cupón para alquilar una bicicleta durante una hora',
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ofertas');
    }
}
