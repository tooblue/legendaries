<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use App\Hero;
use App\Book;

use Auth;

class UserHeroController extends Controller
{
    protected $heroes;
    protected $users;

    public function __construct(Hero $heroes, User $users)
    {
        $this->heroes = $heroes;
        $this->users = $users;
    }

    public function index($user)
    {
        return response()->json( $this->users::find($user)->heroes()->with('book','tags')->get() );
    }

    public function store(Request $request, $user)
    {
        if ( $user == Auth::user()->id ) {
            $user = User::find($user);
            $book = Book::find($request->book_id);

            $hero = new Hero;
            $hero->grade = $book->grade;
            $hero->atk = $book->atk;
            $hero->def = $book->def;
            $hero->hp = $book->hp;
            $hero->spd = $book->spd;
            $hero->user()->associate($user);
            $hero->book()->associate($book);
            $hero->save();

            return response()->json( $this->heroes::with('book','tags')->find($hero->id) );
        }
        else {
            abort(403);
        }
    }
}
