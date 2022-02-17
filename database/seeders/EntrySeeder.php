<?php

namespace Database\Seeders;

use App\Models\Entry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entry = [];

        for ($i = 1; $i <= 30; $i++) {
            $data = [
                'judul' => 'Lorem ' . $i,
                'slug' => Str::slug('Lorem ' . $i, '-'),
                'isi_entry' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic porro accusamus id nobis, tenetur facilis? Suscipit dolorum accusamus id voluptate asperiores inventore tempore aperiam, rerum in! Iure corrupti nulla quasi culpa deleniti atque ut architecto sint voluptate vero, placeat odio unde mollitia perferendis delectus. Rem, impedit similique! Molestiae tempora mollitia quam, corporis excepturi quisquam harum ipsum voluptates repellat in asperiores adipisci illo eligendi laboriosam ducimus quo sed nulla eum facilis placeat quae! Esse nostrum non quia voluptate voluptates! Fugit, ipsum, sint expedita rem quasi porro amet non exercitationem maxime dignissimos id inventore iusto quia vel, iste a cupiditate quaerat ad?',
                'img' => '6VRXaGNaiTDrFKEsuzbYhobmaZzODMgt55pZRQrV.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
            array_push($entry, $data);
        }

        Entry::insert($entry);
    }
}
