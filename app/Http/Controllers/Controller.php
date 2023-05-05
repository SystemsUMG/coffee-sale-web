<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public int $status_code;
    public string $message;
    public array $response;
    public string $response_type;
    public function __construct()
    {
        $this->message = 'Ha ocurrido un error';
        $this->status_code = 400;
        $this->response_type = 'error';
        $this->response = [];
    }

    public function serverSideParameters($request) {
        return [
            'search' => $request->search['value'] ?? '',
            'limit_val' => $request->length,
            'start_val' => $request->start,
            'order_val' => $request->columns[$request->order[0]['column']]['data'],
            'dir_val' => $request->order[0]['dir'],
        ];
    }
}
