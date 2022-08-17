<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link href="{{ asset('main.css') }}" rel="stylesheet">
        <style>
            .divider:after,
            .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
            }
            .h-custom {
            height: calc(100% - 73px);
            }
            @media (max-width: 450px) {
            .h-custom {
            height: 100%;
            }
            }
        </style>
    </head>
    <body>
        <section class="vh-100">
            <div class="container-fluid h-custom">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-4">
                  <img src="{{ asset('assets/images/login-removebg-preview.png') }}"
                    class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8">
                    <x-auth-validation-errors class="alert alert-danger" :errors="$errors" />
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <p class="lead fw-normal mb-0 me-3">Register An Account</p>
                        </div>

                        <div class="divider d-flex align-items-center my-4">
                        </div>
                        <div class="row">
                            <!-- Firstname input -->
                            <div class="form-outline mb-1 col-md-6">
                                <input type="text" name="firstname" id="form3Example3" class="form-control form-control-lg" placeholder="Enter firtname" required/>

                            </div>

                            <!-- Lastname input -->
                            <div class="form-outline mb-1 col-md-6">
                                <input type="text" name="lastname" id="form3Example3" class="form-control form-control-lg" placeholder="Enter lastname" required/>

                            </div>
                        </div>

                        <div class="row">
                            <!-- gender input -->
                            <div class="form-outline mb-1 col-md-6">
                                <select name="gender" id="form3Example3" class="form-control form-control-lg" required>
                                    <option selected disabled>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <!-- dob input -->
                            <div class="form-outline mb-1 col-md-6">
                                <input type="date" name="dob" id="form3Example3" class="form-control form-control-lg" max="12-12-2015" required/>
                            </div>
                        </div>

                        <div class="row">
                            <!-- phone input -->
                            <div class="form-outline mb-1 col-md-6">
                                <input type="text" name="phone" id="form3Example3" class="form-control form-control-lg" placeholder="Enter phone" required/>

                            </div>

                            <!-- address input -->
                            <div class="form-outline mb-1 col-md-6">
                                <input type="text" name="address" id="form3Example3" class="form-control form-control-lg" placeholder="Enter address" required/>

                            </div>
                        </div>

                        <div class="row">
                            <!-- Username input -->
                            <div class="form-outline mb-1 col-md-6">
                                <input type="text" name="name" id="form3Example3" class="form-control form-control-lg" placeholder="Enter a username" required/>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-1 col-md-6">
                                <input type="email" name="email" id="form3Example3" class="form-control form-control-lg" placeholder="Enter a valid email address" required/>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Password input -->
                            <div class="form-outline mb-3 col-md-6">
                                <input type="password" name="password" id="form3Example4" class="form-control form-control-lg" placeholder="Enter password" required/>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-3 col-md-6">
                                <input type="password" name="password_confirmation" id="form3Example4" class="form-control form-control-lg" placeholder="Enter password confirmation" required/>
                            </div>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">
                                Already have an account? <a href="{{ route('login') }}" class="link-danger">Login</a>
                            </p>
                        </div>

                    </form>
                </div>
              </div>
            </div>
            <div
              class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
              <!-- Copyright -->
              <div class="text-white mb-3 mb-md-0">
                Copyright © 2020. All rights reserved.
              </div>
              <!-- Copyright -->

              <!-- Right -->

              <!-- Right -->
            </div>
        </section>
    </body>
</html>
