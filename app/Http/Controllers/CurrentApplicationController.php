<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApplicationResource;
use App\Models\Application;
use Illuminate\Http\Request;

class CurrentApplicationController extends Controller
{
    public function __invoke(Request $request)
    {
        abort_unless($request->has('device_token'), 404);

        $current_application = Application::query()
            ->latest()
            ->current()
            ->deviceToken($request->device_token)
            ->first();

        abort_if(is_null($current_application), 404);

        return ApplicationResource::make($current_application);
    }
}
