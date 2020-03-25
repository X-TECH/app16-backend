<?php

namespace App\Http\Controllers;

use App\Http\Resources\ApplicationResource;
use App\Models\Application;

class QrScannedApplicationsController extends Controller
{
    public function __invoke(string $qr_token)
    {
        $application = Application::qrToken($qr_token)->first();

        return ApplicationResource::make($application);
    }
}
