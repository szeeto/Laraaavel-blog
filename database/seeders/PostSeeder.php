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
           'Indonesia Merdeka',
           'internet di Indonesia',
           'Perkembangan Teknologi Informasi',
           'Kebudayaan Indonesia',
           'Pendidikan di Era Digital',
           'Ekonomi Digital di Indonesia',
           'Perubahan Iklim dan Dampaknya',
           'Kesehatan Masyarakat',
           'Transportasi Modern',
           'Pariwisata Indonesia',
           'Pertanian Berkelanjutan',
           'Inovasi Teknologi',
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
                'description'=> "Deskripsi $j",
                'content' => "Konten $j",
                'user_id' => 1,
                'status'=> 'published',
            ]);
        }
    }
}
