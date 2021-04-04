<div>
    <div id='map' style='width: 400px; height: 300px;'></div>

</div>

@push('scripts')
    <script>
        mapboxgl.accessToken =
            'pk.eyJ1IjoiYWxkaXRlZ2FycHJha29zbyIsImEiOiJja24yZjBsNnUwd3B3MnFxaXJmdHBiZnJtIn0.MQpnuI8z8y44iFvwajv-cg';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11'
        });

    </script>
@endpush
