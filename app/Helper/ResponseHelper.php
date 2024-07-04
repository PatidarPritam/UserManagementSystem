<?php

namespace App\Helper;

class ResponseHelper
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    /**  it is only for documentation
     * Function : common function to display success json response
     * @param string $status
     * @param string $message
     * @param array $data
     * @param integer $statusCode
     */

       public static function success($status = "success" ,  $message =null ,$data = [] ,$statusCode = 200){
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
            ], $statusCode);
 }
   /**
    * it is only for documentation purpose 
     * Function : common function to display success json response 
     * @param string $status
     * @param string $message
     * @param array $data
     * @param integer $statusCode
     */

    public static function error($status = 'error' ,$message= null ,$data=[] ,$statusCode=400){
        return response()->json([
            'status' => $status,
            'message' => $message,
            ], $statusCode);

    }
}
