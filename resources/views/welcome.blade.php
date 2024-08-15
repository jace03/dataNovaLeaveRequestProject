<!DOCTYPE html>
<html>
<head>
    <title>Welcome to Datanova</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
body {
    background-color: #f8f9fa;
}
.welcome-header {
    margin-top: 50px;
    margin-bottom: 20px;
}
.welcome-buttons {
    margin-bottom: 40px;
}
.carousel {
    margin-bottom: 20px;
}
.carousel-item img {
    height: 200px;
    object-fit: contain;
    border: 2px solid #dee2e6;
    border-radius: 5px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    cursor: pointer;
}
.carousel-control-prev-icon,
.carousel-control-next-icon {
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 50%;
}
.column-border {
    border: 2px solid #dee2e6;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 15px;
    background-color: #fff;
}
</style>
<body>
    <div class="container">
        <h1 class="text-center welcome-header">Welcome to My Leave Request Use Case for Datanova</h1>
        <p class="text-center mb-4">Explore and manage leave requests through our intuitive table interfaces.</p>
        <div class="row text-center welcome-buttons">
            <div class="col-md-6 mb-4">
                <div class="column-border">
                    <!-- Button to navigate to React table -->
                    <a href="http://localhost:3000" class="btn btn-primary mb-3">View React Table</a>
                    <!-- Carousel for React Table -->
                    <div id="reactCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <!-- Add your images here -->
                            <div class="carousel-item active">
                                <img src="{{ asset('images/editReact.png') }}" class="d-block w-100" alt="React Edit Request Page" data-bs-toggle="modal" data-bs-target="#reactModal1">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/reactTable.png') }}" class="d-block w-100" alt="React Leave Request Table" data-bs-toggle="modal" data-bs-target="#reactModal2">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/reactCode.png') }}" class="d-block w-100" alt="React Leave Code Example" data-bs-toggle="modal" data-bs-target="#reactModal2">
                            </div>
                            <!-- Add more images as needed -->
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#reactCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#reactCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="column-border">
                    <!-- Button to navigate to Laravel table -->
                    <a href="{{ route('leave-requests.index') }}" class="btn btn-secondary mb-3">View Laravel Table</a>
                    <!-- Carousel for Laravel Table -->
                    <div id="laravelCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <!-- Add your images here -->
                            <div class="carousel-item active">
                                <img src="{{ asset('images/editLaravel.png') }}" class="d-block w-100" alt="Laravel Edit Request Page" data-bs-toggle="modal" data-bs-target="#laravelModal1">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/laravelTable.png') }}" class="d-block w-100" alt="Laravel Leave Request Table" data-bs-toggle="modal" data-bs-target="#laravelModal2">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/laravelCode.png') }}" class="d-block w-100" alt="Laravel Leave Code Example" data-bs-toggle="modal" data-bs-target="#laravelModal2">
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/laravelCodeSeeder.png') }}" class="d-block w-100" alt="Laravel Leave Code Example" data-bs-toggle="modal" data-bs-target="#laravelModal2">
                            </div>
                            <!-- Add more images as needed -->
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#laravelCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#laravelCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals for React Images -->
    <div class="modal fade" id="reactModal1" tabindex="-1" aria-labelledby="reactModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reactModalLabel1">React Code Image 1</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('images/editReact.png') }}" class="img-fluid" alt="React Code Image 1">
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="reactModal2" tabindex="-1" aria-labelledby="reactModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reactModalLabel2">React Code Image 2</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('images/reactTable.png') }}" class="img-fluid" alt="React Code Image 2">
                </div>
            </div>
        </div>
    </div>

    <!-- Modals for Laravel Images -->
    <div class="modal fade" id="laravelModal1" tabindex="-1" aria-labelledby="laravelModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="laravelModalLabel1">Laravel Code Image 1</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('images/editLaravel.png') }}" class="img-fluid" alt="Laravel Code Image 1">
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="laravelModal2" tabindex="-1" aria-labelledby="laravelModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="laravelModalLabel2">Laravel Code Image 2</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="{{ asset('images/laravelTable.png') }}" class="img-fluid" alt="Laravel Code Image 2">
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
