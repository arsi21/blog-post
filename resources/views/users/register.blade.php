<x-layout>
    <div class="d-flex justify-content-center">
        <div class="col-12 col-lg-6 mt-3">
            <h1 class="mb-3">Register</h1>
            <form action="{{ route('users.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name">
                    @error('name')
                        <div class="form-text">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
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
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" id="password_confirmation">
                    @error('password_confirmation')
                        <div class="form-text">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <input type="submit" value="Register" class="btn btn-primary">
            </form>

            <div class="mt-3 d-flex gap-2">
                <p class="text-secondary">Already have an account?</p><a href="{{ route('login') }}">Login here</a>
            </div>
        </div>
    </div>
</x-layout>