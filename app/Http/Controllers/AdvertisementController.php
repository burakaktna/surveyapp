<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdvertisementResource;
use App\Models\Advertisement;

class AdvertisementController extends Controller
{
    public function getRandomAdvertisement(): string
    {
        return (new AdvertisementResource(Advertisement::all()->random()))->toJson();
    }
}
