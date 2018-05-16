<?php

namespace App\Http\Controllers;

use App\Listing;

class HomeController extends Controller
{
    public function index()
    {
        $collection = Listing::all(['id', 'address', 'title', 'price_per_night']);

        $collection->transform(function ($listing) {
        $listing->thumb = asset('images/' . $listing->id .'/Image_1_thumb.jpg');
            return $listing;
        });

        $data = collect(['listings' => $collection->toArray()]);

        return view('app', ['data' => $data]);
    }
}
