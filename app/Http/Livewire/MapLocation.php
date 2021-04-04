<?php

namespace App\Http\Livewire;

use App\Models\Location;
use Livewire\Component;

class MapLocation extends Component
{
    public $long, $lat, $geoJson;

    private function loadLocation()
    {
        $locations = Location::orderBy('created_at', 'desc')->get();
        $addLocations = [];

        foreach ($locations as $location) {
            $addLocations[] = [
                'type' => 'Feature',
                'geometry' => [
                    'coordinates' => [$location->long, $location->lat],
                    'type' => 'Point'
                ],
                'properties' => [
                    'locationId' => $location->id,
                    'title' => $location->title,
                    'image' => $location->image,
                    'description' => $location->description
                ]
            ];
        }

        $geoLocation = [
            'type' => 'FeatureCollection',
            'features' => $addLocations
        ];

        $geoJson = collect($geoLocation)->toJson();

        $this->geoJson = $geoJson;
    }

    public function render()
    {
        $this->loadLocation();
        return view('livewire.map-location');
    }
}
