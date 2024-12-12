<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id('quote_id');  // Auto-incrementing primary key
            $table->string('visitor_id', 255);  // Unique visitor ID for anonymous users
            $table->string('name', 255)->nullable();  // Name of the person requesting the quote
            $table->string('email', 255)->nullable();  // Email address for sending the quote
            $table->string('phone', 20)->nullable();  // Phone number
            $table->string('address', 255);  // Property address
            $table->decimal('property_value', 10, 2);  // The value of the property
            $table->decimal('coverage_amount', 10, 2);  // Desired coverage amount
            $table->enum('property_type', ['detached', 'semi-detached', 'apartment', 'bungalow']);  // Type of property
            $table->integer('number_of_claims')->default(0);  // Number of claims
            $table->integer('build_year')->nullable();  // Year the property was built
            $table->string('location', 255)->nullable();  // Location of the property
            $table->timestamp('quote_date');  // Date the quote was generated
            $table->decimal('quote_amount', 10, 2)->nullable();  // The final calculated quote
            $table->enum('status', ['pending', 'sent', 'expired'])->default('pending');  // Status of the quote
            $table->decimal('coverage_factor', 5, 2)->nullable();  // Coverage factor
            $table->decimal('location_factor', 5, 2)->nullable();  // Location factor
            $table->decimal('claims_factor', 5, 2)->nullable();  // Claims history factor
            $table->decimal('age_factor', 5, 2)->nullable();  // Age factor
            $table->unsignedBigInteger('quote_price_id')->nullable();  // Foreign key to quote_prices table
            $table->foreign('quote_price_id')->references('price_id')->on('quote_prices')->onDelete('set null');  // Foreign key constraint
            $table->timestamps();  // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quotes');
    }
}
