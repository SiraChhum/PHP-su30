<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <title>My Website</title>

    <style>
        .navbar-brand {
            font-size: 1.6rem;
            font-weight: bold;
        }
        .hero {
            background: linear-gradient(135deg, #0066cc, #004c99);
        }
        .section-title {
            font-weight: 600;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand text-primary" href="/">MyWebsite</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto me-3">
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('product') }}">Products</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
            </ul>

            <a href="#" class="btn btn-primary px-4">Login</a>
        </div>
    </div>
</nav>

<!-- Content Section -->
<div class="container mt-5">
        <div class="row g-4">
            <div class="col-md-4">
                <h4 class="section-title">Our Products</h4>
                <p>Explore our wide range of products designed to meet your needs. From the latest gadgets to essential accessories, we have it all.</p>
                <p>Browse through our catalog and find the perfect product for you.</p>
            </div>
            <div class="col-md-4">
                <h4 class="section-title">Featured Items</h4>
                <p>Check out our featured items that are trending this season. These products have been handpicked for their quality and popularity.</p>
                <p>Don't miss out on exclusive deals and offers available for a limited time.</p>
            </div>
            <div class="col-md-4">
                <h4 class="section-title">Customer Favorites</h4>
                <p>Discover the products that our customers love the most. Read reviews and ratings to help you make an informed decision.</p>
                <p>Join our community of satisfied customers today!</p>
            </div>
        </div>
</div>

</body>
</html>
