<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param \Throwable $exception
     * @return void
     *
     * @throws \Exception
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Throwable $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ValidationException) {
            $errors = collect($exception->errors())
                ->map(function ($messages, $key) {
                    return [
                        'key' => $key,
                        'messages' => $messages,
                    ];
                })
                ->values()
                ->all();

            return response()->json([
                'error' => [
                    'code' => 422,
                    'message' => 'Դուք ունեք սխալ լրացված դաշտեր',
                    'fields' => $errors,
                ]
            ]);
        } elseif ($exception instanceof NotFoundHttpException) {
            return response()->json([
                'error' => [
                    'code' => 404,
                    'message' => 'Տվյալները չեն գտնվել',
                ]
            ]);
        }

        return parent::render($request, $exception);
    }
}
