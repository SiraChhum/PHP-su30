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
            <h4 class="section-title">About Us</h4>
            <p>We are committed to delivering the best products and services to our customers. Our team works tirelessly to innovate and improve.</p>
            <p>Contact us for more information about our offerings and how we can assist you in achieving your goals.</p>
        </div>
        <div class="col-md-4">
            <h4 class="section-title">Our Mission</h4>
            <p>Our mission is to provide high-quality products that meet the needs of our diverse customer base. We strive for excellence in everything we do.</p>
            <p>We believe in building long-term relationships with our clients based on trust, integrity, and mutual success.</p>

        </div>
        <div class="col-md-4">
            <h4 class="section-title">Our Team</h4>
            <p>Our team consists of experienced professionals dedicated to delivering exceptional results. We value collaboration
            and continuous learning to stay ahead in the industry.</p>
            <p>Meet our team members who are passionate about making a difference and driving innovation in_array our field.</p>
        </div>
    </div>
</div>

</body>
</html>
