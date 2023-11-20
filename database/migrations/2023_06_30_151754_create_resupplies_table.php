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
        Schema::create('resupplies', function (Blueprint $table) {
            $table->id();
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->unsignedBigInteger('supplier_id');
            
            $table->foreign('material_id')->references('id')->on('materials')->onDelete('cascade');
            $table->unsignedBigInteger('material_id');
            $table->integer('resupply_qty');
            $table->date('resupply_date_finished');
            $table->varchar('resupply_status');
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
        Schema::dropIfExists('resupplies');
    }
};
