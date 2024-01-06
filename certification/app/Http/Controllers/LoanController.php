<?php

namespace App\Http\Controllers;

use App\Http\Resources\LoanResource;
use App\Models\Book;
use App\Models\DetailLoan;
use App\Models\Loan;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LoanController extends Controller
{
       // function untuk create Loan
       public function createLoan(Request $request)
       {
           $loan = new Loan();

        //    $now = ;

            // Add 7 days to the current date
            $dateInSevenDays = Carbon::now()->addDays(7);
            $dateInSubDay = Carbon::now()->subDays(1);
   
           $loan->id_member = $request->input('id_member');
           $loan->borrowed_date = now();
           $loan->due_date = $dateInSevenDays;
           $loan->returned_date = $dateInSubDay;
           $loan->loan_status = '1';
       

           if($loan){
            $loan->save();
                // untuk mendapatkan id karena id increment
                $loanQuery = Loan::latest('borrowed_date')
                 ->first();
// dd($loanQuery);
            
                // get details
                $detailLoans = $request->input('details');
               
                if (!empty($detailLoans)) {
                    // masukin setiap detail ke table dgn call function detail loan
                    foreach ($detailLoans as $detailLoan) {
                        // dd($detailLoan['id_book']);
                        $this->createDetailLoan($loanQuery, $detailLoan['id_book']);
                        
                        $book = Book::find($detailLoan['id_book']);
                        $book->loan_status = '1';

                        // dd($book);
                        $book->update();
                    }
                }

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

       public function createDetailLoan(Loan $loanData, string $idBook)
        {
            $detailLoan = new DetailLoan();

            // get loan id
            $idLoan = $loanData->id;

          
            $detailLoan->id_loan = $idLoan;
            $detailLoan->id_book = $idBook; 

            $detailLoan->save();
        }
   
       // function untuk read Loan by id
       public function readLoan(Request $request)
       {
           $idLoan = $request->input('id');
   
           // dd($idBarang);
           $loan = Loan::where('id', $idLoan)->get();
   
          if($loan){
               return $loan;
          }
          return response()->json(
               [
                   "status_code" => 400,
                   "message" => "Read Failed"
               ],
               400
           );
       }

       public function readDetailLoan(String $idLoanData)
       {
        //    $idDetailLoan = $request->input('id');
   
           // dd($idBarang);
           $detailLoan = Loan::where('id', $idLoanData)->get();
   
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

       // function untuk read daftar Loan
       public function readAllLoan(Request $request)
       {
           $loans = Loan::get();

        //    $detailLoan = readDetailLoan();

          if($loans){
   
            // return response()->json(
            //     [
            //         "status_code" => 200,
            //         "message" => "Success Get Data",
            //         "data" => LoanResource::collection($loans)
            //     ], 200
            // );

               return $loans;
          }
          return response()->json(
               [
                   "status_code" => 400,
                   "message" => "Read Failed"
               ],
               400
           );
           
       }

       public function readAllLoanMember(Request $request)
       {
        $loans = DB::table('loan')
        ->join('member', 'loan.id_member', '=', 'member.id')
        ->select('*')
        ->where('loan_status', '1')
        ->get();
// dd($loans);
          if($loans){

               return $loans;
          }
          return response()->json(
               [
                   "status_code" => 400,
                   "message" => "Read Failed"
               ],
               400
           );
           
       }
   
       // function untuk update Loan
       public function updateLoan(Request $request)
       {
           $idLoan = $request->input('id');
   
           $loan = Loan::find($idLoan);
        //    dd($idLoan);
   
           if($loan){
            $loan->id_member = $loan->id_member;
            $loan->borrowed_date = $loan->borrowed_date;
            $loan->due_date = $loan->due_date;
            $loan->returned_date = now();
            $loan->loan_status = '0';
   
            if($loan){
                $loan->update();

                // untuk dapet detail loan
                $detailLoans = DetailLoan::where('id_loan', $idLoan)->get();

                // if($detailLoan){
                //     $detailLoan->id_member = $loan->id_member;
                // }

                if (!empty($detailLoans)) {
                    // masukin setiap detail ke table dgn call function detail loan
                    foreach ($detailLoans as $detailLoan) {
                        $book = Book::where('id', $detailLoan->id_book)->first();

                        $this->updateBook($book);
                    }
                }
            }
             
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

       public function updateBook(Book $book)
       {
        //    $book = Book::find($idBook);
   
           if($book){
                $book->title = $book->title;
                $book->author = $book->author ;
                $book->published_year = $book->published_year;
                $book->loan_status = '0';
               // $barang->updated_at = $request->input('updated_at');
   
               $book->update();
           }
       }
   
           // function untuk delete loan
       public function deleteLoan(Request $request)
       {
           $idLoan= $request->input('id');
   
           $loan = Loan::find($idLoan);
           $detailLoans = DetailLoan::where('id_loan', $idLoan)->get();
   
           if($loan && $detailLoans){
            foreach ($detailLoans as $detailLoan) {
                $detailLoan->first()->delete();
            }
               $loan->delete();
   
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

    //    public function deleteDetailLoan(Request $request)
    //    {
    //        $idDetailLoan= $request->input('id');
   
    //        $detailLoan = Loan::find($idDetailLoan);
   
    //        if($detailLoan){
    //            $detailLoan->delete();
   
    //            return response()->json(
    //                [
    //                    "status_code" => 200,
    //                    "message" => "Delete Success"
    //                ], 200
    //            );
    //        }
   
    //        return response()->json(
    //            [
    //                "status_code" => 400,
    //                "message" => "Delete Failed"
    //            ],
    //            400
    //        );
    //    }
}
