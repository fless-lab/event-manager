<?php

use App\Http\Controllers\PromotersController;
use App\Http\Controllers\TypeTicketController;
use App\Http\Controllers\TicketController;
use App\Http\Requests\EventsRequest;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/



Route::group(["prefix"=>"promoter"], function(){
    Route::group(["middleware" => ["auth","verified","promoter_dashboard"]], function () {
        Route::get('/dashboard', [PromotersController::class,"index"])->name("promoter.index");
        Route::get('/events', [PromotersController::class,"eventsIndex"])->name("promoter.events.index");
        Route::get('/types', [PromotersController::class,"typeIndex"])->name("promoter.types.index");
        Route::post('/events', [PromotersController::class,"eventsStore"])->name("promoter.events.store");
        Route::put('/events/{event}', [PromotersController::class,"eventsUpdate"])->name("promoter.events.update");
        Route::delete('/events/{event}', [PromotersController::class,"eventsDelete"])->name("promoter.events.delete");


        //Manage  Type Ticket
        Route::get('/type', [TypeTicketController::class,"typeIndex"])->name("promoter.type.index");
        Route::post('/type', [TypeTicketController::class,"typeStore"])->name("promoter.type.store");
        Route::put('/types/{type}', [TypeTicketController::class,"typeUpdate"])->name("promoter.type.update");
        Route::delete('/types/{type}', [TypeTicketController::class,"typeDelete"])->name("promoter.type.delete");

        //Manage Ticket
        Route::post('/ticket', [TypeTicketController::class,"ticketStore"])->name("promoter.ticket.store");
        Route::put('/tickets/{ticket}', [TypeTicketController::class,"ticketUpdate"])->name("promoter.ticket.update");
        Route::delete('/tickets/{ticket}', [TypeTicketController::class,"ticketDelete"])->name("promoter.ticket.delete");

        //Manage tarif
        Route::post('/tarif', [TicketController::class, "tarifStore"])->name("promoter.tarif.store");
        Route::delete('/reservations/{reservation}', [PromotersController::class,"reservationDelete"])->name("promoter.reservation.delete");
        Route::get("/qrcode",[TicketController::class, "code"]);
        Route::get('/generatePdf',[TicketController::class, "generatePdf"])->name("promoter.tarif.pdf");

    });
});
