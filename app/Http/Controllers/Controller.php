<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Validate business rules
     *
     * @param  array $objectives
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function business($objectives)
    {
        $messages = tap(collect(), function($messages) use($objectives) {
            collect($objectives)->each(function($objective) use($messages) {
                if (! $objective->passes()) {
                    $messages->put('business', $objective->message());
                }
            });
        });
        if (! $messages->isEmpty()) {
            throw new ValidationException(
                app('validator'), new JsonResponse($messages, 422)
            );
        }
    }
}
