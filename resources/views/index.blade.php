<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>ENTe Bootstrap Template - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <style>
        .culinary-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .culinary-content {
            height: auto;
        }
        .culinary-description {
            height: 100px;
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
        }
        .dropdown-container {
            display: flex;
            justify-content: space-between;
        }
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body>

<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">
        <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
            <h1>ENTe<span>.</span></h1>
        </a>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#culinary-places">Culinary</a></li>
                <li><a href="{{ route('bookmark.index') }}">Bookmark</a></li>
                @auth <!-- Display if user is authenticated (logged in) -->
                    @php
                        $nameParts = explode(' ', Auth::user()->name);
                        $firstName = ucfirst(strtolower($nameParts[0]));
                    @endphp
                    <li><a href="#">Hello, {{ ucwords($firstName) }}</a></li>
                    <li><a href="{{ route('logout') }}">Logout</a></li>
                @else <!-- Display if user is a guest (not logged in) -->
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endauth
            </ul>
        </nav>
    </div>
</header>

<section id="hero" class="hero d-flex align-items-center section-bg">
    <div class="container">
        <div class="row justify-content-between gy-5">
            <div class="col-lg-5 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
                <h2 data-aos="fade-up">Delicacy for your daily<br>with Eat Near Telkom</h2>
                <p data-aos="fade-up" data-aos-delay="100">Let's embark on a culinary journey together! Whether you're craving regional specialties or eager to explore tantalizing new dishes, I'm here to help you discover the perfect food choices to tantalize your taste buds. Let's dive into our culinary adventure!</p>
                <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                    <a href="https://youtu.be/CEYaDSb7WMw?si=3efdt2RcXE7Xz1hk" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
                </div>
            </div>
            <div class="col-lg-5 order-1 order-lg-2 text-center text-lg-start">
                <img src="assets/img/hero-img.png" class="img-fluid" alt="" data-aos="zoom-out" data-aos-delay="300">
            </div>
        </div>
    </div>
</section>

<main id="main">
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>About ENTe</h2>
                <p>Discover <span>Delicious Choices</span> Around Telkom University</p>
            </div>
            <div class="row gy-4">
                <div class="col-lg-7 position-relative about-img" style="background-image: url(assets/img/telu.jpg);" data-aos="fade-up" data-aos-delay="150">
                    <div class="call-us position-absolute">
                        <h4>Explore Now</h4>
                        <p>Find the best places to eat and drink.</p>
                    </div>
                </div>
                <div class="col-lg-5 d-flex align-items-end" data-aos="fade-up" data-aos-delay="300">
                    <div class="content ps-0 ps-lg-5">
                        <p class="fst-italic">
                            Join us on a gastronomic journey around one of the most vibrant university areas.
                        </p>
                        <ul>
                            <li><i class="bi bi-check2-all"></i> Comprehensive listings of restaurants and cafes.</li>
                            <li><i class="bi bi-check2-all"></i> User reviews and ratings to help you choose.</li>
                            <li><i class="bi bi-check2-all"></i> Regular updates with new eateries and exclusive offers.</li>
                        </ul>
                        <p>
                            Discover, book, and enjoy the best that Telkom University has to offer.
                        </p>
                        <div class="position-relative mt-4">
                            <img src="assets/img/telkom1.jpg" class="img-fluid" alt="">
                            <a href="https://youtu.be/CEYaDSb7WMw?si=3efdt2RcXE7Xz1hk" class="glightbox play-btn"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <!-- ======= Stats Counter Section ======= -->
<section id="stats-counter" class="stats-counter">
  <div class="container" data-aos="zoom-out">
    <div class="row gy-4">
      <!-- Placeholder for graphic without numbers -->
      <div class="col-lg-3 col-md-6">
        <div class="stats-item text-center w-100 h-100">
          <!-- Placeholder or graphic element can be inserted here if needed -->
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="stats-item text-center w-100 h-100">
          <!-- Placeholder or graphic element can be inserted here if needed -->
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="stats-item text-center w-100 h-100">
          <!-- Placeholder or graphic element can be inserted here if needed -->
        </div>
      </div>

      <div class="col-lg-3 col-md-6">
        <div class="stats-item text-center w-100 h-100">
          <!-- Placeholder or graphic element can be inserted here if needed -->
        </div>
      </div>
    </div>
  </div>
