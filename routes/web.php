<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

Route::get('/', function () {
    return view('welcome');
});

// Add this EXACTLY:
Route::get('/test-datadog', function () {
    Log::info('Datadog Log Correlation Test');
    return response()->json(['status' => 'success', 'message' => 'Log sent!']);
});