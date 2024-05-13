<?php
class Apprenant {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function AjouterApprenant($nom, $prenom, $age) {
        $stmt = $this->conn->prepare("INSERT INTO apprenant (nom, prenom, age) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $nom, $prenom, $age);
        return $stmt->execute();
    }

    public function ListeApprenant() {
        $result = $this->conn->query("SELECT * FROM apprenant");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function ModifierApprenant($id, $nom, $prenom, $age) {
        $stmt = $this->conn->prepare("UPDATE apprenant SET nom=?, prenom=?, age=? WHERE id=?");
        $stmt->bind_param("ssii", $nom, $prenom, $age, $id);
        return $stmt->execute();
    }

    public function SupprimerApprenant($id) {
        $stmt = $this->conn->prepare("DELETE FROM apprenant WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
