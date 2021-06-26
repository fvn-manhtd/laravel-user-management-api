<?php

namespace App\Http\Resources;

use App\Http\Resources\CategoryResourse;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'title'=> $this->title,
            'description' => $this->description,
            
            // 'category_name' =>new CategoryResourse($this->whenLoaded('name'))
        ];
    }
}
