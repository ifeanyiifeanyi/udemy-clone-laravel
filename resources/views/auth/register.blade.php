<x-guest-layout>
    <div class="page-content d-flex align-items-center justify-content-center">

        <div class="row w-100 mx-0 auth-page">
            <div class="col-md-8 col-xl-6 mx-auto">
                <div class="card">
                    <div class="row">
                        <div class="col-md-4 pe-md-0">
                            <div class="auth-side-wrapper">

                            </div>
                        </div>
                        <div class="col-md-8 ps-md-0">
                            <div class="auth-form-wrapper px-4 py-5">
                                <a href="#" class="noble-ui-logo logo-light d-block mb-2">Noble<span>UI</span></a>
                                <h5 class="text-muted fw-normal mb-4">Create a free account.</h5>
                                <form class="forms-sample" method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="first_name" class="form-label">First Name</label>
                                        <input type="text" name="first_name"
                                            class="form-control @error('first_name') border-danger @enderror"
                                            id="first_name" autocomplete="Username" placeholder="First Name"
                                            value="{{ old('first_name') }}">
                                        @error('first_name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="last_name" class="form-label">Last Name</label>
                                        <input type="text" name="last_name"
                                            class="form-control @error('last_name') border-danger @enderror"
                                            id="last_name" autocomplete="Username" placeholder="Last Name"
                                            value="{{ old('last_name') }}">
                                        @error('last_name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="other_names" class="form-label">Other Names</label>
                                        <input type="text" name="other_names"
                                            class="form-control @error('other_names') border-danger @enderror"
                                            id="other_names" autocomplete="Username" placeholder="Other Names"
                                            value="{{ old('other_names') }}">
                                        @error('other_names')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" name="username"
                                            class="form-control @error('username') border-danger @enderror"
                                            id="username" autocomplete="Username" placeholder="Username"
                                            value="{{ old('username') }}">
                                        @error('username')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email"
                                            class="form-control @error('email') border-danger @enderror"
                                            id="email" autocomplete="Username" placeholder="Email Address"
                                            value="{{ old('email') }}">
                                        @error('email')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password"
                                            class="form-control @error('password') border-danger @enderror"
                                            id="password" placeholder="Password"
                                            value="{{ old('password') }}">
                                        @error('password')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                                        <input type="password" name="password_confirmation"
                                            class="form-control @error('password_confirmation') border-danger @enderror"
                                            id="password_confirmation" placeholder="Confirm Password"
                                            value="{{ old('password_confirmation') }}">
                                        @error('password_confirmation')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-check mb-3">
                                        <input type="checkbox" class="form-check-input" id="authCheck">
                                        <label class="form-check-label" for="authCheck">
                                            Remember me
                                        </label>
                                    </div>
                                    <div>
                                        <button type="submit"
                                            class="btn btn-primary text-white me-2 mb-2 mb-md-0w-100">Sign up</button>

                                    </div>
                                    <a href="{{ route('login') }}" class="d-block mt-3 text-muted">Already a user? Sign in</a>
                                </form>
                            </div>
                        </div>
                    </div>

</x-guest-layout>
