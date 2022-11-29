<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use App\Models\RentLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookRentController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=' , 1)->where('status', '!=', 'inactive')->get();
        $books = Book::all();
        return view('book-rent', ['users' => $users, 'books' => $books]);
    }

    public function store(Request $request)
    {
        $request['rent_date'] = Carbon::now()->toDateString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateString();

        $book = Book::findOrFail($request->book_id)->only('status');

        if ($book['status'] != 'in stock') {
            return redirect('book-rent')->with(['status' => 'Cannot rent, the book is not available!', 'alert' =>'alert-danger']);
        }
        else{
            $count = RentLog::where('user_id', $request->user_id)->where('actual_return_date', null)->count();
            
            if($count >= 3) {
                return redirect('book-rent')->with(['status' => 'Cannot rent, user has reached limit of book!', 'alert' =>'alert-danger']);
            }
            else {
                try {
                    DB::beginTransaction();
                    //process insert to rent_logs table
                    RentLog::create($request->all());
                    //process update book table
                    $book = Book::findORFail($request->book_id);
                    $book->status = 'not available';
                    $book->save();
                    DB::commit();
                    return redirect('book-rent')->with(['status' => 'Rent Book Success!!!', 'alert' =>'alert-success']);
                } catch (\Throwable $th) {
                    DB::rollBack();
                }
            }
            
        }
        
    }

    public function returnBook()
    {
        $users = User::where('id', '!=' , 1)->where('status', '!=', 'inactive')->get();
        $books = Book::all();
        return view('book-return', ['users' => $users, 'books' => $books]);
    }

    public function storeReturnBook(Request $request)
    {
        // user & buku yang dipilih untuk direturn benar, maka berhasil return book
        // user & book yang dipilih untuk direturn salah, makan muncul error notice
        $book = Book::findOrFail($request->book_id)->only('status');

        if ($book['status'] != 'not available') {
            return redirect('book-return')->with(['status' => 'Cannot rent, the book is lended!', 'alert' =>'alert-danger']);
        }
        else{
            $returnBook = RentLog::where('user_id', $request->user_id)->where('book_id', $request->book_id)->where('actual_return_date', null);
            $returnData = $returnBook->first();
            $countData = $returnBook->count();

            if($countData != 1)
            {
                // error notice muncul
                return redirect('book-rent')->with(['status' => 'Cannot return book!', 'alert' =>'alert-danger']);
                
            }
            else
            {
                try {
                    //kita akan return book
                    DB::beginTransaction();
                    $returnData->actual_return_date = Carbon::now()->toDateString();
                    $returnData->save();

                    $book = Book::findORFail($request->book_id);
                    $book->status = 'in stock';
                    $book->save();
                    DB::commit();
                    return redirect('book-return')->with(['status' => 'Return Book Success!!!', 'alert' =>'alert-success']);
                } catch (\Throwable $th) {
                    DB::rollBack();
                }
            }
        }    
    }
}
