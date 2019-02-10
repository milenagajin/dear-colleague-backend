<?php
use App\User as UserEloquent;
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       return [
        'id' => $this->id,
        'name' => $this->name,
        'email' => $this->email,
        // 'votes' => UserEloquent::find($this->id)->notesToUser->count(),
        'admin' => $this->admin
       ];
    }
}
