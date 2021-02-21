<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function callApi($api_data, Request $req)
    {
    	$data = null;
    	switch ($api_data['method']) {
    		case "GET":
    			$request = Request::create($api_data['endpoint'], $api_data['method']);
    			$response = Route::dispatch($request);
    			$responseBody = json_decode($response->getContent(), true);
    			$data = $responseBody["data"] ?? [];
    			break;
    		case "POST":
    			$request = Request::create($api_data['endpoint'], $api_data['method'], $req->all());
    			$response = Route::dispatch($request);
    			$responseBody = json_decode($response->getContent(), true);
    			$data = $responseBody["data"] ?? [];
    			break;
    		
    		default:
    			break;
    	}
    	return $data;
    }
}
