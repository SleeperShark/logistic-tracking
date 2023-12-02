<?php

use App\Models\Location;
use Illuminate\Http\Request;
use App\Models\LogisticsOrder;
use App\Http\Requests\FakeRequest;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\SnoQueryRequest;
use App\Http\Resources\LogisticsOrderResource;
use Illuminate\Database\UniqueConstraintViolationException;
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

Route::get('/fake', function (FakeRequest $request) {
    $num = $request->validated('num');

    $orders      = [];
    $locationsId = Location::pluck('id')->toArray();

    for ($i = 0; $i < $num; $i++) {
        /** @var LogisticsOrder */
        while (true) {
            try {
                $order = LogisticsOrder::factory()->create();
                break;
            } catch (UniqueConstraintViolationException) {
                // sno duplication
                continue;
            }
        }

        for ($j = 0; $j < random_int(1, 5); $j++) {
            $order->items()->create([
                'status'      => $order->tracking_status,
                'location_id' => array_rand($locationsId),
            ]);
        }

        array_push($orders, $order);
    }

    $result = array_map(fn (LogisticsOrder $order) => [
        'sno'             => $order->sno,
        'tracking_status' => $order->tracking_status->description,
    ], $orders);

    return response($result);
});
