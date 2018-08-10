<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Models\Book;
use App\Models\Comment;
use Session;
use Exception;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        $content = $request->content;
        $book_id = $request ->book_id;
        $user = \Auth::user();

        try {

            $comment = new Comment();
            $comment->content = $content;
            $comment->book_id = $book_id;
            $user->comments()->save($comment);

            Session::flash('success', trans('comment.success'));
        } catch(Exception $e) {
            Session::flash('fail', trans('comment.fail'));
        }

        return redirect()->route('books.show', $book_id);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {

        $comment = Comment::where('id', $id)->firstOrFail();

        $comment->save();
        return redirect()->route('books.show', $book_id);
    }


    public function destroy($id)
    {
        //
    }
}
