<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>


    @include('core.head')
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row flex-grow">
                    <div class="col-lg-3 col-md-8 col-sm-12 mx-auto">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo">

                            </div>
                            <h4>Hello! let's get started</h4>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <form class="pt-3" id="form_user">
                                <div class="form-group">
                                    @csrf
                                    <label for="">Email address</label>
                                    <br>
                                    <span class="text-danger error-email error-text"></span>
                                    <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <br>
                                    <span class="text-danger error-password error-text"></span>
                                    <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" id="btn_sign_in">SIGN IN</button>
                                </div>
                                <div class="my-2 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->

    @include('core.scripts')
</body>

<script>
    // Updated event listener for form submission
    $('#form_user').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission
        start_loading(); // Start loading animation

        send_request('POST', '/user-auth', $(this).serialize(), function(xhr) {
            // Handle before sending request (if needed)
        }, function(res) {
            if (res.success == false) {

                handle_form_response(res, '#form_user'); // Handle response and display errors
            }

            if (res.success == true) {
                toastr.success(res.msg)
                clear_error()
                $('#form_user')[0].reset()
                window.location.replace(res.link)
            }

            stop_loading(); // Stop loading animation after the response is handled
        }, function(xhr, status, err) {
            toastr.error(xhr.responseJSON.errors)

            stop_loading(); // Ensure loading animation stops on error
        });
    });
</script>

</html>