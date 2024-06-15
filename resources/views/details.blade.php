<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warung Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        header {
            display: flex;
            align-items: center;
        }

        img {
            max-width: 40%;
            height: auto;
            margin-right: 20px;
        }

        h1 {
            font-size: 35px;
            margin: 0;
        }

        p {
            font-size: 16px;
            color: #555;
        }

        section {
            margin-top: 20px;
        }

        h2 {
            font-size: 20px;
            margin: 0;
        }

        .menu-overlay {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            overflow: auto;
        }

        .menu-content {
            position: relative;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            max-width: 80%;
        }

        .close-button {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close-button:hover,
        .close-button:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .menu-image {
            max-width: 100%;
            height: auto;
        }

        .show-menu-button {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .rating {
            direction: rtl;
            /* Right to left align the radio buttons */
            display: inline-flex;
        }

        .rating input {
            display: none;
        }

        .rating label {
            color: #ccc;
            /* Default star color */
            font-size: 30px;
            cursor: pointer;
        }

        .rating label:hover,
        .rating label:hover~label,
        .rating input:checked+label,
        .rating input:checked+label~label {
            color: #ffc107;
            /* Color when star is hovered or checked */
        }
    </style>
</head>

<body>
    <header>
        <img id="placeImage" src="{{ $detailTempatMakan['url_photo'] }}" alt="Warung Image">
        <div style="flex: 1;">
            <h1 id="placeName">{{ $detailTempatMakan['name'] }}</h1>
            <p id="placeDescription">{{ $detailTempatMakan['description'] }}</p>
            <section>
                <h2>Location</h2>
                <p id="placeLocation">{{ $detailTempatMakan['location'] }}</p>
                <!-- Button to show menu image -->
                <button id="showMenuButton" class="show-menu-button mb-3"
                    onclick="window.location.href='{{ $detailTempatMakan['url_menu'] }}'">Show Menu</button>
            </section>
            @include('components.flash_messages')

            <div class="row border p-2">
                @foreach ($detailTempatMakan->ratings as $item)
                    <div class="col-md-2">
                        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid" />
                        <p class="text-secondary text-center">{{ \Carbon\Carbon::parse($item->created_at)->locale('id_ID')->isoFormat('LL') }}</p>
                    </div>
                    <div class="col-md-10">
                        <p>
                            <a class="float-left"
                                href="#"><strong>{{ $item->name }}</strong></a>
                            @for ($i = 1; $i <= $item->rating; $i++)
                                <span class="float-right"><i class="text-warning fa fa-star"></i></span>
                            @endfor

                        </p>
                        <div class="clearfix"></div>
                        <p>{!! nl2br($item->review) !!}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </header>
    <section id="review-customer" class="review-customer">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <h3 class="h4 pb-3">Write a Review</h3>
                <form action="{{ route('front.saveRating') }}" method="post">
                    @csrf
                    <input type="hidden" name="warungmakan_id" value="{{ $detailTempatMakan->id }}">
                    <div class="form-group col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name"
                            value="{{ old('name') }}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="rating">Rating</label>
                        <br>
                        <div class="rating" style="width: 10rem">
                            <input id="rating-5" type="radio" name="rating" value="5" /><label
                                for="rating-5"><i class="fas fa-star"></i></label>
                            <input id="rating-4" type="radio" name="rating" value="4" /><label
                                for="rating-4"><i class="fas fa-star"></i></label>
                            <input id="rating-3" type="radio" name="rating" value="3" /><label
                                for="rating-3"><i class="fas fa-star"></i></label>
                            <input id="rating-2" type="radio" name="rating" value="2" /><label
                                for="rating-2"><i class="fas fa-star"></i></label>
                            <input id="rating-1" type="radio" name="rating" value="1" /><label
                                for="rating-1"><i class="fas fa-star"></i></label>
                        </div>
                        @error('rating')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="review">Review</label>
                        <textarea id="review" class="form-control" name="review" cols="30" rows="10" placeholder="Review">{{ old('review') }}</textarea>
                        @error('review')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn btn-dark">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>


</body>

</html>
