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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('category' , ['ceramica' , 'escritura' , 'acuarela' , 'cocina' , 'fotografia' , 'cosmetica']);
            $table->unsignedBigInteger('location_id');
            $table->integer('price');
            $table->text('image');
            $table->enum('format' , ['presencial' , 'online' , 'hibrido']);
            $table->text('description');
            $table->string('company');
            $table->timestamps();
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
