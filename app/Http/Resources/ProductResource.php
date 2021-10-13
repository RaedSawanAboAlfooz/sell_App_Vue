<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $address = $this->address;
        if ($address==null) {
            $address='غير موجود ';
        }
        return [
            'id'=>$this->id,
            'description'=>$this->description,
            'category'=>$this->category->name,
            'count_like'=>$this->count_like,
            'price'=>$this->price,
            'accept'=>$this->accept,
            'image_profile_name'=>$this->user['image_profile_name'],
            'address'=>$address,
            'status_sell'=>$this->status_sell,
            'user_id'=>$this->user_id,
            'created_at'=>$this->created_at->diffForHumans(),
            'name'=>$this->name,
            'city'=>$this->city->name,
            'user_name'=>$this->user['name'],
            'imags'=> ImageProductResource::collection($this->images),
        ];
    }
}
