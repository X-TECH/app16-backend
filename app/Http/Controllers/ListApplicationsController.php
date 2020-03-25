<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApplicationResource;
use App\Models\Application;
use Illuminate\Http\Request;

class ListApplicationsController extends Controller
{
    public function __invoke(Request $request)
    {
        $applications = Application::query()
            ->latest()
            ->deviceToken($request->device_token)
            ->take(20)
            ->get();

        return ApplicationResource::collection($applications);
    }
}
