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

        $qr_code = new QrCode(
            $this->qrCodeContents($current_application)
        );

        return response(
            $qr_code->writeString(),
            200,
            [
                'Content-Type' => $qr_code->getContentType()
            ]
        );
    }

    private function qrCodeContents(Application $application): string
    {
        $lines = [];

        $lines[] = "{$application->first_name} {$application->middle_name} {$application->last_name}";
        $lines[] = "---";
        $lines[] = "Ելք ժամ\t{$application->out_datetime->format('H:i')}";
        $lines[] = "Ելք հասցե\t{$application->out_address}";
        $lines[] = "Այց. վայր\t{$application->visiting_address_and_name}";
        $lines[] = "Նպատակ\t{$application->visiting_reason}";
        $lines[] = "Վերդարձ\t{$application->planned_return_datetime->format('H:i')}";

        return implode("\n", $lines);
    }
}
