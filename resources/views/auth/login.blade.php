@section('title')
<x-guest-layout>
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
                            <x-auth-session-status class="mb-4" :status="session('status')" />
                            <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
                            <form class="forms-sample" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email address</label>
                                    <input type="email" name="email"
                                        class="form-control @error('email') border-danger @enderror" id="email"
                                        placeholder="Email" value="{{ old('email') }}" autocomplete="username"
                                        autofocus>
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') border-danger @enderror" id="password"
                                        autocomplete="current-password" placeholder="Password">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-check mb-3">
                                    <input type="checkbox" name="remember" class="form-check-input" id="authCheck">
                                    <label class="form-check-label" for="authCheck">
                                        Remember me
                                    </label>
                                </div>
                                <div>
                                    <button type="submit"
                                        class="btn btn-primary me-2 mb-2 mb-md-0 text-white w-100">Login</button>

                                </div>
                                <a href="{{ route('register') }}" class="d-block mt-3 text-info">Not a user? Sign
                                    up</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>
