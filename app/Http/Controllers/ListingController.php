<?php

namespace App\Http\Controllers;

use App\Http\Resources\ListingResource;
use App\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListingController extends Controller
{
    public function show(Listing $listing, Request $request)
    {
        $model = $listing->toArray();

        $data = collect(['listing' => $this->add_image_urls($model, $listing->id)]);

        $data = $this->add_meta_data($data, $request);
        return view('app', ['data' => $data]);
    }

    private function add_image_urls($model, $id) {

        for($i = 1; $i <=4; $i++) {
            $model['image_' . $i] = asset( 'images/' . $id . '/Image_' . $i . '.jpg' );
        }
        return $model;
    }

    private function add_meta_data($collection, $request)
    {


        return $collection->merge([
            'path' => $request->getPathInfo(),
            'auth' => Auth::check(),
            'saved' => Auth::check() ? Auth::user()->saved : []
        ]);
    }
}
