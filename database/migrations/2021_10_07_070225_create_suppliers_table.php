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
            $table->string('name');
            $table->string("image", 2048)->nullable();
            $table->string('company_name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city');
            $table->string('address');
            $table->string('postal_code')->nullable();
            $table->tinyInteger('status')->default(0)->comment("status 1 = published, 0 = unpublished");
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
