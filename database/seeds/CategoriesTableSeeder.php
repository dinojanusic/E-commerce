<?php
use DB;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categories')->insert([
          'name' => 'Laptopi',
          'slug' => 'laptops',
      ]);
      DB::table('categories')->insert([
            'name' => 'Televizori',
            'slug' => 'tv',
        ]);
      DB::table('categories')->insert([
                    'name' => 'Video Igre',
                    'slug' => 'video-games',
        ]);
    }
  }
