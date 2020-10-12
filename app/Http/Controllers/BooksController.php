<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use RakutenRws_Client;

class BooksController extends Controller
{
    public function create(Request $request)
    {
        $books = [];

        $client = new RakutenRws_Client();

        define("RAKUTEN_APPLICATION_ID"     , config('app.rakuten_id'));
        define("RAKUTEN_APPLICATION_SEACRET", config('app.rakuten_key'));

        $client->setApplicationId(RAKUTEN_APPLICATION_ID);
        \Debugbar::info($client);

        $keyword = $request->input('keyword');
        
        $hits = 30;

        if(!empty($keyword)){ 
        $response = $client->execute('BooksBookSearch', array(
            'title' => $keyword,
            'hits' => $hits,
        ));
        if ($response->isOk()) {
            
        foreach ($response as $item){
            $book = array(
                'title' => $item['title'],
                'author' => $item['author'],
                'itemUrl' => $item['itemUrl'],
                'image_url' => $item['mediumImageUrl'],
            );
            array_push($books, $book);
        }
        } else {
            echo 'Error:'.$response->getMessage();
          }
        }
        \Debugbar::info($books);
        return view('books.create', compact('books'));


    }
}