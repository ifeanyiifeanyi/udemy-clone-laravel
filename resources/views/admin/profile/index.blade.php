@extends('admin.layouts.admin')

@section('title', 'Profile')
@section('css')

@endsection


@section('admin')
<div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="position-relative">
          <figure class="overflow-hidden mb-0 d-flex justify-content-center">
            <img src="{{ asset('bg.jpg') }}" class="rounded-top w-100" style="height: 30vh;object-fit:cover" alt="profile cover">
          </figure>
          <div class="d-flex justify-content-between align-items-center position-absolute top-90 w-100 px-2 px-md-4 mt-n4">
            <div>
              <img class="wd-70 rounded-circle img-thumbnail" src="{{ $user->photo }}" alt="profile">
              <span class="h4 ms-3 text-dark">{{ $user->full_name }}</span>
            </div>
            <div class="d-none d-md-block">
              <button class="btn btn-primary btn-icon-text">
                <i data-feather="edit" class="btn-icon-prepend"></i> Edit profile
              </button>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-center p-3 rounded-bottom">
          <ul class="d-flex align-items-center m-0 p-0">

            <li class="ms-3 ps-3 border-start d-flex align-items-center">
              <i class="me-1 icon-md" data-feather="user"></i>
              <a class="pt-1px d-none d-md-block text-body" href="#">About</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="row profile-body">
    <!-- left wrapper start -->
    <div class=" d-md-block col-md-12 col-xl-12">
        <div class="card">
            <div class="card-header">
                <h4>Update Profile</h4>
            </div>
            <div class="card-body">
                @include('admin.profile.form')
            </div>
        </div>
    </div>
    <!-- left wrapper end -->


  </div>
@endsection


@section('javascript')
<script>
    function changeImg(input) {
        let preview = document.getElementById('previewImage');
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
  </script>
@endsection
