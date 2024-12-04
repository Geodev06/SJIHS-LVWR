<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>

    @include('core.head')
</head>

<body>


    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <x-navbar />


        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <x-sidebar />

            @include('session.messages')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

                    <div class="row">
                        <div class="col-lg-12">
                            <a href="{{ route('admin.user_form') }}" class="btn btn-primary float-right">ADD USER<i class="icon-pencil"></i></a>
                        </div>
                    </div>
                    <livewire:userlist />

                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->

                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

</body>
@include('core.scripts')









</html>