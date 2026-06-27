<?php
include 'db_connection.php';
$result = $conn->query("SELECT * FROM about_content WHERE id=1");
$row = $result ? $result->fetch_assoc() : null;


if (!$row) {
    $row = [
        'title' => 'Our Vision For Connected Care',
        'paragraph1' => 'E-Health is dedicated to transforming clinical system synchronization. By bringing patients, verified medical doctors, and booking management modules into an integrated interface, we remove administrative friction from healthcare tracking workflows.',
        'paragraph2' => 'We empower healthcare providers with real-time operational dashboard instruments, and offer users simple, stress-free channel matchmaking parameters that remain active 24 hours a day, 7 days a week.',
        'mission' => 'To eliminate medical coordination blockages globally by delivering accessible, responsive, and reliable connection points across every user session.',
        'vision' => 'To establish the foundational cloud software layout configuration that powers medical records transparency and quick, distributed booking pipelines.',
        'core_values' => 'Absolute database processing speed, strict information encryption compliance, and functional platform simplicity drive every update layer we launch.'
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Health | About Us</title>
    <style>
        
        :root {
            --primary-teal: #4cb1be;
            --primary-hover: #3ca0ad;
            --text-dark: #111111;
            --text-muted: #555555;
            --bg-light: #f5f5f5;
            --card-gray: #ececec;
            --border-muted: #777777;
            --font-stack: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: var(--font-stack);
            background-color: #ffffff;
            color: var(--text-dark);
            line-height: 1.6;
        }

        
        .top-utility-bar {
            background-color: var(--primary-teal);
            color: var(--text-dark);
            text-align: center;
            padding: 10px 20px;
            font-size: 14px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        
        .main-header {
            background-color: var(--card-gray);
            border-bottom: 1px solid var(--border-muted);
            padding: 15px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo-block {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-circle-icon {
            width: 40px;
            height: 40px;
            background-color: #ffffff;
            border-radius: 50%;
        }

        .logo-text {
            font-size: 28px;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .nav-menu-links {
            display: flex;
            list-style: none;
            gap: 20px;
        }

        .nav-menu-links a {
            color: var(--text-dark);
            text-decoration: none;
            font-weight: 600;
            font-size: 15px;
            transition: color 0.2s ease;
        }

        .nav-menu-links a:hover, .nav-menu-links a.active {
            color: var(--primary-hover);
        }

        
        .layout-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        
        .page-title {
            text-align: center;
            font-size: 44px;
            font-weight: 700;
            padding: 24px 0; 
        }

        
        .about-workspace-row {
            display: grid;
            grid-template-columns: 1.4fr 1fr;
            gap: 24px; 
            padding-bottom: 24px;
            align-items: center;
        }

        .about-story-content {
            padding: 24px;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .about-story-content h3 {
            font-size: 28px;
            font-weight: 700;
            color: var(--text-dark);
        }

        .about-story-content p {
            font-size: 16px;
            color: #333333;
        }

        
        .about-graphic-placeholder {
            background-color: var(--card-gray);
            border-radius: 16px;
            height: 320px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 64px;
            border: 1px solid var(--border-muted);
            box-shadow: inset 0 0 20px rgba(0,0,0,0.02);
        }

        
        .pillars-section-wrapper {
            background-color: var(--bg-light);
            padding: 40px 24px;
            border-radius: 16px;
            margin: 24px 0 60px 0;
            border: 1px solid #e0e0e0;
        }

        .pillars-flex-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px; /* 24px structural item box separation */
        }

        .pillar-data-card {
            background-color: #ffffff;
            border: 1px solid var(--border-muted);
            border-radius: 12px;
            padding: 32px 24px;
            text-align: center;
            transition: transform 0.2s ease, border-color 0.2s ease;
        }

        .pillar-data-card:hover {
            transform: translateY(-4px);
            border-color: var(--primary-teal);
            box-shadow: 0 8px 16px rgba(0,0,0,0.05);
        }

        .pillar-vector-symbol {
            font-size: 36px;
            margin-bottom: 12px;
            display: inline-block;
        }

        .pillar-data-card h4 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--text-dark);
        }

        .pillar-data-card p {
            font-size: 14px;
            color: var(--text-muted);
            line-height: 1.5;
        }

        
        @media (max-width: 850px) {
            .main-header {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            .nav-menu-links {
                flex-wrap: wrap;
                justify-content: center;
                gap: 12px;
            }
            .about-workspace-row {
                grid-template-columns: 1fr;
                gap: 32px;
            }
            .about-graphic-placeholder {
                height: 240px;
                order: -1; 
            }
        }
    </style>
</head>
<body>

    
    <div class="top-utility-bar">
        MONDAY TO SUNDAY- 24h SERVICE
    </div>

    
    <header class="main-header">
        <div class="logo-block">
            <div class="logo-circle-icon"></div>
            <h1 class="logo-text">E - HEALTH</h1>
        </div>
        <nav>
            <ul class="nav-menu-links">
                <li><a href="#">Home</a></li>
                <li><a href="about.php" class="active">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="#">Account</a></li>
                <li><a href="#">Login</a></li>
                <li><a href="#">Doctor</a></li>
                <li><a href="#">Booking</a></li>
                <li><a href="#">My Booking</a></li>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">List</a></li>
            </ul>
        </nav>
    </header>

    
    <main class="layout-container">
        
        
        <h2 class="page-title">About Us</h2>

        
        <div class="about-workspace-row">
            
            <article class="about-story-content">
                <h3><?= htmlspecialchars($row['title'] ?? '') ?></h3>
                <p><?= nl2br(htmlspecialchars($row['paragraph1'] ?? '')) ?></p>
                <p><?= nl2br(htmlspecialchars($row['paragraph2'] ?? '')) ?></p>
            </article>

            
            <div class="about-graphic-placeholder">
                <img src="images.jfif">
            </div>

        </div>

        
        <section class="pillars-section-wrapper">
            <div class="pillars-flex-grid">
                
                
                <div class="pillar-data-card">
                    <span class="pillar-vector-symbol">🎯</span>
                    <h4>Our Mission</h4>
                    <p><?= nl2br(htmlspecialchars($row['mission'] ?? '')) ?></p>
                </div>

                
                <div class="pillar-data-card">
                    <span class="pillar-vector-symbol">👁️</span>
                    <h4>Our Vision</h4>
                    <p><?= nl2br(htmlspecialchars($row['vision'] ?? '')) ?></p>
                </div>

                
                <div class="pillar-data-card">
                    <span class="pillar-vector-symbol">🛡️</span>
                    <h4>Core Values</h4>
                    <p><?= nl2br(htmlspecialchars($row['core_values'] ?? '')) ?></p>
                </div>

            </div>
        </section>

    </main>

</body>
</html>
