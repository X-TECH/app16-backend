<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteAllApplicationsRequest;
use App\Models\Application;
use Illuminate\Http\Resources\Json\JsonResource;

class DeleteAllApplicationsController extends Controller
{
    public function __invoke(DeleteAllApplicationsRequest $request)
    {
        Application::deviceToken($request->device_token)->delete();

        return JsonResource::make([
            'deleted' => true,
        ]);
    }
}
