<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Health | Contact Us</title>
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
            line-height: 1.5;
        }

        /* 1. MONDAY TO SUNDAY UTILITY ROW STRIP */
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

        
        .workspace-split-row {
            display: grid;
            grid-template-columns: 1.6fr 1fr;
            gap: 24px; 
            padding-bottom: 24px; 
            align-items: start;
        }

        
        .contact-form-block {
            display: flex;
            flex-direction: column;
            gap: 24px; 
            padding: 24px; 
        }

        .form-row-dual-split {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px; 
        }

        .form-field-control {
            width: 100%;
            padding: 16px 20px;
            border: 1px solid var(--border-muted);
            border-radius: 12px;
            background-color: var(--bg-light);
            font-family: inherit;
            font-size: 16px;
            color: var(--text-dark);
            outline: none;
            transition: border-color 0.2s ease, background-color 0.2s ease;
        }

        .form-field-control:focus {
            border-color: var(--primary-teal);
            background-color: #ffffff;
        }

        .form-field-control::placeholder {
            color: var(--text-muted);
        }

        textarea.form-field-control {
            resize: vertical;
            min-height: 180px;
        }

        
        .submit-action-btn {
            width: 100%;
            background-color: var(--primary-teal);
            color: #ffffff;
            border: none;
            border-radius: 12px;
            padding: 16px;
            font-size: 18px;
            font-weight: 700;
            cursor: pointer;
            text-align: center;
            transition: background-color 0.2s ease;
        }

        .submit-action-btn:hover {
            background-color: var(--primary-hover);
        }

        
        .directory-info-sidebar {
            background-color: var(--card-gray);
            border-radius: 16px;
            padding: 32px 24px;
            display: flex;
            flex-direction: column;
            gap: 32px; 
            margin-top: 24px; 
        }

        .info-card-node {
            display: flex;
            align-items: flex-start;
            gap: 16px; 
        }

        .vector-icon-indicator {
            font-size: 24px;
            line-height: 1;
            flex-shrink: 0;
            padding-top: 2px;
        }

        .node-content-details h4 {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 4px;
            color: var(--text-dark);
        }

        .node-content-details p {
            font-size: 15px;
            color: var(--text-dark);
            font-weight: 500;
            line-height: 1.4;
        }

        /* ADAPTIVE MOBILE & TABLET LAYOUT ENGINE OVERRIDES */
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
            .workspace-split-row {
                grid-template-columns: 1fr;
                gap: 32px;
            }
            .form-row-dual-split {
                grid-template-columns: 1fr;
            }
            .directory-info-sidebar {
                margin-top: 0;
            }
        }

        /* Premium Success Popup styling */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .popup-overlay.active {
            opacity: 1;
            pointer-events: auto;
        }

        .popup-card {
            background: #ffffff;
            border-radius: 20px;
            padding: 40px;
            width: 90%;
            max-width: 420px;
            text-align: center;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transform: scale(0.8);
            transition: transform 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
            position: relative;
            overflow: hidden;
        }

        .popup-overlay.active .popup-card {
            transform: scale(1);
        }

        .popup-icon-circle {
            width: 70px;
            height: 70px;
            background: #e8f7f5;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 24px auto;
            color: #4cb1be;
            font-size: 32px;
            animation: pulse-icon 2s infinite;
        }

        @keyframes pulse-icon {
            0% { box-shadow: 0 0 0 0 rgba(76, 177, 190, 0.4); }
            70% { box-shadow: 0 0 0 15px rgba(76, 177, 190, 0); }
            100% { box-shadow: 0 0 0 0 rgba(76, 177, 190, 0); }
        }

        .popup-card h3 {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 8px;
            color: #111111;
        }

        .popup-card p {
            font-size: 15px;
            color: #555555;
            margin-bottom: 24px;
        }

        .popup-progress-container {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: #ececec;
        }

        .popup-progress-bar {
            height: 100%;
            width: 100%;
            background: linear-gradient(90deg, #4cb1be, #3ca0ad);
            transform-origin: left;
            animation: shrink-bar 3s linear forwards;
        }

        @keyframes shrink-bar {
            from { transform: scaleX(1); }
            to { transform: scaleX(0); }
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
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php" class="active">Contact Us</a></li>
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
        
        
        <h2 class="page-title">Contact Us</h2>


        <div class="workspace-split-row">
            
            
            <form class="contact-form-block" action="save_contact.php" method="POST">
                
            
                <div class="form-row-dual-split">
                    <input type="text" name="name" class="form-field-control" placeholder="Your Name" required>
                    <input type="email" name="email" class="form-field-control" placeholder="Your Email" required>
                </div>
                
                
                <div>
                    <input type="tel" name="phone" class="form-field-control" placeholder="Phone Number">
                </div>
                
                
                <div>
                    <textarea name="message" class="form-field-control" placeholder="Your Message" required></textarea>
                </div>
                
            
                <button type="submit" class="submit-action-btn">Send Message</button>
            </form>

            
            <aside class="directory-info-sidebar">
                
                
                <div class="info-card-node">
                    <span class="vector-icon-indicator">📍</span>
                    <div class="node-content-details">
                        <h4>Physical Address:</h4>
                        <p>123 Health Street,<br>City, Country</p>
                    </div>
                </div>

                
                <div class="info-card-node">
                    <span class="vector-icon-indicator">✉️</span>
                    <div class="node-content-details">
                        <h4>Support Email:</h4>
                        <p>support@e-health.com</p>
                    </div>
                </div>

                
                <div class="info-card-node">
                    <span class="vector-icon-indicator">📞</span>
                    <div class="node-content-details">
                        <h4>Support Phone:</h4>
                        <p>+1 123-455-7899</p>
                    </div>
                </div>

            </aside>

        </div>
    </main>

    <!-- Success Popup Overlay -->
    <div class="popup-overlay" id="successPopup">
        <div class="popup-card">
            <div class="popup-icon-circle">✓</div>
            <h3>Message Sent!</h3>
            <p>Your message was saved successfully. We will contact you soon.</p>
            <div class="popup-progress-container">
                <div class="popup-progress-bar" id="progressBar"></div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('.contact-form-block').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const form = this;
            const submitBtn = form.querySelector('.submit-action-btn');
            const originalBtnText = submitBtn.textContent;
            
            submitBtn.textContent = 'Sending...';
            submitBtn.disabled = true;
            
            const formData = new FormData(form);
            
            fetch('save_contact.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    const popup = document.getElementById('successPopup');
                    const bar = document.getElementById('progressBar');
                    
                    // Reset animation
                    const newBar = bar.cloneNode(true);
                    bar.parentNode.replaceChild(newBar, bar);
                    
                    popup.classList.add('active');
                    form.reset();
                    
                    setTimeout(() => {
                        popup.classList.remove('active');
                    }, 3000);
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while sending the message.');
            })
            .finally(() => {
                submitBtn.textContent = originalBtnText;
                submitBtn.disabled = false;
            });
        });
    </script>
</body>
</html>
