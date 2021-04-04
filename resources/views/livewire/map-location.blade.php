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
