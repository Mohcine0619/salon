<?php
class Appointment {
    private $conn;
    private $table_name = "appointments";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function bookAppointment($user_id, $service_id, $appointment_date) {
        $query = "INSERT INTO " . $this->table_name . " (user_id, service_id, appointment_date) VALUES (:user_id, :service_id, :appointment_date)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':service_id', $service_id);
        $stmt->bindParam(':appointment_date', $appointment_date);
        return $stmt->execute();
    }

    public function getUserAppointments($user_id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE user_id = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>