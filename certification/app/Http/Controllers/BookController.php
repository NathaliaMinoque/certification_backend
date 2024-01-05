<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
        // function untuk create book
    public function createBook(Request $request)
    {
        $book = new Book();

        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->published_year = $request->input('published_year');
        $book->loan_status = '0';

        if($book){
            $book->save();

            return response()->json(
                [
                    "status_code" => 201,
                    "message" => "Success Creating Data"
                ], 201
            );
        }

        return response()->json(
            [
                "status_code" => 400,
                "message" => "Create Failed"
            ],
            400
        );

        
    }

    // function untuk read book by id
    public function readBook(Request $request)
    {
        $idBook = $request->input('id');

        // dd($idBarang);
        $book = Book::where('id', $idBook)->get();

       if($book){

            return $book;

       }
       return response()->json(
            [
                "status_code" => 400,
                "message" => "Read Failed"
            ],
            400
        );
    }

        // function untuk read book by id
        public function readBookByAvailability(Request $request)
        {
            // dd($idBarang);
            $book = Book::where('loan_status', '0')->get();
    
           if($book){
    
                return $book;
    
           }
           return response()->json(
                [
                    "status_code" => 400,
                    "message" => "Read Failed"
                ],
                400
            );
        }

    // function untuk read daftar book
    public function readAllBook(Request $request)
    {
        $books = Book::get();
// dd($books);
       if($books){

            return $books;
       }
       return response()->json(
            [
                "status_code" => 400,
                "message" => "Read Failed"
            ],
            400
        );
        
    }

    // function untuk update book
    public function updateBook(Request $request)
    {
        $idBook = $request->input('id');

        $book = Book::find($idBook);
// dd($idBook);
        if($book){
            $book->title = $request->input('title');
            $book->author = $request->input('author');
            $book->published_year = $request->input('published_year');
            $book->loan_status = $request->input('loan_status');
            // $barang->updated_at = $request->input('updated_at');

            $book->update();

            return response()->json(
                [
                    "status_code" => 200,
                    "message" => "Update Success"
                ], 200
            );
        }

        return response()->json(
            [
                "status_code" => 400,
                "message" => "Update Failed"
            ],
            400
        );
    }

        // function untuk delete book
    public function deleteBook(Request $request)
    {
        $idBook= $request->input('id');

        $book = Book::find($idBook);

        if($book){
            $book->delete();

            return response()->json(
                [
                    "status_code" => 200,
                    "message" => "Delete Success"
                ], 200
            );
        }

        return response()->json(
            [
                "status_code" => 400,
                "message" => "Delete Failed"
            ],
            400
        );
    }
}
