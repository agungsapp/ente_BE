@if ($errors->any())
    <div class="mb-3 alert alert-danger" role="alert">
        <h5 class="alert-heading">Terjadi Kesalahan!</h5>
        <hr>
        <ul>
            @foreach ($errors->all() as $item)
                <li>
                    {{ $item }}
                </li>
            @endforeach
        </ul>
    </div>
@endif


@if (Session::has('success'))
<div class="mb-3 alert alert-success alert-dismissible fade show">
    {{ Session::get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (Session::has('error'))
    <div class="mb-3 alert alert-danger alert-dismissible fade show">
        {{ Session::get('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
