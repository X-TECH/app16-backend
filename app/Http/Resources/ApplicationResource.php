<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "id" => $this->id,

            "first_name" => $this->first_name,
            "middle_name" => $this->middle_name,
            "last_name" => $this->last_name,

            "out_address" => $this->out_address,
            "out_datetime" => $this->outDatetime(),

            "visiting_address_and_name" => $this->visiting_address_and_name,
            "visiting_reason" => $this->visiting_reason,

            "planned_return_datetime" => $this->plannedReturnDatetime(),

            "finished_at" => $this->finishedAtDatetime(),
            "created_at" => $this->createdAtDatetime(),
        ];
    }

    private function outDatetime(): string
    {
        return $this->out_datetime->format('d.m.Y, H:i');
    }

    private function plannedReturnDatetime(): string
    {
        $diff = $this->planned_return_datetime
            ->startOfMinute()
            ->longAbsoluteDiffForHumans(
                $this->out_datetime->startOfMinute()
            );

        $datetime = $this->planned_return_datetime->format('d.m.Y, H:i');

        return "{$datetime} ({$diff} տևողությամբ)";
    }

    private function createdAtDatetime(): string
    {
        return $this->created_at->setTimezone('Asia/Yerevan')->format('d.m.Y, H:i');
    }

    private function finishedAtDatetime(): ?string
    {
        if (is_null($this->finished_at)) {
            return null;
        }

        $diff = $this->finished_at
            ->addHours(4)
            ->startOfMinute()
            ->longAbsoluteDiffForHumans(
                $this->planned_return_datetime->startOfMinute()
            );

        $datetime = $this->finished_at->setTimezone('Asia/Yerevan')->format('d.m.Y, H:i');

        if ($this->finished_at->isAfter($this->planned_return_datetime)) {
            return "{$datetime} ({$diff} ուշացումով)";
        } else {
            return "{$datetime} ({$diff} շուտ)";
        }
    }
}
