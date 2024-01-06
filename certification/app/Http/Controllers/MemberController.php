<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
        // function untuk create book
        public function createMember(Request $request)
        {
            $member = new Member();
    
            $member->name = $request->input('name');
            $member->address = $request->input('address');
            $member->phone = $request->input('phone');
    
            if($member){
                $member->save();
    
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
    
        // function untuk read member by id
        public function readMember(Request $request)
        {
            $idMember = $request->input('id');
    
            // dd($idBarang);
            $member = Member::where('id', $idMember)->get();
    
           if($member){
    
                return $member;
    
           }
           return response()->json(
                [
                    "status_code" => 400,
                    "message" => "Read Failed"
                ],
                400
            );
        }
    
            // // function untuk read book by id
            // public function readBookByAvailability(Request $request)
            // {
            //     // dd($idBarang);
            //     $member = Member::where('loan_status', '0')->get();
        
            //    if($member){
        
            //         return $member;
        
            //    }
            //    return response()->json(
            //         [
            //             "status_code" => 400,
            //             "message" => "Read Failed"
            //         ],
            //         400
            //     );
            // }
    
        // function untuk read daftar member
        public function readAllMember(Request $request)
        {
            $members = Member::get();
    // dd($members);
           if($members){
    
                return $members;
           }
           return response()->json(
                [
                    "status_code" => 400,
                    "message" => "Read Failed"
                ],
                400
            );
            
        }
    
        // function untuk update member
        public function updateMember(Request $request)
        {
            $idMember= $request->input('id');
    
            $member = Member::find($idMember);
    // dd($idMember);
            if($member){
                $member->name = $request->input('name');
                $member->address = $request->input('address');
                $member->phone = $request->input('phone');
    
                $member->update();
    
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
    
            // function untuk delete member
        public function deleteMember(Request $request)
        {
            $idMember= $request->input('id');
    
            $member = Member::find($idMember);
    
            if($member){
                $member->delete();
    
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
