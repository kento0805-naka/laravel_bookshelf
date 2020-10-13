<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Book;
use App\User;
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

        if (!empty($keyword)){ 
        $response = $client->execute('BooksBookSearch', array(
            'title' => $keyword,
            'hits' => $hits,
        ));
        if ($response->isOk()) {
            
        foreach ($response as $item){
            $book = array(
                'title' => $item['title'],
                'author' => $item['author'],
                'item_url' => $item['itemUrl'],
                'image_url' => $item['mediumImageUrl'],
                'itemCaption' => $item['itemCaption'],
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

    public function store(Request $request, Book $book)
    {
        $book->title = $request->title;
        $book->author = $request->author;
        $book->image_url = $request->image_url;
        $book->item_url = $request->item_url;

        $find_book = Book::where('image_url', $book->image_url)->exists();

        //booksテーブルに本が登録されているかどうか確認
        if ($find_book){
            //データベースから本を取得
            $registered_book = Book::where('image_url', $request->image_url)->first();
            //current_userが本を登録
            $user = Auth::user();
            $user->books()->attach($registered_book);
            return redirect('/');
        } else {
            //本をデータベースに保存
            $book->save();
            //userが本を登録
            $user = Auth::user();
            $user->books()->attach($book);
            return redirect('/');
        }
        

        // $book->save();
        
    }
}