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

    /**
     * Return data of model.
     */
    public function listData($request, $data) {
        $server_side = [
            'search'    => $request->search['value'] ?? '',
            'limit_val' => $request->length,
            'start_val' => $request->start,
            'order_val' => $request->columns[$request->order[0]['column']]['data'],
            'dir_val'   => $request->order[0]['dir'],
        ];

        $recordsTotal = $data->count();
        $filtered = $data->search($server_side['search'])->orderBy($server_side['order_val'], $server_side['dir_val']);
        $recordsFiltered = $filtered->count();
        $filtered_data = $filtered->offset($server_side['start_val'])->limit($server_side['limit_val'])->get();

        return [
            'recordsTotal'    => $recordsTotal,
            'recordsFiltered' => $recordsFiltered,
            'data'            => $filtered_data,
        ];
    }

    public function saveImage($model, $request, $name) {
        $model->create([
            'url'   => $request->file('file')->storeAs('images', $name, 'public'),
            'type'  => $request->type
        ]);
    }
}
