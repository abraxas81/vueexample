<?php

namespace App\Http\Controllers;

use App\Listing;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $collection = Listing::all(['id', 'address', 'title', 'price_per_night']);

        $collection->transform(function ($listing) {
        $listing->thumb = asset('images/' . $listing->id .'/Image_1_thumb.jpg');
            return $listing;
        });

        $data = collect(['listings' => $collection->toArray()]);
        $data = $this->add_meta_data($data, $request);
        return view('app', ['data' => $data]);
    }

    private function add_meta_data($collection, $request){
        return $collection->merge([ 'path' => $request->getPathInfo() ]); }

}
