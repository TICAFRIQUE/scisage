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
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->text('libelle')->nullable();
            $table->text('slug')->nullable();
            $table->string('categorie')->nullable();
            $table->string('type')->nullable(); // ex: villa, appartement, bureau, etc.
            $table->string('localisation')->nullable();
            $table->longText('caracteristique')->nullable(); // ex: 3 chambres, 2 salles de bain, etc.
            $table->double('prix')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolios');
    }
};
