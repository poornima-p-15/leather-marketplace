<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Leather Marketplace</title>

  <!-- Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
  />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&family=Playfair+Display:wght@600&display=swap" rel="stylesheet" />

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f8f8;
      margin: 0;
      padding: 0;
      overflow-x: hidden;
    }

    /* Navbar */
    .navbar {
      background-color: #333 !important;
    }

    .navbar-brand {
      font-weight: 600;
      color: #fff !important;
      font-family: 'Playfair Display', serif;
      font-size: 24px;
    }

    .navbar-nav .nav-link {
      color: white !important;
      font-weight: 500;
      transition: 0.3s;
    }

    .navbar-nav .nav-link:hover {
      color: #ffba73 !important;
    }

    .btn-login {
      background-color: #654321;
      color: #fff;
      border-radius: 8px;
      padding: 8px 20px;
      font-weight: 500;
      transition: 0.3s;
      margin-left: 15px;
    }

    .btn-login:hover {
      background-color: #ffba73;
      color: #333;
    }

    /* Banner Section */
    .banner {
      background: url('assets/images/banner.jpg') center/cover no-repeat;
      color: white;
      text-align: center;
      padding: 140px 20px;
      animation: kenburns-top 20s ease-in-out infinite alternate;
    }

    .banner h2 {
      font-size: 48px;
      font-family: 'Playfair Display', serif;
      margin-bottom: 10px;
      text-shadow: 2px 2px 8px rgba(0,0,0,0.6);
    }

    .banner p {
      font-size: 20px;
      margin-bottom: 25px;
      text-shadow: 1px 1px 5px rgba(0,0,0,0.5);
    }

    .btn-custom {
      background-color: #654321;
      color: #fff;
      border-radius: 8px;
      padding: 10px 25px;
      font-weight: 500;
      transition: 0.3s;
    }

    .btn-custom:hover {
      background-color: #ffba73;
      color: #333;
    }

    /* Search and Products */
    .section-title {
      font-family: 'Playfair Display', serif;
      margin-bottom: 20px;
      font-size: 30px;
    }

    .search-box input {
      width: 60%;
      max-width: 400px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .product-card {
      background: white;
      padding: 15px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      transition: transform 0.3s;
    }

    .product-card:hover {
      transform: translateY(-5px);
    }

    .product-card img {
      width: 100%;
      border-radius: 10px;
    }

    footer {
      background-color: rgba(51, 51, 51, 0.95);
      color: white;
      text-align: center;
      padding: 25px 15px;
      margin-top: 40px;
      width: 100%;
      font-size: 14px;
      border-top: 2px solid #ffba73;
    }

    .breadcrumb{
      color:black;
      padding:10px 40px;
      font-size:14px;
    }

    .breadcrumb a{
      color:#873030;
      text-decoration:none;
      margin:0 5px;
    }

    .breadcrumb a:hover{
      text-decoration:underline;
    }

    .book{
      background: url('assets/images/bt.jpg') center/cover no-repeat;
      background-repeat:no-repeat;
      background-size:cover;
      height:400px;
      display:flex;
      justify-content:space-between;
      align-items:center;
      margin:70px 100px 10px;
      position:relative;
      border-radius:10px;
      padding:30px;
    }

    .book p{
      background-color:rgba(255, 248, 245, 0.8);
      font-size: 20px;
      color: #574144;
      padding: 20px;
      border-left:5px solid #574144;
      font-style:italic;
      max-width:100%;
    }

    .book .breadcrumb {
      position:absolute;
      margin-top:15px;
      margin-left:25px;
      left:25px;
      font-size:18px;
      background-color:rgba(255,255,255,0.7);
      padding:5px 10px;
      border-radius:5px;
    }

    .book img {
      max-height: 300px;
      border-radius:10px;
    }

    /* Animations */
    @keyframes kenburns-top {
      0% {
        transform: scale(1) translateY(0);
        transform-origin: 50% 16%;
      }
      100% {
        transform: scale(1.2) translateY(-15px);
        transform-origin: top;
      }
    }

    /* Responsive Fixes */
    @media (max-width: 768px) {
      .banner h2 { font-size: 32px; }
      .banner p { font-size: 16px; }
      .product-card h4 { font-size: 16px; }
      .section-title { font-size: 26px; }
      footer { font-size: 13px; }
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark sticky-top">
    <div class="container">
      <a class="navbar-brand" href="#">Leather Marketplace</a>
      <div class="d-flex">
        <a href="login.html" class="btn btn-login">Login</a>
      </div>
    </div>
  </nav>

  <!-- Banner -->
  <section class="banner">
    <div class="container">
      <h2 class="text-shadow-drop-bl">Buy & Sell Leather Easily</h2>
      <p>Find quality leather or sell your own products.</p>
      <a href="please-login.html" class="btn btn-custom">Browse Listings</a>
    </div>
  </section>

  <!-- Search & Products -->
  <div class="container text-center mt-5 pt-5">
    <h2 class="section-title">Find Your Leather Product</h2>

    <form action="please-login.html" method="GET" class="search-box mb-4">
      <input type="text" name="search" placeholder="Search for products..." />
      <button type="submit" class="btn btn-custom ms-2">Search</button>
    </form>

    <h2 class="section-title mt-4 pt-4">Find your Products</h2>

    <div class="row g-4 justify-content-center">
      <div class="col-md-4 col-sm-6">
        <div class="product-card" data-name="Premium Leather">
          <img src="assets/images/leather1.jpg" alt="Leather Product 1">
          <h4 class="mt-3">Premium Leather</h4>
        </div>
      </div>

      <div class="col-md-4 col-sm-6">
        <div class="product-card" data-name="Genuine Leather Bag">
          <img src="assets/images/leather2.jpg" alt="Leather Product 2">
          <h4 class="mt-3">Genuine Leather Bag</h4>
        </div>
      </div>

      <div class="col-md-4 col-sm-6">
        <div class="product-card" data-name="Leather Wallet">
          <img src="assets/images/leather3.jpg" alt="Leather Wallet">
          <h4 class="mt-3">Leather Wallet</h4>
        </div>
      </div>
      <div class="breadcrumb">
        <span>Home</span> &RightArrow; <a href="please-login.html">View All</a>
      </div>
    </div>

    <h2 class="section-title mt-4 pt-4">Sell your Products</h2>

    <!-- Leather Story Section with Video Background -->
    <section class="position-relative d-flex align-items-stretch" style="overflow: hidden; height: 500px; margin: 50px 0;">

      <!-- Left Video -->
      <div class="flex-shrink-0" style="flex: 1; min-width: 300px; max-width: 60%; height: 100%;">
        <iframe width="100%" height="100%" 
                src="https://www.youtube.com/embed/hGyMTtdQwT8?si=kgZUQj2F6yRmgjBy" 
                title="YouTube video player" frameborder="0" 
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen
                style="border-radius: 10px; height: 100%; width: 100%;"></iframe>
      </div>

      <!-- Right Poem Content -->
      <div class="flex-grow-1 d-flex align-items-center justify-content-end pe-5" style="flex: 1; min-width: 250px; height: 100%;">
        <div class="bg-light bg-opacity-50 p-4 rounded-4 shadow-sm"
             style="max-width: 480px; border-left: 5px solid #654321;">
          <h3 class="mb-3" style="font-family: 'Playfair Display', serif; color: #654321; font-size: 22px;">
            The Story of Leather
          </h3>
          <p style="font-size: 16px; color: #574144; font-style: italic; line-height: 1.8;">
            “Born from craftsmanship and carried through generations, leather tells a story 
            in every grain and scar. In this marketplace, tradition meets modern creation — 
            where every thread whispers resilience, and every product holds the mark of human touch. 
            Here, leather isn’t just sold — it’s reborn into art, strength, and timeless beauty.”
          </p>
        </div>
      </div>

    </section>

    <div class="breadcrumb">
      <span>Home</span> &RightArrow; <a href="please-login.html">Sell on Leathora</a>
    </div>
  </div>

  <!-- Footer -->
  <footer>
    <p>&copy; 2025 Leather Marketplace<br>Poornima P | 23BCA0155<br>J Kaviya | 23BCA0170</p>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
