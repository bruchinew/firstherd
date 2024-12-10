<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->string('visitor_id', 255)->after('quote_id');  // Unique visitor ID for anonymous users
            $table->string('name', 255)->nullable()->after('visitor_id');  // Name of the person requesting the quote
            $table->string('email', 255)->nullable()->after('name');  // Email address for sending the quote
            $table->string('phone', 20)->nullable()->after('email');  // Phone number
            $table->string('address', 255)->after('phone');  // Property address
            $table->decimal('property_value', 10, 2)->after('address');  // The value of the property
            $table->decimal('coverage_amount', 10, 2)->after('property_value');  // Desired coverage amount
            $table->enum('property_type', ['detached', 'semi-detached', 'apartment', 'bungalow'])->after('coverage_amount');  // Type of property
            $table->integer('number_of_claims')->default(0)->after('property_type');  // Number of claims
            $table->integer('build_year')->nullable()->after('number_of_claims');  // Year the property was built
            $table->string('location', 255)->nullable()->after('build_year');  // Location of the property
            $table->timestamp('quote_date')->after('location');  // Date the quote was generated
            $table->decimal('quote_amount', 10, 2)->nullable()->after('quote_date');  // The final calculated quote
            $table->enum('status', ['pending', 'sent', 'expired'])->default('pending')->after('quote_amount');  // Status of the quote
            $table->decimal('coverage_factor', 5, 2)->nullable()->after('status');  // Coverage factor
            $table->decimal('location_factor', 5, 2)->nullable()->after('coverage_factor');  // Location factor
            $table->decimal('claims_factor', 5, 2)->nullable()->after('location_factor');  // Claims history factor
            $table->decimal('age_factor', 5, 2)->nullable()->after('claims_factor');  // Age factor
            $table->unsignedBigInteger('quote_price_id')->nullable()->after('age_factor');  // Foreign key to quote_prices table
            $table->foreign('quote_price_id')->references('price_id')->on('quote_prices')->onDelete('set null');  // Foreign key constraint
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quotes', function (Blueprint $table) {
            $table->dropForeign(['quote_price_id']);
            $table->dropColumn([
                'visitor_id',
                'name',
                'email',
                'phone',
                'address',
                'property_value',
                'coverage_amount',
                'property_type',
                'number_of_claims',
                'build_year',
                'location',
                'quote_date',
                'quote_amount',
                'status',
                'coverage_factor',
                'location_factor',
                'claims_factor',
                'age_factor',
                'quote_price_id'
            ]);
        });
    }
}
