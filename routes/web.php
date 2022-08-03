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


    $email = new \SendGrid\Mail\Mail();
    $email->setFrom(getenv("SENDGRID_API_EMAIL"), "Abdulkader");
    $email->setSubject("abdulkader zakaria nashar");
    $email->addTo("it.abdulkader@gmail.com", "zakaria");
    $email->addContent("text/plain", "and easy to do anywhere, even with PHP");
    $email->addContent("text/html", "<strong>and easy to do anywhere, even with PHP</strong>");
    $sendgrid = new \SendGrid(getenv("SENDGRID_API_KEY"));
    try {
        $response = $sendgrid->send($email);
        print $response->statusCode() . "\n";
        print_r($response->headers());
        print $response->body() . "\n";
    } catch (Exception $e) {
        echo 'Caught exception: '. $e->getMessage() ."\n";
    }


    return view('welcome');
});
