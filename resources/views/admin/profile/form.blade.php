<div class="row">
    <div class="col-md-7">
        <form action="{{ route('admin.profile.update', $user) }}" class="form form-horizontal shadow card p-3"
            method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="Enter username" autocomplete="username"
                            value="{{ old('username', $user->username ?? '') }}">
                        @error('username')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                            placeholder="Enter first name" autocomplete="username"
                            value="{{ old('first_name', $user->first_name ?? '') }}">
                        @error('first_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                            placeholder="Enter last name" value="{{ old('last_name', $user->last_name ?? '') }}">
                        @error('last_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="other_names">Other Names</label>
                        <input type="text" name="other_names" id="other_names" class="form-control"
                            value="{{ old('last_name', $user->other_names ?? '') }}">
                        @error('other_names')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="phone">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control"
                            value="{{ old('email', $user->email ?? '') }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="phone">Phone Number</label>
                        <input type="tel" name="phone" id="phone" class="form-control"
                            value="{{ old('phone', $user->phone ?? '') }}">
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control"
                            value="{{ old('address', $user->address ?? '') }}">
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <label for="photo">Profile Image</label>
                        <input onChange="changeImg(this)" accept="image/*" type="file" name="photo" id="photo"
                            class="form-control" value="{{ old('photo', $user->photo ?? '') }}">
                        @error('photo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="container">
                            <img id="previewImage" class="img-responsive w-25"
                                src="{{ old('photo', $user->photo ?? '') }}" alt="Profile Image">
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>

        </form>
    </div>
    <div class="col-md-5">
        <form id="form" action="{{ route('admin.profile.password.update', $user) }}" class="shadow p-3 card" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group mb-3"><!-- middle wrapper start -->
                <label for="password">Current Password</label>
                <input type="password" class="form-control @error('current_password') border-danger @enderror"
                    id="current_password" name="current_password" placeholder="Enter current password">
                @error('current_password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3"><!-- middle wrapper start -->
                <label for="password">Current Password</label>
                <input type="password" class="form-control @error('password') border-danger @enderror" id="password"
                    name="password" placeholder="Enter new password">
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3"><!-- middle wrapper start -->
                <label for="password_confirmation">Confirm password</label>
                <input type="password" class="form-control @error('password_confirmation') border-danger @enderror"
                    id="password_confirmation" name="password_confirmation" placeholder="Confirm password">

            </div>
            <button class="btn btn-primary">Update Password</button>
        </form>
    </div>
</div>
