<?php

namespace App\Http\Resources;

use App\Models\DetailLoan;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LoanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // loan resource
        return [
            'id' => $this->id,
            'id_member'=> $this->id_member,
            'borrowed_date'=> $this->borrowed_date,
            'due_date'=> $this->due_date,
            'returned_date'=> $this->returned_date,
            'loan_status'=> $this->loan_status,
            // 'details' => $this->details!==null ? DetailLoan::collection($this->details) : [],
            'created_at' => date('Y-m-d H:i:s', strtotime($this->created_at)),
            'updated_at' => date('Y-m-d H:i:s', strtotime($this->updated_at))
        ];
    }
}