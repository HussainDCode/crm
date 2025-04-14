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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->default('G.R Foam & Mattress House');
            $table->string('company_email')->default('grfoamhouse@gmail.com');
            $table->string('company_phone')->default('+92 300 6112383');
            $table->string('company_address')->default('Old Zafarwall Road, Chawinda');
            $table->string('company_city')->default('Chawinda, Sialkot');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
