<div class="mb-3">
    <label for="book_title" class="form-label">Book Title</label>
    <input type="text" name="book_title" class="form-control" id="book_title"
        value="{{ old('book_title', $book->book_title) }}">

    @error('book_title')
        <small class="text-danger">*{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label for="category" class="form-label">Book Category</label>
    <select name="category" id="category" class="form-select">
        <option disabled selected>Choose one!</option>
        @foreach ($categories as $category)
            <option {{ $book->category && $category->id == $book->category->id ? 'selected' : '' }}
                value="{{ $category->id }}">
                {{ $category->name }}</option>
        @endforeach
    </select>

    @error('category')
        <small class="text-danger">*{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label for="book_description" class="form-label">Book Description</label>

    <textarea name="book_description" id="book_description" class="form-control" rows="3">{{ old('book_description', $book->book_description) }}</textarea>

    @error('book_description')
        <small class="text-danger">*{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label for="book_quantity" class="form-label">Book Quantity</label>
    <input type="number" name="book_quantity" class="form-control" id="book_quantity"
        value="{{ old('book_quantity', $book->book_quantity) }}">

    @error('book_quantity')
        <small class="text-danger">*{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label for="book_cover" class="form-label">
        Book Cover <small class="text-danger">*max size 2mb</small>
    </label>
    <input type="file" class="form-control" name="book_cover" id="book_cover">

    @error('book_cover')
        <small class="text-danger">*{{ $message }}</small>
    @enderror
</div>

<div class="mb-3">
    <label for="book_file" class="form-label">
        Book File <small class="text-danger">*max size 10mb</small>
    </label>
    <input type="file" class="form-control" name="book_file" id="book_file">

    @error('book_file')
        <small class="text-danger">*{{ $message }}</small>
    @enderror
</div>


<button type="submit" class="btn btn-primary mt-2">{{ $submit }}</button>
