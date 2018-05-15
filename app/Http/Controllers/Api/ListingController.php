<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ListingResource;
use App\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ListingController extends Controller
{
    public function show(Listing $listing)
    {
        return new ListingResource($listing);
    }
}
