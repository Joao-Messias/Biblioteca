<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable(false);
            $table->string('email', 100)->nullable(false);
            $table->string('phone', 20)->nullable(false);
            $table->string('address', 100)->nullable(false);
            $table->string('city', 100)->nullable(false);
            $table->string('state', 2)->nullable(false);
            $table->string('zipcode', 9)->nullable(false);
            $table->string('country', 100)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
