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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');                  // Titre du post
            $table->text('body');                     // Contenu du post
            $table->string('slug')->unique();         // Slug unique pour l'URL
            $table->unsignedBigInteger('user_id');    // Référence à l'auteur (clé étrangère)
            $table->string('category');               // Catégorie
            $table->string('tags')->nullable();       // Tags
            $table->boolean('is_published')->default(false); // Si le post est publié ou non
            $table->dateTime('published_at')->nullable(); // Date de publication
            $table->integer('views')->default(0);     // Nombre de vues
            $table->string('featured_image')->nullable(); // Image à la une
            $table->text('excerpt')->nullable();      // Extrait du post
            $table->unsignedInteger('reading_time')->default(1); // Temps de lecture estimé
            $table->unsignedBigInteger('likes')->default(0); // Nombre de likes
            $table->unsignedBigInteger('shares')->default(0); // Nombre de partages
            $table->json('metadata')->nullable();     // Métadonnées supplémentaires
            $table->timestamps();                    // Champs created_at et updated_at
            // Clé étrangère
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
