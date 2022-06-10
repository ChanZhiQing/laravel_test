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
        Schema::create('purchase_transactions', function (Blueprint $table) { 
            $table->bigIncrements('id');
            $table->decimal('total_spent', 10, 2);
            $table->decimal('total_saving', 10, 2); 
            $table->timestamp('transaction_at');   
            $table->unsignedInteger('customer_id'); 
          //  $table->foreign('customer_id')->references('id')->on('customers')->onUpdate('cascade');; 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_transactions');
    }
};
