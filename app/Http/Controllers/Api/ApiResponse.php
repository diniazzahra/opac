<?php

namespace App\Http\Controllers\Api;

trait ApiResponse
{
    protected $reply = [
        'status' => false,
        'message' => '',
        'data' => [],
    ];
}
