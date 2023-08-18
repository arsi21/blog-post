<x-layout>
    <div class="d-flex justify-content-center">
        <div class="col-12 col-lg-6 mt-3">
            <h1 class="mb-3">Login</h1>
            <form action="{{ route('users.authenticate') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="email">
                    @error('email')
                        <div class="form-text">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="password">
                    @error('password')
                        <div class="form-text">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <input type="submit" value="Login" class="btn btn-primary">
            </form>

            <div class="mt-3 d-flex gap-2">
                <p class="text-secondary">Don't have an account?</p><a href="{{ route('users.create') }}">Register here</a>
            </div>
        </div>
    </div>
</x-layout>