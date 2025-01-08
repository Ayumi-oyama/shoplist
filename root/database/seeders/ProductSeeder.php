<?php

namespace Database\Seeders;

use App\Models\product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 開発環境のみ100レコードを追加する。
        if (app()->isLocal()) {
            // \App\Models\Job
            product::factory()
                ->count(100) // 100レコード追加
                ->sequence(function ($sequence) {
                    // 追加レコード定義
                    return [
                        'name' => sprintf('product_%04d', $sequence->index + 1),
                        'deleted_at' => null,
                        'created_at' => '2022-12-30 11:22:33',
                        'updated_at' => '2022-12-31 23:58:59',
                    ];
                })
                ->create();
        }
    }
}
