<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "qr_token" => $this->qr_token,
            "first_name" => $this->first_name,
            "middle_name" => $this->middle_name,
            "last_name" => $this->last_name,
            "out_address" => $this->out_address,
            "out_datetime" => $this->out_datetime,
            "out_latitude" => $this->out_latitude,
            "out_longitude" => $this->out_longitude,
            "visiting_address_and_name" => $this->visiting_address_and_name,
            "visiting_latitude" => $this->visiting_latitude,
            "visiting_longitude" => $this->visiting_longitude,
            "visiting_reason" => $this->visiting_reason,
            "planned_return_datetime" => $this->planned_return_datetime,
            "finished_at" => $this->finished_at,
            "created_at" => $this->created_at,
        ];
    }
}
