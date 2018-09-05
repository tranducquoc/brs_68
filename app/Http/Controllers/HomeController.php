<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('title', 'asc')->get();

        return view('home', compact('books'));
    }

    public function searchBook(Request $request)
    {
        $request = \Request::get('search');

        if ($request) {
            $books = Book::where('title','like','%'.$request.'%')->orderBy('title')->paginate(config('setting.paginate'));
        } else {
            $books = Book::get();
        }

        return view('home', compact('books'));
    }
}
