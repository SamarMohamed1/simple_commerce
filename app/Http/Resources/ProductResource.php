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
        return [
            'id' => $this->id,
            'product name' => $this->p_name,
            'product description' => $this->p_description,
            'image'=>$this->image,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
       }
}