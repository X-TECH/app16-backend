<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Endroid\QrCode\QrCode;
use Illuminate\Http\Request;

class CurrentApplicationQrCodeController extends Controller
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

        $qr_code = new QrCode($current_application->qr_token);

        return response(
            $qr_code->writeString(),
            200,
            [
                'Content-Type' => $qr_code->getContentType()
            ]
        );
    }
}
