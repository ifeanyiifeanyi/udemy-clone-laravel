@extends('admin.layouts.admin')

@section('title', 'Dashboard')
@section('css')

@endsection


@section('admin')
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="row">
                <div class="col-md-7">
                    <div class="table-responsive card p-3">
                        <table id="dataTableExample" width="100%">
                            <thead>
                                <tr>
                                    <th>sn</th>
                                    <th>subcategory</th>
                                    <th>Category</th>
                                    <th>action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subCategories as $sub)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ Str::title($sub->subcategory_name) }}</td>
                                        <td>{{ Str::title($sub->category->name) }}</td>
                                        <td style="display: flex">
                                            <a href=""
                                                class="btn btn-primary mr-2">Edit</a>
                                            <form action="" method="POST"
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
                    <form class="card p-3" action="{{ route('admin.subcategory.store') }}" method="POST">
                    <h4>Create sub category</h4>

                        @csrf
                        <div class="form-group mb-3 mt-3">
                            <label for="category_id">Select Category</label>
                            <select class="form-control" id="category_id" name="category_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option {{ old('category_id') ? 'selected' : '' }} value="{{ $category->id }}">
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="subcategory_name">Subcategory Name</label>
                            <input type="text" class="form-control" id="subcategory_name" name="subcategory_name"
                                value="{{ old('subcategory_name') }}" required>
                            @error('subcategory_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('javascript')

@endsection
