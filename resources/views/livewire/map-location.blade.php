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
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Longtitude</label>
                                    <input wire:model="long" type="text" name="" id="" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Lattitude</label>
                                    <input wire:model="lat" type="text" name="" id="" class="form-control">
                                </div>
                            </div>
                        </div>
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

            const geoJson = {
                "type": "FeatureCollection",
                "features": [{
                        "type": "Feature",
                        "geometry": {
                            "coordinates": [
                                "106.74705100867646",
                                "-6.600783852330935"
                            ],
                            "type": "Point"
                        },
                        "properties": {
                            "message": "Mantap",
                            "iconSize": [
                                50,
                                50
                            ],
                            "locationId": 30,
                            "title": "Hello new",
                            "image": "https://images.unsplash.com/photo-1565402161570-7ca09ba499f3?ixid=MXwxMjA3fDB8MHxzZWFyY2h8OXx8YnVpbGRpbmclMjBzY2hvb2x8ZW58MHwyfDB8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60",
                            "description": "Mantap"
                        }
                    },
                    {
                        "type": "Feature",
                        "geometry": {
                            "coordinates": [
                                "106.75689670439658",
                                "-6.5705725101826005"
                            ],
                            "type": "Point"
                        },
                        "properties": {
                            "message": "oke mantap Edit",
                            "iconSize": [
                                50,
                                50
                            ],
                            "locationId": 29,
                            "title": "Rumah saya Edit",
                            "image": "https://images.unsplash.com/photo-1566498929078-14614995ab70?ixid=MXwxMjA3fDB8MHxzZWFyY2h8OHx8YnVpbGRpbmclMjBzY2hvb2x8ZW58MHwyfDB8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60",
                            "description": "oke mantap Edit"
                        }
                    },
                    {
                        "type": "Feature",
                        "geometry": {
                            "coordinates": [
                                "106.79804953657003",
                                "-6.576720220552531"
                            ],
                            "type": "Point"
                        },
                        "properties": {
                            "message": "Update Baru",
                            "iconSize": [
                                50,
                                50
                            ],
                            "locationId": 22,
                            "title": "Update Baru Gambar",
                            "image": "https://images.unsplash.com/photo-1609348511219-00baf6946ec9?ixid=MXwxMjA3fDB8MHxzZWFyY2h8NHx8YnVpbGRpbmclMjBzY2hvb2x8ZW58MHwyfDB8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60d09444b68d8b72daa324f97c999c2301.jpeg",
                            "description": "Update Baru"
                        }
                    },
                    {
                        "type": "Feature",
                        "geometry": {
                            "coordinates": [
                                "106.76985911171624",
                                "-6.6075145784061675"
                            ],
                            "type": "Point"
                        },
                        "properties": {
                            "message": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                            "iconSize": [
                                50,
                                50
                            ],
                            "locationId": 19,
                            "title": "awdwad",
                            "image": "https://images.unsplash.com/photo-1554173058-1ff7bcff4beb?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MTh8fGJ1aWxkaW5nJTIwc2Nob29sfGVufDB8MnwwfA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60",
                            "description": "Oke."
                        }
                    },
                    {
                        "type": "Feature",
                        "geometry": {
                            "coordinates": [
                                "106.79437509531942",
                                "-6.614330406181821"
                            ],
                            "type": "Point"
                        },
                        "properties": {
                            "message": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                            "iconSize": [
                                50,
                                50
                            ],
                            "locationId": 18,
                            "title": "adwawd",
                            "image": "https://images.unsplash.com/photo-1587934924167-a3a04e138374?ixid=MXwxMjA3fDB8MHxzZWFyY2h8Mnx8YnVpbGRpbmclMjBzY2hvb2x8ZW58MHwyfDB8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60",
                            "description": "Ok."
                        }
                    },
                    {
                        "type": "Feature",
                        "geometry": {
                            "coordinates": [
                                "106.818723429528",
                                "-6.591890412093946"
                            ],
                            "type": "Point"
                        },
                        "properties": {
                            "message": "awdwad",
                            "iconSize": [
                                50,
                                50
                            ],
                            "locationId": 12,
                            "title": "adawd",
                            "image": "https://images.unsplash.com/photo-1536098561742-ca998e48cbcc?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MXx8YnVpbGRpbmclMjBzY2hvb2x8ZW58MHwyfDB8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60",
                            "description": "awdwad"
                        }
                    }
                ]
            }

            const loadLocation = () => {
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
                                                    <td><img src="${image}" loading="lazy" width="150"></td>
                                                </tr>
                                                <tr>
                                                    <td>Description</td>
                                                    <td>${description}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>`

                    const popUp = new mapboxgl.Popup({
                        offset: 25
                    }).setHTML(content).setMaxWidth("400px")

                    new mapboxgl.Marker(markerElement)
                        .setLngLat(geometry.coordinates)
                        .setPopup(popUp)
                        .addTo(map)
                })
            }

            loadLocation()

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
