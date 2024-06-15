div class="row gy-5">
    @foreach ($filteredTempatMakan as $tempat)
    <div class="col-lg-4 col-md-6">
        <div class="culinary-item">
            <img src="{{ $tempat->url_photo }}" class="img-fluid" alt="{{ $tempat->name }}">
            <div class="culinary-content">
                <h4>{{ $tempat->name }}</h4>
                <p class="culinary-description">{{ $tempat->description }}</p>
                <p class="culinary-location"><i class="bi bi-geo-alt"></i> {{ $tempat->location }}</p>
                <a href="{{ url('/details/' . $tempat->id) }}" class="btn btn-icon-only p-0"><i class="bi bi-bookmark"></i></a>
                <a href="{{ url('/details/' . $tempat->id) }}" class="more-btn">More details <i class="bx bx-chevron-right"></i></a>
            </div>
        </div>
    </div>
    @endforeach
</div>