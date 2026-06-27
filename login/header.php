php
<!DOCTYPE html>
<html lang="ta">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Health Medical Booking</title>
    <style>
        /* Reset & Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', Arial, sans-serif;
            scroll-behavior: smooth;
        }
        body {
            background-color: #f8fafc;
            color: #334155;
            overflow-x: hidden;
        }
        /* --- டாப் பேனர் (Top Banner) --- */
        .top-banner {
            background: linear-gradient(135deg, #0f766e, #0d9488);
            color: #ffffff;
            text-align: center;
            padding: 12px 0;
            font-size: 14px;
            font-weight: bold;
            letter-spacing: 1px;
        }
        /*  Navbar */
        .navbar {
            background-color: #ffffff;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 50px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .logo-section {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .logo-image {
            width: 45px;
            height: 45px;
            object-fit: contain;
        }
        .logo-section h1 {
            font-size: 24px;
            color: #0f766e;
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        .nav-links {
            list-style: none;
            display: flex;
            align-items: center;
        }
        .nav-links li {
            margin-left: 25px;
        }
        .nav-links a {
            text-decoration: none;
            color: #64748b;
            font-weight: 600;
            font-size: 15px;
            transition: color 0.3s ease;
        }
        .nav-links a:hover {
            color: #0d9488;
        }
        /* mobail style */
        @media (max-width: 768px) {
            .navbar { padding: 15px 20px; flex-direction: column; gap: 15px; }
            .nav-links { flex-wrap: wrap; justify-content: center; gap: 10px; }
            .nav-links li { margin-left: 10px; margin-right: 10px; }
        }
    </style>
</head>
<body>
    <div class="top-banner">
        MONDAY TO SUNDAY - 24h SERVICE
    </div>

    <nav class="navbar">
        <div class="logo-section">
            <img src="health.png" alt="Logo" class="logo-image">
            <h1>E - HEALTH</h1>
        </div>
        <ul class="nav-links">
            <li><a href="C:\xampp\htdocs\ehealth\pages\index.php">Home</a></li>
            <li><a href="About Us.html">About us</a></li>
            <li><a href="account.html">Account</a></li>
            <li><a href="login.html">Login</a></li>
            <li><a href="doctors.html">Doctor</a></li>
            <li><a href="appointment.html">Booking</a></li>
            <li><a href="my-booking.html">My Booking</a></li>
            <li><a href="index.html">Dashboard</a></li>
            <li><a href="#">List</a></li>
            <li><a href="contact us.html">Contact us</a></li>
        </ul>
    </nav>