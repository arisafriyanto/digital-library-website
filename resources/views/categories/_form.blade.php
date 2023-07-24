<div class="mb-3">
    <label for="name" class="form-label">Category Name</label>
    <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $category->name) }}">

    @error('name')
        <small class="text-danger">*{{ $message }}</small>
    @enderror
</div>

<button type="submit" class="btn btn-primary mt-2">{{ $submit }}</button>
