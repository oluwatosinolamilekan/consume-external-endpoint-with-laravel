<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class PhotoController extends Controller
{

    public $base_url ="https://jsonplaceholder.typicode.com/photos";
	/**
    * index method call all photo
    * from photo gallery api
    */

    public function index()
    {
        $client = new Client(['base_uri' => 'https://jsonplaceholder.typicode.com']);  
        $response = $client->request('GET', '/photos'); 
        $body = $response->getBody();
        $content =$body->getContents();
        $arr = json_decode($content,TRUE);
        dd($arr);
        return view('results.photo',compact('arr','response'));
    }
}
