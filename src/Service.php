<?php
class Service {
    private $conn;
    private $table_name = "services";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function addService($name, $duration, $price) {
        $query = "INSERT INTO " . $this->table_name . " (name, duration, price) VALUES (:name, :duration, :price)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':duration', $duration);
        $stmt->bindParam(':price', $price);
        return $stmt->execute();
    }

    public function getAllServices() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>