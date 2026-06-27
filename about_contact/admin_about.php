<?php
include 'db_connection.php';

$result = $conn->query("SELECT * FROM about_content WHERE id=1");
$row = $result ? $result->fetch_assoc() : null;

// Defensive default values if row doesn't exist
if (!$row) {
    $row = [
        'id' => 1,
        'title' => 'Our Vision For Connected Care',
        'paragraph1' => 'E-Health is dedicated to transforming clinical system synchronization...',
        'paragraph2' => 'We empower healthcare providers with real-time operational dashboard...',
        'mission' => 'To eliminate medical coordination blockages...',
        'vision' => 'To establish the foundational cloud software...',
        'core_values' => 'Absolute database processing speed...'
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Health Admin | Edit About Content</title>
    <style>
        :root {
            --primary-teal: #4cb1be;
            --primary-hover: #3ca0ad;
            --text-dark: #0f172a;
            --text-muted: #64748b;
            --bg-light: #f8fafc;
            --border-slate: #e2e8f0;
            --font-display: 'Outfit', system-ui, sans-serif;
            --font-body: 'Inter', system-ui, sans-serif;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: var(--font-body);
            background-color: var(--bg-light);
            color: var(--text-dark);
            line-height: 1.6;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 40px 20px;
        }

        .dashboard-container {
            width: 100%;
            max-width: 850px;
            background: #ffffff;
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.05);
            border: 1px solid var(--border-slate);
        }

        .dashboard-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 2px solid var(--border-slate);
            padding-bottom: 24px;
            margin-bottom: 32px;
        }

        .dashboard-title h2 {
            font-family: var(--font-display);
            font-size: 28px;
            font-weight: 800;
            color: var(--text-dark);
        }

        .dashboard-title p {
            font-size: 14px;
            color: var(--text-muted);
            margin-top: 4px;
        }

        .view-site-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #ffffff;
            border: 1.5px solid var(--border-slate);
            color: var(--text-dark);
            text-decoration: none;
            padding: 10px 18px;
            border-radius: 12px;
            font-size: 14px;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .view-site-btn:hover {
            border-color: var(--primary-teal);
            color: var(--primary-teal);
            box-shadow: 0 4px 12px rgba(76, 177, 190, 0.08);
        }

        /* Form styling */
        .form-section {
            margin-bottom: 28px;
        }

        .form-section-title {
            font-family: var(--font-display);
            font-size: 18px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            padding: 14px 16px;
            border: 1.5px solid var(--border-slate);
            border-radius: 12px;
            font-family: inherit;
            font-size: 15px;
            color: var(--text-dark);
            background-color: #ffffff;
            outline: none;
            transition: all 0.2s ease;
        }

        .form-control:focus {
            border-color: var(--primary-teal);
            box-shadow: 0 0 0 4px rgba(76, 177, 190, 0.1);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 110px;
        }

        /* Two column layout */
        .grid-2col {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        /* Three column layout */
        .grid-3col {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .save-action-btn {
            background-color: var(--primary-teal);
            color: #ffffff;
            border: none;
            border-radius: 12px;
            padding: 16px;
            width: 100%;
            font-family: var(--font-display);
            font-size: 16px;
            font-weight: 700;
            cursor: pointer;
            text-align: center;
            transition: all 0.2s ease;
            box-shadow: 0 4px 12px rgba(76, 177, 190, 0.2);
            margin-top: 12px;
        }

        .save-action-btn:hover {
            background-color: var(--primary-hover);
            box-shadow: 0 6px 16px rgba(60, 160, 173, 0.3);
            transform: translateY(-1px);
        }

        .save-action-btn:active {
            transform: translateY(1px);
        }

        /* Success Popup overlay style */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.4);
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
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.15);
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
            color: var(--primary-teal);
            font-size: 32px;
            animation: pulse-icon 2s infinite;
        }

        @keyframes pulse-icon {
            0% { box-shadow: 0 0 0 0 rgba(76, 177, 190, 0.4); }
            70% { box-shadow: 0 0 0 15px rgba(76, 177, 190, 0); }
            100% { box-shadow: 0 0 0 0 rgba(76, 177, 190, 0); }
        }

        .popup-card h3 {
            font-family: var(--font-display);
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--text-dark);
        }

        .popup-card p {
            font-size: 15px;
            color: var(--text-muted);
            margin-bottom: 24px;
        }

        .popup-progress-container {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: #f1f5f9;
        }

        .popup-progress-bar {
            height: 100%;
            width: 100%;
            background: linear-gradient(90deg, var(--primary-teal), var(--primary-hover));
            transform-origin: left;
            animation: shrink-bar 3s linear forwards;
        }

        @keyframes shrink-bar {
            from { transform: scaleX(1); }
            to { transform: scaleX(0); }
        }

        /* Adaptive responsiveness */
        @media (max-width: 768px) {
            .grid-2col, .grid-3col {
                grid-template-columns: 1fr;
                gap: 0;
            }
            body {
                padding: 20px 10px;
            }
            .dashboard-container {
                padding: 24px;
            }
        }
    </style>
