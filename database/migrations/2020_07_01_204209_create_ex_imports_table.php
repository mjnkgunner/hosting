<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExImportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ex_imports', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_material');
            $table->string('unit');
            $table->double('unit_price');
            $table->double('quantity')->default(0.00);
            $table->boolean('role')->default(0);
            $table->datetime('expire');
            $table->integer('id_user')->nullable();
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
        Schema::dropIfExists('ex_imports');
    }
}
