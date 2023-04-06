<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return Inertia::render("Welcome",[
        "times" => DB::table("reminders")->get()
    ]);
});

Route::get('/patient', function () {
    return Inertia::render("Patient",[
        "times" => DB::table("reminders")->get()
    ]);
});

Route::post('/', function (Request $request) {
    return $request->collect();
});

Route::get('/mailchimp', function(Request $request) {
    $mailchimp = new MailchimpTransactional\ApiClient();
    $mailchimp->setApiKey('YOUR_API_KEY');

    $response = $mailchimp->messages->send(["message" => []]);
    print_r($response);
});
