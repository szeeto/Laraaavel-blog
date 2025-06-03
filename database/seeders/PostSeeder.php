<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $judul = [
            'indonesia tanah airku',
            'tanah tumpah darahku',
            'disanalah aku berdiri',
            'jadi pandu ibuku',
            'indonesia kebangsaanku',
            'indonesia kebangsaanku',
        ];

        foreach ($judul as $j) {
            $slug = Str::slug($j);
            $slugori = $slug;
            $cout = 1;
            while (Post::where('slug', $slug)->exists()) {
                $slug = $slugori . "-" . $cout;
                $cout++;
            }
            Post::create([
                'title'=> $j,
                'slug' => $slug,
                'description'=> "Deskripsi untuk $j",
                'content' => "Konten untuk $j",
                'user_id' => 1,
                'status'=> 'published',
            ]);
        }
    }
}
