<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryPlatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
    Schema::create('category_plat', function (Blueprint $table) {
        $table->id();
        $table->timestamps();
        $table->unsignedBigInteger('category_id');
        $table->foreign('category_id')
            ->references('id')
            ->on('categories');
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
        Schema::dropIfExists('category_plat');
    }
}
