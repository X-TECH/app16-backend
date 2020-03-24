<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateApplicationRequest;
use App\Models\Application;
use Illuminate\Http\Resources\Json\JsonResource;

class CreateApplicationController extends Controller
{
    public function __invoke(CreateApplicationRequest $request)
    {
        $application = new Application();

        $application->device_token = $request->device_token;

        $application->first_name = $request->first_name;
        $application->middle_name = $request->middle_name;
        $application->last_name = $request->last_name;

        $application->out_address = $request->out_address;
        $application->out_latitude = $request->out_latitude;
        $application->out_longitude = $request->out_longitude;
        $application->out_datetime = $request->out_datetime;

        $application->visiting_address_and_name = $request->visiting_address_and_name;
        $application->visiting_latitude = $request->visiting_latitude;
        $application->visiting_longitude = $request->visiting_longitude;
        $application->visiting_reason = $request->visiting_reason;
        $application->planned_return_datetime = $request->planned_return_datetime;

        $application->save();

        return JsonResource::make($application);
    }
}
