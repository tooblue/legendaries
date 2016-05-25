<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Book;

class BookController extends Controller
{
    protected $book;

    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    public function index()
    {
        return response()->json( $this->book::all() );
    }

    public function show($id)
    {
        return response()->json( $this->book::find($id) );
    }

}
