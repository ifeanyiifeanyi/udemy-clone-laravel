@extends('admin.layouts.admin')

@section('title', 'Categories')

@section('admin')
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="row">
                <div class="col-md-7">
                    <div class="card table-responsive py-3 px-3">
                        <table id="dataTableExample">
                            <thead>
                                <tr>
                                    <th>sn</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td><img src="{{ asset($category->image) }}" alt="Category Image"
                                                style="width: 50px;"></td>
                                        <td  style="display: flex">
                                            <a href="{{ route('admin.category.edit', $category->id) }}"
                                                class="btn btn-primary mr-2">Edit</a>
                                            <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-5">
                    <form action="{{ isset($categoryEdit) ? route('admin.category.update', $categoryEdit->id) : route('admin.category.store') }}" method="POST" class="card py-3 px-3" enctype="multipart/form-data">
                        @csrf
                        @if(isset($categoryEdit))
                            @method('PUT')
                        @endif
                        <div class="form-group mb-3">
                            <input type="text" class="form-control" name="name" id="categoryName"
                                placeholder="Enter category name" value="{{ old('name', $categoryEdit->name ?? '') }}">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="image">Category Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                            @error('image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            @if(isset($categoryEdit) && $categoryEdit->image)
                                <div>
                                    <img src="{{ asset($categoryEdit->image) }}" alt="Category Image"
                                         style="width: 100px; margin-top: 10px;">
                                </div>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">
                            {{ isset($categoryEdit) ? 'Update Category' : 'Add Category' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
