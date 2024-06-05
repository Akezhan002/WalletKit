<?php

use App\Http\Controllers\Client\ClientController;
use Illuminate\Support\Facades\Route;


Route::get('clients/{phoneNumber}', [ClientController::class, 'getClientByPhoneNumber']);
Route::get('clients', [ClientController::class, 'getAllClients']);
