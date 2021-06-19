<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdvertisementResource;
use App\Models\Advertisement;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdvertisementController extends Controller
{
    public function getRandomAdvertisement(): string
    {
        return (new AdvertisementResource(Advertisement::all()->random()))->toJson();
    }
}
