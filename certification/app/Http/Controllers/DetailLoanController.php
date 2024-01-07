<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailLoan;
use App\Models\Loan;
use App\Models\Book;
use Illuminate\Support\Facades\DB;

class DetailLoanController extends Controller
{
    // function untuk read detail loan
    public function readDetailLoan(Request $request)
    {

        $detailLoan = DB::table('detail_loan')
        ->join('book', 'detail_loan.id_book', '=', 'book.id')
        ->select('*')
        ->where('id_loan', $request->id)
        ->get();

       if($detailLoan){
            return $detailLoan;
       }
       return response()->json(
            [
                "status_code" => 400,
                "message" => "Read Failed"
            ],
            400
        );
    }
}
