<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Schools</title>

    @include('core.head')
    @livewireStyles
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <x-navbar />
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <x-sidebar />
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">

             
                    <livewire:schoolform action="{{ $action ?? encrypt(1) }}"  id="{{ $id ?? null }}"  />

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
@livewireScripts


</html>