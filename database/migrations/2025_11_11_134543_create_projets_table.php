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
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            $table->string('etape')->nullable(); // e.g., 1 for planning, 2 for development, etc.
            $table->string('libelle')->nullable();
            $table->string('slug')->nullable();
            $table->longText('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->foreignId('activite_id')->nullable()->constrained('activites')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projets');
    }
};
