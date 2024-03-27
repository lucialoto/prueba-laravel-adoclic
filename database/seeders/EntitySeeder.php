<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Entity;
use Illuminate\Support\Facades\Http;

class EntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $response = Http::get('https://api.publicapis.org/entries');
        $response = $response->json();
        $animals = array_filter(
            $response['entries'],
            function ($entry) {
                return $entry['Category'] === 'Animals';
            }
        );
        $security = array_filter(
            $response['entries'],
            function ($entry) {
                return $entry['Category'] === 'Security';
            }
        );
        $aux = null;
        $category = Category::where('category', '=', 'Animals')->first();
        foreach ($animals as $key => $entry) {
            $aux = [
                'api' => $entry['API'],
                'description' => $entry['Description'],
                'link' => $entry['Link'],
                'category_id' => $category->id
            ];
            $entity = Entity::create($aux);
        }
        $category = Category::where('category', '=', 'Security')->first();
        foreach ($animals as $key => $entry) {
            $aux = [
                'api' => $entry['API'],
                'description' => $entry['Description'],
                'link' => $entry['Link'],
                'category_id' => $category->id
            ];
            $entity = Entity::create($aux);
        }
    }
}
