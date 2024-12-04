<div class="row mt-5">
    <div class="col-lg-12 mt-5">
       
    </div>
    <div class="col-lg-3 mb-2">
        <div class="card skeleton-loading" style="border-radius: 4px;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0"></h4>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 mb-2">
        <div class="card skeleton-loading" style="border-radius: 4px;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0"></h4>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 mb-2">
        <div class="card skeleton-loading" style="border-radius: 4px;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0"></h4>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 mb-2">
        <div class="card skeleton-loading" style="border-radius: 4px;">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4 class="font-weight-bold mb-0"></h4>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Skeleton loading effect */
        .skeleton-loading {
            background: #f0f0f0;
            /* Light gray background */
            position: relative;
            overflow: hidden;
        }

        .skeleton-loading::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, rgba(255, 255, 255, 0) 0%, rgba(220, 220, 220, 0.4) 50%, rgba(255, 255, 255, 0) 100%);
            animation: loading 1.5s infinite;
        }

        /* Keyframe animation for the loading effect */
        @keyframes loading {
            0% {
                left: -100%;
            }

            50% {
                left: 100%;
            }

            100% {
                left: -100%;
            }
        }
    </style>
</div>