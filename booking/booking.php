<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-HEALTH Appointment Booking</title>
  <style>
    /* --- CSS Styles --- */
    * { 
        margin: 0; 
        padding: 0; 
        box-sizing: border-box; 
        font-family: Arial, sans-serif; 
    }

    body { 
        background: #dcdcdc; 
    }

    .main-box { 
        width: 95%; 
        margin: 20px auto; 
        background: #f4f4f4; 
        padding-bottom: 30px; 
        border-radius: 8px; 
        overflow: hidden; 
        box-shadow: 0px 0px 15px rgba(0,0,0,0.1); 
    }

    .top-text { 
        background: #11c2d3; 
        text-align: center; 
        padding: 12px; 
        font-weight: bold; 
        color: black; 
    }

    /* Navigation Bar */
    .nav { 
        background: #7a7474; 
        display: flex; 
        justify-content: space-between; 
        align-items: center; 
        padding: 12px 20px; 
    }

    .left-side { 
        display: flex; 
        align-items: center; 
        gap: 12px; 
    }

    .logo-round { 
        width: 35px; 
        height: 35px; 
        border-radius: 50%; 
        background: #ddd; 
    }

    .left-side h2 { 
        font-size: 28px; 
        color: white; 
    }

    .nav-links { 
        display: flex; 
        gap: 20px; 
    }

    .nav-links a { 
        text-decoration: none; 
        color: white; 
        font-size: 14px; 
        font-weight: bold; 
    }

    .nav-links a:hover { 
        color: #11c2d3; 
    }

    /* Headings */
    .heading { 
        text-align: center; 
        font-size: 50px; 
        margin-top: 30px; 
        margin-bottom: 40px; 
        font-weight: bold; 
    }

    /* Form Layout */
    .form-box { 
        width: 85%; 
        margin: auto; 
    }

    .input-row { 
        display: flex; 
        gap: 50px; 
        margin-bottom: 30px; 
    }

    .field { 
        display: flex; 
        flex-direction: column; 
        flex: 1; 
    }

    .field label { 
        font-size: 22px; 
        font-weight: bold; 
        margin-bottom: 12px; 
    }

    /* Input Fields & Dropdowns */
    .real-input { 
        width: 100%; 
        max-width: 450px; 
        padding: 14px; 
        border: 1px solid #777; 
        border-radius: 5px; 
        background: white; 
        font-size: 18px; 
        outline: none; 
        cursor: pointer; 
    }

    /* Time Selection */
    .time-head { 
        font-size: 22px; 
        font-weight: bold; 
        margin-bottom: 20px; 
    }

    .time-list { 
        display: flex; 
        gap: 15px; 
        margin-bottom: 25px; 
        flex-wrap: wrap; 
    }                 

    .time-list button { 
        padding: 14px 24px; 
        border: 1px solid #777; 
        background: white; 
        border-radius: 5px; 
        cursor: pointer; 
        font-size: 17px; 
        font-weight: bold; 
        transition: all 0.2s ease;
    }

    .time-list button.selected { 
        background: #11c2d3; 
        color: white; 
        border-color: #11c2d3; 
    }

    .time-list button:hover { 
        background: #11c2d3; 
        color: white; 
    }

    /* Live Preview Box */
    .live-preview { 
        background: #e2e2e2; 
        padding: 20px; 
        border-radius: 6px; 
        margin-bottom: 30px; 
        border-left: 6px solid #11c2d3; 
    }

    .live-preview p { 
        font-size: 18px; 
        margin-bottom: 8px; 
    }

    /* Submit Button */
    .book-btn { 
        display: block; 
        width: 300px; 
        margin: auto; 
        padding: 14px; 
        border: none; 
        border-radius: 6px; 
        background: #11c2d3; 
        color: white; 
        font-size: 20px; 
        font-weight: bold; 
        cursor: pointer; 
        text-align: center; 
        transition: background 0.2s ease;
    }

    .book-btn:hover { 
        background: #0eabba; 
    }

    /* Mobile View Optimization */
    @media (max-width: 768px) {
        .input-row {
            flex-direction: column;
            gap: 20px;
        }
        .real-input {
            max-width: 100%;
        }
        .nav {
            flex-direction: column;
            gap: 15px;
            text-align: center;
        }
        .nav-links {
            flex-wrap: wrap;
            justify-content: center;
        }
    }
  </style>
