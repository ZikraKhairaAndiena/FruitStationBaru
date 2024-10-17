@extends('customer.layouts.main')

@section('content')
<section class="h-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-6">
                <div class="card rounded-3 text-black">
                    <div class="row g-0">
                        <div class="col-lg-12">
                            <div class="card-body p-md-5 mx-md-4">
                                <div class="text-center">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/lotus.webp"
                                        style="width: 185px;" alt="logo">
                                    <h4 class="mt-1 mb-5 pb-1">Create an account</h4>
                                </div>

                                <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="form-outline mb-4">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Your Name" style="border-radius: 30px; border: 1px solid #ccc; padding: 10px 15px;" />
                                        <label class="form-label">Name</label>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Your Email" style="border-radius: 30px; border: 1px solid #ccc; padding: 10px 15px;" />
                                        <label class="form-label">Email</label>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Password" style="border-radius: 30px; border: 1px solid #ccc; padding: 10px 15px;" />
                                        <label class="form-label">Password</label>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" name="password_confirmation" class="form-control"
                                            placeholder="Password Confirm" style="border-radius: 30px; border: 1px solid #ccc; padding: 10px 15px;" />
                                        <label class="form-label">Password Confirm</label>
                                    </div>

                                    <img src="{{ captcha_src() }}" alt="captcha">
                                    <div class="mt-2"></div>
                                    <input
                                        type="text" name="captcha" class="form-control @error('captcha') is-invalid @enderror" placeholder="Please Insert Captch"
                                        >
                                     @error('captcha')
                                     <div class="invalid-feedback">{{ $message }}</div> @enderror

                                    <div class="form-check d-flex justify-content-center mb-5">
                                        <input class="form-check-input me-2" type="checkbox" name="terms" value="1" />
                                        <label class="form-check-label">
                                            I agree to all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                                        </label>
                                    </div>

                                    <div class="text-center pt-1 mb-5 pb-1">
                                        <button type="submit" class="btn btn-primary btn-block fa-lg mb-3"
                                            style="background: linear-gradient(to right, #ff416c, #ff4b2b); border: none; border-radius: 30px; padding: 10px 20px;">
                                            Register
                                        </button>
                                    </div>

                                    <div class="d-flex align-items-center justify-content-center pb-4">
                                        <p class="mb-0 me-2">Already have an account?</p>
                                        <a href="{{ route('login') }}" class="btn btn-outline-danger" style="border-radius: 30px;">
                                            Login Here
                                        </a>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
