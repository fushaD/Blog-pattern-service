<?php

namespace Database\Factories;

use \App\Models\User;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        // Sélectionne un utilisateur existant aléatoirement
        $userId = User::inRandomOrder()->first()->id;

        // Générer un nombre aléatoire de commentaires
        $numberOfComments = $this->faker->numberBetween(0, 20); // Par exemple, entre 0 et 20 commentaires

        return [
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraphs(3, true),
            'slug' => $this->faker->slug,
            'user_id' => $userId,
            'category' => $this->faker->word,
            'tags' => implode(',', $this->faker->words(3)),
            'is_published' => $this->faker->boolean,
            'published_at' => $this->faker->boolean ? $this->faker->dateTime : null,
            'views' => $this->faker->numberBetween(0, 10000),
            'featured_image' => $this->faker->imageUrl(640, 480, 'post'),
            'excerpt' => $this->faker->sentence,
            'reading_time' => $this->faker->numberBetween(1, 10),
            'likes' => $this->faker->numberBetween(0, 500),
            'shares' => $this->faker->numberBetween(0, 100),
            'metadata' => json_encode(['author_ip' => $this->faker->ipv4, 'source' => $this->faker->url]),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Post $post) {
            // Générer des commentaires après la création du post
            $numberOfComments = $this->faker->numberBetween(0, 20); // Nombre de commentaires aléatoire

            Comment::factory()->count($numberOfComments)->create([
                'post_id' => $post->id, // Assurez-vous que chaque commentaire est lié au post créé
            ]);
        });

    }
}
