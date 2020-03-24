<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ListApplicationsController extends Controller
{
    public function __invoke(Request $request)
    {
        $applications = Application::query()
            ->latest()
            ->deviceToken($request->device_token)
            ->take(20)
            ->get();

        return JsonResource::collection($applications);
    }
}
