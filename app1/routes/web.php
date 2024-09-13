<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/health', function () {
    return response()->json(['status' => 'ok']);
});

Route::get('/app2', function () {
    try {
        $client = new \GuzzleHttp\Client();

        $url = env('APP2_URL');
        $res = $client->request('GET', $url . '/health');

        $response = array(
            "whoami" =>  "app1",
            "app2" => json_decode($res->getBody())
        );

        return response()->json($response);
    } catch (\Exception $e) {
        return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
    }
});
