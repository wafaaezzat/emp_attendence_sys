<?php

namespace App\Http\Resources;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $data =[
//            'id'=>$this->id,
            'username'=>$this->user->name,
            'date'=>$this->created_at,
            'login'=>$this->sign_in,
            'logout'=>$this->sign_out,
            'status'=>$this->status
        ];
    }
}