</head>
<body>

  <div class="main-box">
    <div class="top-text">MONDAY TO SUNDAY - 24h SERVICE</div>
    
    <div class="nav">
      <div class="left-side">
        <div class="logo-round"></div>
        <h2>E - HEALTH</h2>
      </div>
      <div class="nav-links">
        <a href="#">Home</a>
        <a href="#">Account</a>
        <a href="#">Login</a>
        <a href="#">Doctor</a>
        <a href="list.php">Appointment List</a>
        <a href="#">Booking</a>
        <a href="#">My Booking</a>
        <a href="#">Dashboard</a>
         <a href="#">List</a>
          <a href="#">About</a> 
          <a href="#">Contact</a>

      </div>
    </div>

    <div class="heading">Book Appointment</div>

    <form action="booking_process.php" method="POST" class="form-box" onsubmit="return validateForm()">
      
      <div class="input-row">
        <div class="field">
          <label for="patient_name">Patient Name</label>
          <input type="text" name="patient_name" id="patient_name" class="real-input" placeholder="Enter full name" required oninput="updatePreview();">
        </div>
      </div>

      <div class="input-row">
        <div class="field">
          <label for="disease">Specialization</label>
          <select name="disease" id="disease" class="real-input" required onchange="showDoctors(); updatePreview();">
            <option value="">-- Select Specialty --</option>
            <option value="skin">Dermatology (Skin)</option>
            <option value="eye">Ophthalmology (Eye)</option>
            <option value="orthopedist">Orthopedic Surgeon (Orthopedist)</option>
            <option value="ent">Ear, Nose, Throat (ENT)</option>
            <option value="teeth">Dental (Teeth)</option>
          </select>
        </div>
        
        <div class="field">
          <label for="doctor">Select Doctor</label>
          <select name="doctor" id="doctor" class="real-input" required onchange="updatePreview();">
            <option value="">-- Select Doctor --</option>
          </select>
        </div>
      </div>

      <div class="input-row">
        <div class="field">
          <label for="appointment_date">Date</label>
          <input type="date" name="appointment_date" id="appointment_date" class="real-input" required onchange="updatePreview();">
        </div>
      </div>

      <div class="time-head">Select Time</div>
      <div class="time-list">
        <button type="button" onclick="selectTime('10:00 AM', this)">10:00 AM</button>
        <button type="button" onclick="selectTime('11:30 AM', this)">11:30 AM</button>
        <button type="button" onclick="selectTime('02:00 PM', this)">02:00 PM</button>
        <button type="button" onclick="selectTime('07:30 PM', this)">07:30 PM</button>
      </div>
      
      <input type="hidden" name="appointment_time" id="appointment_time" required>

      <div class="live-preview">
        <p><strong>Patient Name:</strong> <span id="view-name">Not entered</span></p>
        <p><strong>Selected Doctor:</strong> <span id="view-doctor">Not selected</span></p>
        <p><strong>Selected Date:</strong> <span id="view-date">Not selected</span></p>
        <p><strong>Selected Time:</strong> <span id="view-time">Not selected</span></p>
      </div>

      <button type="submit" class="book-btn">Confirm Booking</button>
    </form>
  </div>

  <script>
    const doctorData = {
      skin: ["Dr. Razik (Skin)"],
      orthopedist: ["Dr. Hasir"],
      eye: ["Dr. Nimal"],
      ent: ["Dr. Kumar"],
      teeth: ["Dr. Farook"],
    };

    // Set minimum date to today
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('appointment_date').setAttribute('min', today);

    function showDoctors() {
      const diseaseSelect = document.getElementById("disease");
      const doctorSelect = document.getElementById("doctor");
      const selectedDisease = diseaseSelect.value;
      
      doctorSelect.innerHTML = '<option value="">-- Select Doctor --</option>';
      
      if (selectedDisease && doctorData[selectedDisease]) {
        doctorData[selectedDisease].forEach(function(docName) {
          let option = document.createElement("option");
          option.value = docName;
          option.text = docName;
          doctorSelect.appendChild(option);
        });
      }
    }

    function selectTime(timeValue, btnElement) {
      document.getElementById("appointment_time").value = timeValue;
      document.querySelectorAll(".time-list button").forEach(btn => btn.classList.remove("selected"));
      btnElement.classList.add("selected");
      updatePreview();
    }

    function updatePreview() {
      document.getElementById("view-name").innerText = document.getElementById("patient_name").value || "Not entered";
      document.getElementById("view-doctor").innerText = document.getElementById("doctor").value || "Not selected";
      document.getElementById("view-date").innerText = document.getElementById("appointment_date").value || "Not selected";
      document.getElementById("view-time").innerText = document.getElementById("appointment_time").value || "Not selected";
    }

    function validateForm() {
      const name = document.getElementById("patient_name").value.trim();
      const disease = document.getElementById("disease").value;
      const doctor = document.getElementById("doctor").value;
      const date = document.getElementById("appointment_date").value;
      const time = document.getElementById("appointment_time").value;

      if (name === "" || disease === "" || doctor === "" || date === "" || time === "") {
        alert("Please fill out all fields and select a time slot before confirming!");
        return false; 
      }
      return true; 
    }
  </script>
</body>
</html>