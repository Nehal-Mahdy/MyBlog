<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\CatResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        // dd($this);
        return [
            "id" => $this->id,
            "Post_title"=> $this->title,            
            // "category"=>$this->cat->name,
            "user"=>$this ->user_id,
            "category"=>new CatResource($this->cat),
        ];
    }
}
