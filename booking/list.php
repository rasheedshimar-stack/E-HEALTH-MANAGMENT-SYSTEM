<?php
include 'db_config.php';

if (isset($_POST['update_status'])) {
    $appointment_id = $_POST['appointment_id'];
    $new_status = $_POST['status_value'];
    
    $update_sql = "UPDATE appointments SET status='$new_status' WHERE id='$appointment_id'";
    $conn->query($update_sql);
}

$sql = "SELECT * FROM appointments ORDER BY id DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>E-Health Appointments</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Arial', sans-serif; }
    body { background-color: #f5f7fa; color: #333; }
    .topbar { background-color: #004b49; color: white; text-align: center; padding: 8px; font-size: 12px; font-weight: bold; letter-spacing: 1px; }
    nav { display: flex; justify-content: space-between; align-items: center; background-color: white; padding: 15px 30px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
    .logo { display: flex; align-items: center; gap: 10px; }
    .logo-icon { width: 20px; height: 20px; background-color: #00a896; border-radius: 4px; }
    .logo h1 { font-size: 20px; color: #004b49; }
    .nav-links a { text-decoration: none; color: #555; margin-left: 20px; font-weight: bold; }
    .nav-links a:hover { color: #00a896; }
    .page-title { text-align: center; margin: 30px 0; color: #004b49; }
    .card { background-color: white; max-width: 950px; margin: 0 auto 40px auto; padding: 20px; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
    .table-container { width: 100%; overflow-x: auto; margin-bottom: 20px; }
    table { width: 100%; border-collapse: collapse; }
    th, td { padding: 15px; text-align: left; border-bottom: 1px solid #eee; white-space: nowrap; }
    th { background-color: #f9f9f9; color: #666; font-size: 14px; }
    tr:hover { background-color: #f1f5f9; }
    .disease-tag { background-color: #eef2f6; color: #475569; padding: 4px 8px; border-radius: 4px; font-size: 13px; font-weight: 500; }
    .status { padding: 5px 10px; border-radius: 4px; font-size: 12px; font-weight: bold; }
    .Confirmed { background-color: #e6f7ed; color: #1e7e34; }
    .Pending { background-color: #fff3cd; color: #856404; }
    .Rejected { background-color: #fde8e8; color: #dc3545; }
    .btn { padding: 6px 12px; border: none; border-radius: 4px; font-weight: bold; cursor: pointer; color: white; margin-right: 5px; }
    .approve { background-color: #00a896; }
    .reject { background-color: #dc3545; }
  </style>
</head>
<body>
  <div class="topbar">MONDAY TO SUNDAY - 24h SERVICE</div>
  <nav>
    <div class="logo">
      <div class="logo-icon"></div>
      <h1>E - HEALTH</h1>
    </div>
    <div class="nav-links">
        <a href="#">Home</a>
        <a href="#">Account</a>
        <a href="#">Login</a>
        <a href="#">Doctor</a>
       
         <a href="booking.php">Booking</a>
        <a href="list.php">Appointment List</a>
        <a href="#">My Booking</a>
        <a href="#">Dashboard</a>
         <a href="#">List</a>
          <a href="#">About</a> 
          <a href="#">Contact</a>
     
      
    </div>
  </nav>
  <h1 class="page-title">Patient Appointment List</h1>
  <div class="card">
    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>Patient Name</th>
            <th>Specialization</th> 
            <th>Doctor</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td><b>" . htmlspecialchars($row['patient_name']) . "</b></td>";
                  echo "<td><span class='disease-tag'>" . htmlspecialchars($row['specialization']) . "</span></td>";
                  echo "<td>" . htmlspecialchars($row['doctor_name']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['appointment_date']) . "</td>";
                  echo "<td>" . htmlspecialchars($row['appointment_time']) . "</td>";
                  echo "<td><span class='status " . $row['status'] . "'>" . $row['status'] . "</span></td>";
                  echo "<td>
                          <form method='POST' style='display:inline;'>
                              <input type='hidden' name='appointment_id' value='" . $row['id'] . "'>
                              <input type='hidden' name='status_value' value='Confirmed'>
                              <button type='submit' name='update_status' class='btn approve'>Approve</button>
                          </form>
                          <form method='POST' style='display:inline;'>
                              <input type='hidden' name='appointment_id' value='" . $row['id'] . "'>
                              <input type='hidden' name='status_value' value='Rejected'>
                              <button type='submit' name='update_status' class='btn reject'>Reject</button>
                          </form>
                        </td>";
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='7' style='text-align:center;'>No appointments found.</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>