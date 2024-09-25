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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');  // Référence au post
            $table->unsignedBigInteger('user_id');  // Référence à l'auteur du commentaire
            $table->text('body');                   // Contenu du commentaire
            $table->boolean('is_approved')->default(false); // Statut d'approbation
            $table->timestamps();                   // Champs created_at et updated_at

            // Clés étrangères
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
