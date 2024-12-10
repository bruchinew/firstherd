<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quote_prices', function (Blueprint $table) {
            $table->id('price_id');  // Auto-incrementing primary key
            $table->string('factor_type', 255);  // Factor type
            $table->decimal('multiplication_amount', 5, 2);  // Multiplication amount
            $table->timestamp('created_at'); // Created at timestamp
            $table->timestamp('updated_at'); // Updated at timestamp
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quote_prices');
    }
}