</head>
<body>

    <div class="dashboard-container">
        
        <!-- Header -->
        <header class="dashboard-header">
            <div class="dashboard-title">
                <h2>Edit About Page</h2>
                <p>Modify E-Health's connected care details and pillars</p>
            </div>
            <a href="about.php" class="view-site-btn">
                <span>View About Page</span> ↗
            </a>
        </header>

        <!-- Form Workspace -->
        <form class="admin-edit-form" action="save_about.php" method="POST">
            
            <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>">

            <!-- Section 1: Main Story Content -->
            <div class="form-section">
                <div class="form-section-title">
                    <span>📖</span> Core Vision & Story
                </div>
                
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control" value="<?= htmlspecialchars($row['title']) ?>" required>
                </div>

                <div class="grid-2col">
                    <div class="form-group">
                        <label for="paragraph1">Paragraph 1</label>
                        <textarea id="paragraph1" name="paragraph1" class="form-control" required><?= htmlspecialchars($row['paragraph1']) ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="paragraph2">Paragraph 2</label>
                        <textarea id="paragraph2" name="paragraph2" class="form-control" required><?= htmlspecialchars($row['paragraph2']) ?></textarea>
                    </div>
                </div>
            </div>

            <!-- Section 2: Strategic Pillars -->
            <div class="form-section">
                <div class="form-section-title">
                    <span>💎</span> Strategic Pillars
                </div>
                
                <div class="grid-3col">
                    <div class="form-group">
                        <label for="mission">Mission Statement</label>
                        <textarea id="mission" name="mission" class="form-control" required><?= htmlspecialchars($row['mission']) ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="vision">Vision Statement</label>
                        <textarea id="vision" name="vision" class="form-control" required><?= htmlspecialchars($row['vision']) ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="core_values">Core Values</label>
                        <textarea id="core_values" name="core_values" class="form-control" required><?= htmlspecialchars($row['core_values']) ?></textarea>
                    </div>
                </div>
            </div>

            <button type="submit" class="save-action-btn">Save Content Changes</button>

        </form>
    </div>

    <!-- Success Popup Overlay -->
    <div class="popup-overlay" id="successPopup">
        <div class="popup-card">
            <div class="popup-icon-circle">✓</div>
            <h3>Changes Saved!</h3>
            <p>Your modifications to the about page content were updated successfully.</p>
            <div class="popup-progress-container">
                <div class="popup-progress-bar" id="progressBar"></div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('.admin-edit-form').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const form = this;
            const submitBtn = form.querySelector('.save-action-btn');
            const originalBtnText = submitBtn.textContent;
            
            submitBtn.textContent = 'Saving Changes...';
            submitBtn.disabled = true;
            
            const formData = new FormData(form);
            
            fetch('save_about.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    const popup = document.getElementById('successPopup');
                    const bar = document.getElementById('progressBar');
                    
                    // Reset progress bar animation
                    const newBar = bar.cloneNode(true);
                    bar.parentNode.replaceChild(newBar, bar);
                    
                    popup.classList.add('active');
                    
                    setTimeout(() => {
                        popup.classList.remove('active');
                    }, 3000);
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while saving.');
            })
            .finally(() => {
                submitBtn.textContent = originalBtnText;
                submitBtn.disabled = false;
            });
        });
    </script>

</body>
</html>