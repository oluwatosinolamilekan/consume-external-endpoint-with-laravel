<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
    * Set Base URL for API calls
    */

     public $base_url ="https://jsonplaceholder.typicode.com/photos";


     /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function _apiCallToPhoto ($data = [] , $url , $method , $header = [])
    {

      try {

      $data = Json_encode($data, TRUE);

      $curl = \curl_init();
        \curl_setopt_array(
            $curl, array(
              CURLOPT_URL => $this->base_url,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => "",
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 30,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => $method,
              CURLOPT_POSTFIELDS => $data,
              CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            ),
        ));

        $response = \curl_exec($curl);
        $err = \curl_error($curl);
        $response = Json_decode($response);
        \curl_close($curl);

        return $response;

      } catch (\Exception $e) {

      }

    }
}
