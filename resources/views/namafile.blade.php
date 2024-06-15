@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<form action="{{ route('submit.review') }}" method="POST">
    @csrf
    <input type="text" name="name" required placeholder="Nama Anda">
    <textarea name="review" required placeholder="Review Anda"></textarea>
    <select name="rating" required>
        <option value="5">5 Bintang</option>
        <option value="4">4 Bintang</option>
        <option value="3">3 Bintang</option>
        <option value="2">2 Bintang</option>
        <option value="1">1 Bintang</option>
    </select>
    <button type="submit">Submit Review</button>
</form>
