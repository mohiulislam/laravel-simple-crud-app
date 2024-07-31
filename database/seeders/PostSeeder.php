<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Log::info('Starting PostSeeder');

        $numberOfPosts = 10;

        for ($i = 0; $i < $numberOfPosts; $i++) {
            try {
                Post::factory()->create();
            } catch (\Exception $e) {
                Log::error("Failed to create post {$i}: " . $e->getMessage());
            }
        }

        Log::info('Finished PostSeeder');
    }
}
