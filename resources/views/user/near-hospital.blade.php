<x-app-layout>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">Map Rendered</div>
                    <div class="card-body profile-card pt-4 d-flex flex-column">
                        <div class="row">
                            <div class="col-lg-12">
                                <iframe width="700" height="450" frameborder="2" style="border:2" referrerpolicy="no-referrer-when-downgrade"
                                    src="https://www.google.com/maps/embed/v1/directions?key={{env('GOOGLE_MAP_KEY')}}&origin={{$info->latitude.",".$info->longitude}}&destination={{$hos_cords}}&avoid=tolls|highways"
                                    allowfullscreen>
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- {{ dd($info) }} --}}
</x-app-layout>

