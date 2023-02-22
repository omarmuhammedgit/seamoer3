<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('contact_type');
            $table->string('contactId');
            $table->string('sobriquet')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('datebirth')->nullable();
            $table->string('allotted')->nullable();
            $table->string('activisms')->nullable();
            $table->string('phone');
            $table->string('facilitynumber')->nullable();
            $table->string('email')->nullable();
            $table->string('tax_number')->nullable();
            $table->string('initial_balance')->nullable();
            $table->string('payment_period')->nullable();
            $table->string('city');
            $table->string('country');
            $table->string('postal_code');
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
        Schema::dropIfExists('suppliers');
    }
}
