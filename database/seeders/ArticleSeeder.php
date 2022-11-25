<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Vedmant\FeedReader\Facades\FeedReader;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $file = FeedReader::read();
        $result = [
            'title' => $file->get_title(),
            'description' => $file->get_description(),
            'permalink' => $file->get_permalink(),
            'link' => $file->get_link(),
            'copyright' => $file->get_copyright(),
            'language' => $file->get_language(),
            'image_url' => $file->get_image_url(),
            'author' => $file->get_author()
        ];
        foreach ($file->get_items(0, $file->get_item_quantity()) as $item) {
            $i['title'] = $item->get_title();
            $i['description'] = $item->get_description();
            $i['content'] = $item->get_content();
            $i['date'] = $item->get_date();
            $i['link'] = $item->get_link();
            $i['source'] = $item->get_source();
            $i['thumbnail'] = $item->get_thumbnail();

            $result['items'][] = $i;
        }
        $rslt = $result['items'];
        // return  Response::json([
        //     'data' => $result,
        //     'message' => 'Done',
        // ], 200);
        foreach ($rslt as $list) {
            $article = new Article;
            $article->title = $list['title'];
            $article->description = $list['description'];
            $article->link = $list['link'];
            $article->save();
        }
    }
}
