<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\blog;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 開発環境のみ100レコードを追加する。
        if(app()->isLocal()){
            blog::factory()
            ->count(50)
            ->sequence(function($sequence){
                return[
                    'title'=>sprintf('blog_title%04d',$sequence->index + 1),
                    'body'=>sprintf('blog_body%04d',$sequence->index + 1),
                    'deleted_at'=> null,
                    'created_at' => '2022-12-30 11:22:33',
                    'updated_at' => '2022-12-31 23:58:59',
                ];
            })
            ->create();
        }
    }
}
