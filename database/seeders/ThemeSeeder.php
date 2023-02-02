<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Theme;

class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Theme::factory()
                ->count(3)
                ->forSection([
                    'name' => 'tenetur'
                ])
                ->forUser([
                    'name' => 'Pavel'
                ])
                ->create();
    }
}
