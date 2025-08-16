@extends('layouts.app')

@section('title', 'Edit Adoption Post')

@section('content')
<div class="container">
    <h2>Edit Adoption Post</h2>
    <form action="{{ url('/admin/adoption-management/update/' . $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Add your fields here, pre-filled with $post data -->
        <div class="form-group">
            <label for="pet_name">Pet Name</label>
            <input type="text" name="pet_name" id="pet_name" class="form-control" value="{{ $post->pet_name }}" required>
        </div>
        <div class="form-group">
            <label for="pet_age">Pet Age</label>
            <input type="number" name="pet_age" id="pet_age" class="form-control" value="{{ $post->pet_age }}" required>
        </div>
        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ $post->location }}">
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" class="form-control" required>
                <option value="Male" {{ $post->gender == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ $post->gender == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" name="category" id="category" class="form-control" value="{{ $post->category }}">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="active" {{ $post->status == 'active' ? 'selected' : '' }}>Available</option>
                <option value="adopted" {{ $post->status == 'adopted' ? 'selected' : '' }}>Adopted</option>
            </select>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $post->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="Pet Image" style="max-width:150px;margin-top:10px;">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>
@endsection
