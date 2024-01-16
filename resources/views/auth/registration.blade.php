<x-layout>
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
                                <form class="mx-1 mx-md-4" method="post">
                                    @csrf
                                    <div class="mb-4">
                                        <label class="form-label" for="name">Your Name</label>
                                        <div class="form-outline input-group flex-fill mb-0">
                                            <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
                                            <input type="text" id="name" name="name" class="form-control"/>
                                        </div>
                                    </div>

                                    @error('name')
                                    <div class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror

                                    <div class="mb-4">
                                        <label class="form-label" for="email">Your Email</label>
                                        <div class="form-outline input-group flex-fill mb-0">
                                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                            <input type="email" id="email" name="email" class="form-control"/>
                                        </div>
                                    </div>

                                    @error('email')
                                    <div class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror

                                    <div class="mb-4">
                                        <label class="form-label" for="password">Password</label>
                                        <div class="form-outline input-group flex-fill mb-0">
                                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                            <input type="password" id="password" name="password" class="form-control"/>
                                        </div>
                                    </div>

                                    @error('password')
                                    <div class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror

                                    <div class="mb-4">
                                        <label class="form-label" for="repeat">Repeat your password</label>
                                        <div class="form-outline input-group flex-fill mb-0">
                                            <span class="input-group-text"><i class="bi bi-key"></i></span>
                                            <input type="password" id="repeat" name="repeat" class="form-control"/>
                                        </div>
                                    </div>

                                    @error('repeat')
                                    <div class="alert alert-danger">
                                        {{$message}}
                                    </div>
                                    @enderror

                                    <div class="form-check d-flex justify-content-center mb-5">
                                        <input class="form-check-input me-2" type="checkbox" value=""
                                               id="check" name="check"/>
                                        <label class="form-check-label" for="check">
                                            I agree all statements in <a href="#">Terms of service</a>
                                        </label>
                                    </div>
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" class="btn btn-primary btn-lg">Register</button>
                                    </div>

                                    <div class="d-flex justify-content-center mb-5">
                                        <span>
                                            If you already have an account, you can
                                            <a href="{{route('login')}}">log in</a>
                                        </span>
                                    </div>

                                    <div class="d-flex justify-content-center mb-5">
                                        <span>
                                            Or you can sign up using
                                            <a href="#"><i class="bi bi-facebook"></i></a>
                                        </span>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
