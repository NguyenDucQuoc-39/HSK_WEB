<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HskLevel; // Đảm bảo có dòng này
use Illuminate\Support\Facades\DB; // Đảm bảo có dòng này

class HskLevelSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        HskLevel::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $levels = [
            ['id' => 1, 'name' => 'HSK 1'], ['id' => 2, 'name' => 'HSK 2'],
            ['id' => 3, 'name' => 'HSK 3'], ['id' => 4, 'name' => 'HSK 4'],
            ['id' => 5, 'name' => 'HSK 5'], ['id' => 6, 'name' => 'HSK 6'],
        ];

        HskLevel::insert($levels);
    }
}