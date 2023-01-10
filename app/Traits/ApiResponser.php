<?php

namespace App\Traits;

trait ApiResponser
{
    /**
     * @param array $data
     * @param string $message
     * @param integer $status 
     * 
     * Return success response
     * 
     * @return Illuminate\Http\JSONResponse
     */
    protected function success($data, $message=null, $status = 200)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ]);
    }

    /**
     * @param array $data
     * @param string $message
     * @param integer $status 
     * 
     * Return success response
     * 
     * @return Illuminate\Http\JSONResponse
     */
    protected function error($data, $message=null, $status = 400)
    {
        return response()->json([
            'status' => $status,
            'data' => $data,
            'message' => $message
        ]);
    }
}