<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Resources\Json\JsonResource;

class QrScannedApplicationsController extends Controller
{
    public function __invoke($qr_scanned_value)
    {
        $application_id = str_replace('app16_application_', '', $qr_scanned_value);

        $application = Application::find($application_id);

        return JsonResource::make($application);
    }
}
