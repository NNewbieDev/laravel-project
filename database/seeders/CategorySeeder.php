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
                              [
                                        "name" => "Tin mới",
                                        "link" => 'https://vnexpress.net/rss/tin-moi-nhat.rss'
                              ],  [
                                        "name" => "Khoa học",
                                        "link" => 'https://vnexpress.net/rss/khoa-hoc.rss'
                              ],  [
                                        "name" => "Sức khỏe",
                                        "link" => 'https://vnexpress.net/rss/suc-khoe.rss'
                              ],  [
                                        "name" => "Giải trí",
                                        "link" => 'https://vnexpress.net/rss/giai-tri.rss'
                              ],  [
                                        "name" => "Kinh doanh",
                                        "link" => 'https://vnexpress.net/rss/kinh-doanh.rss'
                              ],  [
                                        "name" => "Du lịch",
                                        "link" => 'https://vnexpress.net/rss/du-lich.rss'
                              ]
                    ];
                    foreach ($arrRSS as $items => $item) {
                              $category = new Category;
                              if (Category::where('name', "LIKE", $item['name'])->exists()) {
                                        continue;
                              } else {
                                        $category->name = $item['name'];
                                        $category->link = $item['link'];
                              }
                              $category->save();
                    }
          }
}
