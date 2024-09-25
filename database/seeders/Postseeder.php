<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Postseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::transaction(function () {
            Post::factory(30000)->create(); // Génère 1 million de posts
        });
    }
}
