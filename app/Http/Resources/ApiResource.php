<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'title' => $this->title,
            'author'=> $this->author,
            'tipoAdquisicion' => $this->tipoAdquisicion,
            'edition' => $this->edition,
            'disponible' => $this->disponible
        ];
        // return parent::toArray($request);
    }
}
