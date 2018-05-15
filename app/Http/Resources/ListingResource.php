<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ListingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'address' => $this->address,
            'about' => $this->about,
            'amenity_wifi' => $this->amenity_wifi,
            'amenity_pets_allowed' => $this->amenity_pets_allowed,
            'amenity_tv' => $this->amenity_tv,
            'amenity_kitchen' => $this->amenity_kitchen,
            'amenity_breakfast' => $this->amenity_breakfast,
            'amenity_laptop' => $this->amenity_laptop,
            'price_per_night' => $this->price_per_night,
            'price_extra_people' => $this->price_extra_people,
            'price_weekly_discount' => $this->price_weekly_discount,
            'price_monthly_discount' => $this->price_monthly_discount,
            'images' => $this->getImages($this->id)
        ];
    }


    /**
     * Method for generating url of images
     *
     * @param $id
     * @return array
     */
    private function getImages($id)
    {
        $images = [];

        for ($i = 1; $i <= 4; $i++) {
            $images[] = asset(
                'images/' . $id . '/Image_' . $i . '.jpg'
            );
        }

        return $images;
    }
}
