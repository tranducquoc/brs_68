<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Comment;
use App\Models\User;

class BookController extends Controller
{

    public function show($id)
    {
        $book = Book::with('comments.user')->where('id', $id)->first();

        return view('book.show', compact('book'));
    }
}
