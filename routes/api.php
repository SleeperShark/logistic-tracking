<?php

use Illuminate\Http\Request;
use App\Http\Requests\SnoQueryRequest;
use App\Http\Resources\LogisticsOrderResource;
use App\Models\LogisticsOrder;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/', function(SnoQueryRequest $request) {
    $sno = $request->validated('sno');

    /** @var ?LogisticsOrder */
    $order = LogisticsOrder::with([
        'recipient',
        'currentLocation',
        'items',
        'items.location',
    ])->where('sno', $sno)->first();

    throw_if(is_null($order), new NotFoundHttpException('Tracking number not found'));

    return new LogisticsOrderResource($order);
});
