<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ListingResource;
use App\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $data = $this->get_listing_summaries();
        return response()->json($data);
    }

    private function get_listing_summaries()
    {
        $collection = Listing::all([
            'id', 'address', 'title', 'price_per_night'
        ]);
        $collection->transform(function($listing) {
            $listing->thumb = asset(
                'images/' . $listing->id . '/Image_1_thumb.jpg'
            );
            return $listing;
        });
        return collect(['listings' => $collection->toArray()]);
    }
}
