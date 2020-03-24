<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Resources\Json\JsonResource;

class QrScannedApplicationsController extends Controller
{
    public function __invoke(string $qr_token)
    {
        $application = Application::qrToken($qr_token)->first();

        return JsonResource::make($application);
    }
}
