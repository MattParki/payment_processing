<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePizzaTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pizza_tables', function (Blueprint $table) {
            $table->id();
            $table->string('thin');
            $table->string('thick');
            $table->string('pepperoni');
            $table->string('basil');
            $table->string('black_olives');
            $table->string('oregano');
            $table->string('tomatoes');
            $table->string('mozzarella');
            $table->string('feta_cheese');
            $table->string('cheddar');
            $table->string('provolone');
            $table->string('olive_oil');
            $table->string('spicy_oil');
            $table->string('red_onion');
            $table->string('size');
            $table->string('crust');
            $table->string('oil');
            $table->string('dough');
            $table->string('server_name');
            $table->string('your_name');
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
        Schema::dropIfExists('pizza_tables');
    }
}
