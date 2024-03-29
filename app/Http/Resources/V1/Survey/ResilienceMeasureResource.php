<?php

namespace App\Http\Resources\V1\Survey;

use Illuminate\Http\Resources\Json\JsonResource;

class ResilienceMeasureResource extends JsonResource
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
            'name' => $this->name,
            'r_control' => $this->resilienceControl->name,
            'order' => $this->order,
            'options' => ResilienceMeasureScaleResource::collection($this->resilienceMeasureScales),
        ];
    }
}