</section><!-- End Stats Counter Section -->


    <section id="culinary-places" class="culinary-places">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h2>Our Culinary Places</h2>
                <p>Discover <span>Delicious Locations</span> Near You</p>
                @include('components.flash_messages')
            </div>
            <div class="dropdown-container">
                <div class="col-md-6 mb-6 mb-md-0" style="margin-right: 25px;">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="locationDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Filter by Location
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="locationDropdown">
                        @foreach($lokasiMakan as $lokasi)
                            <li><a class="dropdown-item" href="#" data-location="{{ $lokasi->location }}">{{ $lokasi->location }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="foodTypeDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Food Types
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="foodTypeDropdown">
                        <li><a class="dropdown-item" href="#" data-food-type="Beverage">Beverage</a></li>
                        <li><a class="dropdown-item" href="#" data-food-type="Main Course">Main Course</a></li>
                        <li><a class="dropdown-item" href="#" data-food-type="Desserts">Desserts</a></li>
                        <li><a class="dropdown-item" href="#" data-food-type="Snacks">Snacks</a></li>
                    </ul>
                </div>
            </div>
            <p></p>
            <div class="tab-content" data-aos="fade-up" data-aos-delay="300">
                <div class="row gy-5">
                    @foreach ($tempatMakan as $tempat)
                    <div class="col-lg-4 col-md-6">
                        <div class="culinary-item">
                            <img src={{ $tempat->url_photo }} class="img-fluid" alt="{{ $tempat->name }}">
                            <div class="culinary-content">
                                <h4>{{ $tempat->name }}</h4>
                                <p class="culinary-description">{{ $tempat->description }}</p>
                                <p class="culinary-location"><i class="bi bi-geo-alt"></i> {{ $tempat->location }}</p>

                                <form action="{{ route('bookmark.store') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="warungmakan_id" value="{{ $tempat->id }}">
                                    @php
                                        // cek sudah ada di bookmark apa belum
                                        if (Auth::check()) {
                                            $bookmarked = \App\Models\Bookmark::where('user_id', Auth::user()->id)->where('warungmakan_id', $tempat->id)->first();
                                        } else {
                                            $bookmarked = false;
                                        }
                                    @endphp
                                    <button type="submit" class="btn btn-icon-only p-0"><i class="bi bi-bookmark{{ $bookmarked != NULL ? '-check-fill' : '' }}"></i></button>
                                </form>

                                <a href="{{ url('/details/' . $tempat->id) }}" class="more-btn">More details <i class="bx bx-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</main>

<footer id="footer" class="footer">
    <div class="container">
        <!-- Footer content and social links would be added here -->
    </div>
</footer>
<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<div id="preloader"></div>
<!-- Vendor JS Files -->
<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
<script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    // Function to handle location dropdown item click
    $('.dropdown-item').click(function(e) {
        e.preventDefault(); // Prevent default link behavior
        var location = $(this).data('location'); // Get selected location
        filterByLocation(location); // Call function to filter data
    });

    // Function to filter data based on location
    function filterByLocation(location) {
        $.ajax({
            url: '{{ route("filter.by.location") }}',
            type: 'GET',
            data: { location: location },
            success: function(response) {
                if (response.html.trim() !== '') {
                    // Replace current data with filtered data
                    $('.tab-content').html(response.html);
                } else {
                    // Handle case where no data is available
                    $('.tab-content').html('<p>No data available for this location</p>');
                }
            },
            error: function(xhr) {
                // Handle error
                console.log(xhr.responseText);
            }
        });
    }
</script>
<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
</body>
</html>
