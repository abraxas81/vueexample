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
        $data = $this->get_listing($listing);
        return response()->json($data);
    }

    private function get_listing($listing)
    {
        $model = $listing->toArray();
        for($i = 1; $i <=4; $i++) {
            $model['image_' . $i] = asset('images/' . $listing->id . '/Image_' . $i . '.jpg');
        }
        return collect(['listing' => $model]);
    }
}
