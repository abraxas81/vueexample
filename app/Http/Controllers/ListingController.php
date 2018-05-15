<?php

namespace App\Http\Controllers;

use App\Http\Resources\ListingResource;
use App\Listing;

class ListingController extends Controller
{
    public function show(Listing $listing)
    {
        $model = $listing->toArray();

        $model = $this->add_image_urls($model, $listing->id);

        return view('app', ['model' => $model]);
    }

    private function add_image_urls($model, $id) {

        for($i = 1; $i <=4; $i++) {
            $model['image_' . $i] = asset( 'images/' . $id . '/Image_' . $i . '.jpg' );
        }
        return $model;
    }
}
