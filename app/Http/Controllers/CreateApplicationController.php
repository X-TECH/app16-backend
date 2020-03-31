<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateApplicationRequest;
use App\Http\Resources\ApplicationResource;
use App\Models\Application;

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
        $application->out_datetime = $request->out_datetime;

        $application->visiting_address_and_name = $request->visiting_address_and_name;
        $application->visiting_reason = $request->visiting_reason;
        $application->planned_return_datetime = $request->planned_return_datetime;

        $application->save();

        return ApplicationResource::make($application);
    }
}
