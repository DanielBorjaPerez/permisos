<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function showBook($id)
    {
        $book = Book::find($id);

        if ($book == null) {
            return view('404');
        }

        return view('show', compact('book'));
    }

    public function createBook()
    {
        return view('create');
    }

    public function addBook(Request $request){

        $name = $request->name;
        $slug = $request-> slug;
        $description = $request->description;
        $author = $request-> author;
        $price = $request->price;


        if (empty($name) or empty($slug) or empty($description) or empty($author) or empty($price)) {

            return redirect()->route('create')->withErrors([
                'name' => 'all fields are required'
            ]);

        }else{

            Book::create([
                'name' => $name,
                'slug' => $slug,
                'description' =>$description,
                'author' => $author,
                'price' =>$price,
            ]);
    
            return redirect()->route('home');
        }
    }

    public function deleteBook(Book $book){

        $book->delete();

        return redirect()->route('home');

    }

    public function editBook(Book $book){

        return view('edit', compact('book'));

    }

    public function modifyBook(Request $request, $id){

        $book = Book::findOrFail($id);

        $book->name = $request['name'];
        $book->slug = $request['slug'];
        $book->description = $request['description'];
        $book->author = $request['author'];
        $book->price = $request['price'];
        $book->save();

        return redirect()->route('home');

    }
}
