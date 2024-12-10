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
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            //address,postal code,cover start date, property type, bedrooms(number), bathrooms(number), property value, contents value, building value, build date,flooded(boolean), subsidence(boolean), listed(boolean), business(boolean), claims(number), previous insurer, policy start date, policy end date, policy type,
            $table->string('address');
            $table->string('postal_code');
            $table->date('cover_start_date');
            $table->string('property_type');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->decimal('property_value', 10, 2);
            $table->decimal('contents_value', 10, 2);
            $table->decimal('building_value', 10, 2);
            $table->date('build_date');
            $table->boolean('flooded');
            $table->boolean('subsidence');
            $table->boolean('listed');
            $table->boolean('business');
            $table->integer('claims');
            $table->string('previous_insurer');
            $table->date('policy_start_date');
            $table->date('policy_end_date');
            $table->string('policy_type');
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
        Schema::dropIfExists('quotes');
    }
}
