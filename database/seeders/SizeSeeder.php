<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Size::create([
            'name' => '3XL',
        ]);
        Size::create([
            'name' => '2XL',
        ]);
        Size::create([
            'name' => 'XL',
        ]);
        Size::create([
            'name' => 'L',
        ]); Size::create([
            'name' => 'M',
        ]);
        Size::create([
            'name' => 'S',
        ]);
        Size::create([
            'name' => 'XS',
        ]);

    }
}
