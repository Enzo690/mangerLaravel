<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredables', function (Blueprint $table) {
            $table->id('ingredable_id');
            $table->timestamps();
            $table->unsignedBigInteger('ingredient_id');
            $table->foreign('ingredient_id')
                ->references('id')
                ->on('ingredients');
            $table->string('ingredable_type');
            $table->unsignedBigInteger('plat_id');
            $table->foreign('plat_id')
                ->references('id')
                ->on('plats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredient_plat');
    }
}
