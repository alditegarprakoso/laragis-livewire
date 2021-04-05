<?php

namespace App\Http\Livewire;

use App\Models\Location;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class MapLocation extends Component
{
    use WithFileUploads;

    public $long, $lat, $geoJson, $title, $description, $image, $locationId, $imgUrl;

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

    private function clearForm()
    {
        $this->long = '';
        $this->lat = '';
        $this->title = '';
        $this->description = '';
        $this->image = '';
    }

    public function render()
    {
        $this->loadLocation();
        return view('livewire.map-location');
    }

    public function saveLocation()
    {
        $this->validate([
            'long' => 'required',
            'lat' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|required|max:2048',
        ]);

        $imageName = md5($this->image . microtime()) . '.' . $this->image->extension();

        Storage::putFileAs(
            'public/images',
            $this->image,
            $imageName
        );

        Location::create([
            'long' => $this->long,
            'lat' => $this->lat,
            'title' => $this->title,
            'description' => $this->description,
            'image' => $imageName
        ]);

        $this->clearForm();
        $this->loadLocation();
        $this->dispatchBrowserEvent('locationAdded', $this->geoJson);
    }

    public function findLocationById($id)
    {
        $location = Location::findOrFail($id);

        $this->locationId = $id;
        $this->long = $location->long;
        $this->lat = $location->lat;
        $this->title = $location->title;
        $this->description = $location->description;
        $this->imgUrl = $location->image;
    }
}
