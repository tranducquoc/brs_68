<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requestbook;
use App\Http\Requests\BookRequest;
use Session;
use Exception;

class RequestbookController extends Controller
{

    public function index()
    {
        $requests = Requestbook::orderBy('title', 'asc')->get();

        return view('request.index', compact('requests'));
    }

    public function create()
    {
        return view('request.create');
    }

    public function store(BookRequest $request)
    {
        try{

            $requestBook = new Requestbook();

            $requestBook->title = $request['title'];
            $requestBook->author = $request['author'];
            $requestBook->description = $request['description'];
            $requestBook->user_id = $request['user_id'];

            $requestBook->save();

        }catch(Exception $e) {
            Session::flash('fail', trans('comment.fail'));
        }

        return redirect()->route('requests.store');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        try{

            $requestBook = Requestbook::where('user_id', auth()->user()->id)
                        ->where('id', $id)
                        ->first();
        }catch(Exception $e) {
            Session::flash('fail', trans('comment.fail'));
        }

        return view('request.edit', compact('requestBook', 'id'));
    }

    public function update(BookRequest $request, $id)
    {
        $request_id = Requestbook::where('id', $id)->first();

        try {

            $request_id->user_id = auth()->user()->id;
            $request_id->title = $request['title'];
            $request_id->author = $request['author'];
            $request_id->description = $request['description'];
            $request_id->save();

            Session::flash('success', trans('comment.success'));
        } catch(Exception $e) {
            Session::flash('fail', trans('comment.fail'));
        }

        return redirect()->route('requests.index');
    }

    public function destroy($id)
    {
        $requestBook = Requestbook::where('id', $id)->first();

        $requestBook->delete();
        return redirect()->route('requests.index');
    }
}
