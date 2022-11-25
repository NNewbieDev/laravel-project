<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrRSS = [
            "item" => [
                "name" => "Tin mới",
                "link" => 'https://vnexpress.net/rss/tin-moi-nhat.rss'
            ], "item" => [
                "name" => "Khoa học",
                "link" => 'https://vnexpress.net/rss/khoa-hoc.rss'
            ], "item" => [
                "name" => "Sức khỏe",
                "link" => 'https://vnexpress.net/rss/suc-khoe.rss'
            ], "item" => [
                "name" => "Giải trí",
                "link" => 'https://vnexpress.net/rss/giai-tri.rss'
            ], "item" => [
                "name" => "Kinh doanh",
                "link" => 'https://vnexpress.net/rss/kinh-doanh.rss'
            ], "item" => [
                "name" => "Du lịch",
                "link" => 'https://vnexpress.net/rss/du-lich.rss'
            ]
        ];

        foreach ($arrRSS as $item) {
        }
    }
}
