<?php include 'header.php'; ?>

<style>
    .hero {
        background: linear-gradient(rgba(15, 118, 110, 0.85), rgba(13, 148, 136, 0.75)), 
                    url('https://img.freepik.com/free-photo/modern-hospital-hallway_23-2150774391.jpg') no-repeat center center/cover;
        padding: 80px 20px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .hero-content {
        background-color: #e7dcdef5;
        backdrop-filter: blur(5px);
        width: 80%; max-width: 800px; text-align: center; padding: 60px 40px; border-radius: 20px; color: #ffffff;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1); border: 1px solid rgba(255, 255, 255, 0.2);
    }
    .hero-content h1 { font-size: 45px; font-weight: 700; margin-bottom: 15px; text-shadow: 0 2px 4px rgba(0,0,0,0.2); }
    .hero-content p { font-size: 20px; margin-bottom: 30px; opacity: 0.95; }
    #bookBtn {
        background-color: rgb(234, 231, 243); color: #1c0970; border: none; padding: 16px 35px; font-size: 18px; font-weight: 600;
        border-radius: 50px; cursor: pointer; box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, background-color 0.3s ease, box-shadow 0.3s ease;
    }
    #bookBtn:hover { transform: translateY(-3px); background-color: rgb(182, 15, 15); box-shadow: 0 15px 25px rgba(0, 0, 0, 0.15); }
    .land-sections { padding: 70px 8%; }
    #feature-cont { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 30px; }
    .feature-card { background: #ffffff; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05); transition: transform 0.3s ease, box-shadow 0.3s ease; }
    .feature-card:hover { transform: translateY(-5px); box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); }
    .feature-img img { width: 100%; height: 200px; object-fit: cover; }
    .feature-desc { padding: 20px; text-align: center; }
    .feature-desc h3 { font-size: 18px; color: #1e293b; margin-bottom: 8px; font-weight: 600; }
    .feature-desc p { font-size: 14px; color: #0d9488; font-weight: 500; }
    #consult-head { text-align: center; margin-bottom: 45px; }
    #consult-head h2 { font-size: 32px; color: #0f766e; margin-bottom: 10px; font-weight: 700; }
    #consult-head p { color: #64748b; font-size: 16px; }
    #consult-body { display: flex; flex-wrap: wrap; justify-content: center; gap: 30px; }
    .consult-card { background: #ffffff; border-radius: 50% 50% 20px 20px; width: 210px; padding: 25px 15px; text-align: center; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05); transition: all 0.3s ease; border: 1px solid #f1f5f9; }
    .consult-card:hover { transform: scale(1.05); border-color: #0d9488; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); }
    .c-c-img img { width: 110px; height: 110px; border-radius: 50%; object-fit: cover; margin-bottom: 15px; border: 3px solid #f1f5f9; }
    .c-c-desc h5 { font-size: 15px; color: #1e293b; margin-bottom: 15px; height: 42px; font-weight: 600; }
    .c-c-desc a { text-decoration: none; font-size: 13px; font-weight: 700; color: #0d9488; letter-spacing: 0.5px; transition: color 0.3s ease; }
    .c-c-desc a:hover { color: #0f766e; }
    #dept-sec { display: grid; grid-template-columns: repeat(auto-fit, minmax(320px, 1fr)); gap: 40px; margin-top: 40px; }
    .dept-card { background: #ffffff; border-radius: 20px; overflow: hidden; box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05); transition: transform 0.3s ease; }
    .dept-card:hover { transform: translateY(-5px); }
    .dept-card img { width: 100%; height: 230px; object-fit: cover; }
    .dept-body { padding: 30px; }
    .dept-body h1 { font-size: 24px; color: #0f766e; margin-bottom: 15px; font-weight: 700; }
    .dept-body p { font-size: 14.5px; color: #475569; line-height: 1.7; }
</style>

<section class="hero">
    <div class="hero-content">
        <h1>Book Your Health Today</h1>
        <p>E-Health Medical Booking System</p>
        <button id="bookBtn">Book Now</button>
    </div>
</section>

<section class="land-sections">
    <div id="feature-cont">
        <div class="feature-card">
            <div class="feature-img"><img alt="feature-img" src="https://img.freepik.com/free-photo/portrait-smiling-young-doctors-standing-together-portrait-medical-staff-inside-modern-hospital-smiling-camera_657921-885.jpg?w=1060"/></div>
            <div class="feature-desc"><h3>Find Doctors Near You</h3><p>Confirmed Appointments</p></div>
        </div>
        <div class="feature-card">
            <div class="feature-img"><img alt="feature-img" src="https://img.freepik.com/premium-photo/young-nurse-ukrainian-woman-isolated-white-background-giving-thumbs-up-gesture_1368-355856.jpg?w=1060"/></div>
            <div class="feature-desc"><h3>Experienced and Qualified Staff</h3><p>Safe and Trusted</p></div>
        </div>  
        <div class="feature-card">
            <div class="feature-img"><img alt="feature-img" src="https://img.freepik.com/free-photo/top-view-health-still-life-arrangement-with-copy-space_23-2148854066.jpg?w=1060"/></div>
            <div class="feature-desc"><h3>Advanced Equipments</h3><p>Hygiene Maintenance</p></div>
        </div>  
        <div class="feature-card">
            <div class="feature-img"><img alt="feature-img" src="https://img.freepik.com/free-photo/young-woman-pharmacist-pharmacy_1303-25532.jpg?w=1060"/></div>
            <div class="feature-desc"><h3>Walk-in Medical Store</h3><p>Prescription based</p></div>
        </div>  
        <div class="feature-card">
            <div class="feature-img"><img alt="feature-img" src="https://img.freepik.com/premium-photo/ambulance-driving-city-street-with-clouded-sky-created-using-generative-ai-technology_772924-3503.jpg?w=1060"/></div>
            <div class="feature-desc"><h3>Emergency Ambulance Service</h3><p>24x7 availability</p></div>
        </div>                
    </div>
</section>

<section class="land-sections">
    <div id="consult-head">
        <h2>Consult top doctors for any health concern</h2>
        <p>Private consultations with verified doctors in all specialities</p>
    </div>
    <div id="consult-body">
        <div class="consult-card">
            <div class="c-c-img"><img alt="consult card img" src="https://img.freepik.com/free-vector/illustration-with-person-with-cold_23-2148473870.jpg?w=740"/></div>
            <div class="c-c-desc"><h5>Cold, cough or fever</h5><a href="">CONSULT NOW</a></div>
        </div>
        <div class="consult-card">
            <div class="c-c-img"><img alt="consult card img" src="https://img.freepik.com/premium-vector/skin-problem-young-man-acne-vector_101154-94.jpg?w=740"/></div>
            <div class="c-c-desc"><h5>Acne or skin issues</h5><a href="">CONSULT NOW</a></div>
        </div>
        <div class="consult-card">
            <div class="c-c-img"><img alt="consult card img" src="https://img.freepik.com/free-vector/human-internal-organ-with-uterus_1308-109461.jpg?w=740"/></div>
            <div class="c-c-desc"><h5>Period doubts or pregnancy</h5><a href="">CONSULT NOW</a></div>
        </div>
        <div class="consult-card">
            <div class="c-c-img"><img alt="consult card img" src="https://img.freepik.com/premium-vector/cute-little-baby-girl-show-sad-expression-cry_97632-4563.jpg?w=826"/></div>
            <div class="c-c-desc"><h5>Child not feelin well</h5><a href="">CONSULT NOW</a></div>
        </div>
        <div class="consult-card">
            <div class="c-c-img"><img alt="consult card img" src="https://img.freepik.com/free-vector/young-woman-feeling-sad-tired-worried-suffering-depression-cartoon-hand-drawn-cartoon-art-illustration_56104-1063.jpg?w=900"/></div>
            <div class="c-c-desc"><h5>Depression or anxiety</h5><a href="">CONSULT NOW</a></div>
        </div>
    </div>
</section>

<section id="nav-dept" class="land-sections">
    <h1 style="margin:1rem auto; font-size: 30px; text-align: center; text-decoration: underline;">Our Departments</h1>
    <div id="dept-sec">
        <div class="dept-card">
            <img src="./Files/Departments/cardiology-bg.jpg"/>
            <div class="dept-body">
                <h1>Cardiology</h1>
                <p>Medistar Heart Institutes are very well known for performing a multitude of treatments and procedures in cardiology and cardiothoracic surgery...</p>
            </div>
        </div>
        <div class="dept-card">
            <img src="./Files/Departments/sec_1.png"/>
            <div class="dept-body">
                <h1>Nephrology</h1>
                <p>Nephrology is a branch of medical science that deals with the diagnosis and treatment of disorders related to the kidney...</p>
            </div>
        </div>
        <div class="dept-card">
            <img src="./Files/Departments/sec_7.png"/>
            <div class="dept-body">
                <h1>Neurology</h1>
                <p>Neurology is a centre of excellence at Medistar and deals with diagnosis and treatment of disorders of the nervous system...</p>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>