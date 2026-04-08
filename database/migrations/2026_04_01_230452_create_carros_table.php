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
        Schema::create('carros', function (Blueprint $table) {
            $table->id();
            $table->string('cor', 64);
            $table->string('modelo', 64);
            $table->integer('ano', );
            $table->float('motor', 64);
            $table->decimal('preco', 9, 2)->nullable();
            $table->boolean('teto_solar');
            $table->date('fabricacao');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carros');
    }
};
