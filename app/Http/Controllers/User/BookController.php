<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Clinic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    //
    public function create($id)
    {
        $clinic = Clinic::find($id);
        return view('user.book.create')->with(['clinic' => $clinic]);
    }
    public function index()
    {

        $user_id = Auth::user()->id;
        $books = Book::where('user_id', $user_id)->get();

        return view('user.book.index')->with(['books' => $books]);
    }
    public function show($id)
    {
        $book = Book::find($id);
        $clinic_id = $book->clinic_id;
        $clinic = Clinic::find($id);
        return view('user.book.create')->with(['clinic' => $clinic, 'book' => $book]);
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $clinic_id = $request->clinic_id;
        $user_id = $request->user_id;
        Book::create($data);

        return redirect(route('book.index'));
    }

    public function update(Request $request, $id)
    {


        $data = $request->only(['user_id', 'clinic_id', 'day', 'time1', 'time2', 'state']);
        $clinic_id = $request->clinic_id;
        Book::where('id', $id)->update($data);
        return  redirect(route('book.index', $clinic_id));
    }

    public function delete($id)
    {
        $book = Book::find($id);
        $clinic_id = $book->clinic_id;
        $book->delete();
        return redirect(route('book.index'));
    }
}
