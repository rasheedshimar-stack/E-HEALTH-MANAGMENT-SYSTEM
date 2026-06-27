<?php
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_name = $_POST['patient_name'];
    $specialization = $_POST['disease']; 
    $doctor_name = $_POST['doctor'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];

    $sql = "INSERT INTO appointments (patient_name, specialization, doctor_name, appointment_date, appointment_time) 
            VALUES ('$patient_name', '$specialization', '$doctor_name', '$appointment_date', '$appointment_time')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Appointment Booked Successfully!');
                window.location.href = 'list.php';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>