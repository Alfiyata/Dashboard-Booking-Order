<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/website/login.css">
</head>

<body>
    <section class="h-100 w-100" style="box-sizing: border-box; background-color: #f5f5f5">

        <!-- Index -->
        <div class="content-4-1 d-flex flex-column align-items-center h-100 flex-lg-row" style="font-family: 'Poppins', sans-serif">
            <div class="position-relative d-none d-lg-block h-100 width-left">
                <img class="position-absolute img-fluid centered" src="<?= base_url() ?>assets/img/website/nails.png" alt="" />
            </div>
            <div class="d-flex mx-auto align-items-left justify-content-left width-right mx-lg-0">
                <div class="mx-lg-0 mx-auto">
                    <div class="align-items-center justify-content-center d-lg-none d-flex">
                        <img class="img-fluid" src="<?= base_url() ?>assets/img/website/nails.png" alt="" />
                    </div>
                    <h3 class="title-text">Registration Page</h3>
                    <form style="margin-top: 1.5rem" action="<?= site_url('registration/add') ?>" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div style="margin-bottom: 1.75rem">
                                    <label for="" class="d-block input-label">User Name</label>
                                    <div class="d-flex w-100 div-input form-group">
                                        <input class="input-field border-0 form-control" type="text" id="user_name" name="user_name" placeholder="Your Name" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div style="margin-bottom: 1.75rem">
                                    <label for="" class="d-block input-label">Name</label>
                                    <div class="d-flex w-100 div-input form-group">
                                        <input class="input-field border-0 form-control" type="text" id="fullname" name="fullname" placeholder="Your User Name" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div style="margin-bottom: 1.75rem">
                                    <label for="" class="d-block input-label">Your Gender</label>
                                    <div class="d-flex w-100 div-input form-group">
                                        <select name="gender" id="gender" class="form-control border-0" required>
                                            <option value="">Select</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div style="margin-bottom: 1.75rem">
                                    <label for="" class="d-block input-label">Phone Number</label>
                                    <div class="d-flex w-100 div-input form-group">
                                        <input class="input-field border-0 form-control" type="number" id="phone" name="phone" placeholder="Your Phone Number" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div style="margin-bottom: 1.75rem">
                                    <label for="" class="d-block input-label">Address</label>
                                    <div class="d-flex w-100 div-input form-group">
                                        <textarea name="address" id="address" class="form-control border-0" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div style="margin-top: 1rem">
                                    <label for="" class="d-block input-label">Password</label>
                                    <div class="d-flex w-100 div-input form-group">
                                        <input class="input-field border-0" type="password" name="password" id="password" placeholder="Your Password" minlength="6" required />
                                        <div onclick="togglePassword()">
                                            <svg style="margin-left: 0.75rem; cursor: pointer" width="20" height="14" viewBox="0 0 20 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path id="icon-toggle" fill-rule="evenodd" clip-rule="evenodd" d="M0 7C0.555556 4.66667 3.33333 0 10 0C16.6667 0 19.4444 4.66667 20 7C19.4444 9.52778 16.6667 14 10 14C3.31853 14 0.555556 9.13889 0 7ZM10 5C8.89543 5 8 5.89543 8 7C8 8.10457 8.89543 9 10 9C11.1046 9 12 8.10457 12 7C12 6.90536 11.9934 6.81226 11.9807 6.72113C12.2792 6.89828 12.6277 7 13 7C13.3608 7 13.6993 6.90447 13.9915 6.73732C13.9971 6.82415 14 6.91174 14 7C14 9.20914 12.2091 11 10 11C7.79086 11 6 9.20914 6 7C6 4.79086 7.79086 3 10 3C10.6389 3 11.2428 3.14979 11.7786 3.41618C11.305 3.78193 11 4.35535 11 5C11 5.09464 11.0066 5.18773 11.0193 5.27887C10.7208 5.10171 10.3723 5 10 5Z" fill="#CACBCE" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-fill text-white d-block w-100" type="submit">
                            Sign up
                        </button>
                    </form>
                    <p class="text-center bottom-caption">
                        Don't have an account yet?
                        <a href="<?=site_url('/')?>">
                            <span class="green-bottom-caption">Login Here</span>
                        </a>
                    </p>
                </div>
            </div>
        </div>

        <!-- Password toggle -->
        <script>
            function togglePassword() {
                var x = document.getElementById("password");
                if (x.type === "password") {
                    x.type = "text";
                    document
                        .getElementById("icon-toggle")
                        .setAttribute("fill", "#A163FF");
                } else {
                    x.type = "password";
                    document
                        .getElementById("icon-toggle")
                        .setAttribute("fill", "#CACBCE");
                }
            }
        </script>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>