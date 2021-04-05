<div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div wire:ignore id='map' style='width: 100%; height: 80vh;'></div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Form
                    </div>
                    <div class="card-body scroll">
                        <form wire:submit.prevent="saveLocation">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Longtitude</label>
                                        <input wire:model="long" type="text" name="" id="" class="form-control">
                                        @error('long')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Lattitude</label>
                                        <input wire:model="lat" type="text" name="" id="" class="form-control">
                                        @error('lat')
                                            <small class="text-danger">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input wire:model="title" type="text" name="title" id="title" class="form-control">
                                @error('title')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea wire:model="description" class="form-control" name="description"
                                    id="description" rows="3"></textarea>
                                @error('description')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-file">
                                    <input wire:model="image" type="file" class="custom-file-input" id="image"
                                        name="image">
                                    <label class="custom-file-label" for="image">Choose image</label>
                                </div>
                                @if ($image)
                                    <img src="{{ $image->temporaryUrl() }}" class="img-fluid mt-2" height="150">
                                @endif
                                @error('image')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary form-control" type="submit">Add Location</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('livewire:load', function() {
            const defaultLocation = [106.7969665673055, -6.597621866537736]
            mapboxgl.accessToken =
                '{{ env('MAPBOX_KEY') }}';
            var map = new mapboxgl.Map({
                container: 'map',
                center: defaultLocation,
                zoom: 11.15,
                style: 'mapbox://styles/mapbox/streets-v11'
            });

            const loadLocation = (geoJson) => {
                geoJson.features.forEach((location) => {
                    const {
                        geometry,
                        properties
                    } = location
                    const {
                        iconSize,
                        locationId,
                        title,
                        image,
                        description
                    } = properties
                    let markerElement = document.createElement('div')
                    markerElement.className = 'marker' + locationId
                    markerElement.id = locationId
                    markerElement.style.backgroundImage =
                        'url(https://docs.mapbox.com/help/demos/custom-markers-gl-js/mapbox-icon.png)'
                    markerElement.style.backgroundSize = 'cover'
                    markerElement.style.width = "50px"
                    markerElement.style.height = "50px"

                    const imageStorage = "{{ asset('/storage/images') }}" + "/" + image

                    const content = `
                        <div style="overflow-y: auto; max-height: 400px; width: 100%;">
                            <table class="table table-sm mt-2">
                                <tbody>
                                    <tr>
                                        <td>Title</td>
                                        <td>${title}</td>
                                    </tr>
                                    <tr>
                                        <td>Picture</td>
                                        <td><img src="${imageStorage}" loading="lazy" width="150"></td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td>${description}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>`

                    markerElement.addEventListener('click', () => {
                        const locationId = e.toElement.id
                        @this.findLocationById
                    })

                    const popUp = new mapboxgl.Popup({
                        offset: 25
                    }).setHTML(content).setMaxWidth("400px")

                    new mapboxgl.Marker(markerElement)
                        .setLngLat(geometry.coordinates)
                        .setPopup(popUp)
                        .addTo(map)
                })
            }

            loadLocation({!! $geoJson !!})

            window.addEventListener('locationAdded', (e) => {
                loadLocation(JSON.parse(e.detail))
            })

            map.addControl(new mapboxgl.NavigationControl())

            map.on('click', (e) => {
                const longtitude = e.lngLat.lng
                const lattitude = e.lngLat.lat

                @this.long = longtitude
                @this.lat = lattitude
            })
        })

    </script>
@endpush
