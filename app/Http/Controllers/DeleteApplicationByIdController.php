<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteSingleApplicationRequest;
use App\Models\Application;
use Illuminate\Http\Resources\Json\JsonResource;

class DeleteApplicationByIdController extends Controller
{
    public function __invoke(DeleteSingleApplicationRequest $request, Application $application)
    {
        abort_unless($request->device_token === $application->device_token, 404);

        $this->deleteApplication($application);

        return JsonResource::make([
            'deleted' => true,
        ]);
    }

    private function deleteApplication(Application $application)
    {
        if (!$application->is_finished) {
            return;
        }

        try {
            $application->delete();
        } catch (\Exception $exception) {
        }
    }
}
