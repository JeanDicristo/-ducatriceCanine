<?php

class AnimauxManager {
    private $db;

    public function __construct() {
        $dbName = "SissiEducatrice";
        $port = 8888;
        $username = "root";
        $password = "root";

        try {
            $this->db = new PDO("mysql:host=localhost;dbname=$dbName;port=$port", $username, $password);
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }

    public function create(Animau $animau)
    {
        $req = $this->db->prepare("INSERT INTO `animau` (nom, age, race, couleur) VALUE (:nom, :age, :race, :couleur");

        $req->bindValue(":nom", $animau->getNom(), PDO::PARAM_STR);
        $req->bindValue("age", $animau->getAge(), PDO::PARAM_INT);
        $req->bindValue("race", $animau->getRace(), PDO::PARAM_INT);
        $req->bindValue("couleur", $animau->getCouleur(), PDO::PARAM_STR);

        $req->execute();
    }

    public function get(int $id_animau)
    {
        $req = $this->db->prepare("SELECT * FROM `animau` WHERE id_animau = :id_animau");
        $req->bindValue(":id_animau", $id_animau, PDO::PARAM_INT);
        $data = $req->fetch();
        $animau = new Animau($data);
        return $animau;
    }

    public function getAll()
    {
        $animaux = [];
        $req = $this->db->prepare("SELECT * FROM `animau` ORDER BY nom");
        $datas = $req->fetchAll();
        foreach ($datas as $data) {
            $animau = new Animau($data);
            $animaux[] = $animau;
        }
        $req->closeCursor();
        return $animaux;
    }

    public function upDate(Animau $animau)
    {
        $req = $this->db->prepare("UPDATE `animau` SET nom = :nom, age = :age, race = :race, couleur = :couleur");

        $req->bindValue(":nom", $animau->getNom(), PDO::PARAM_STR);
        $req->bindValue("age", $animau->getAge(), PDO::PARAM_INT);
        $req->bindValue("race", $animau->getRace(), PDO::PARAM_INT);
        $req->bindValue("couleur", $animau->getCouleur(), PDO::PARAM_STR);

        $req->execute();
    }

    public function delete($id_animau)
    {
        $req = $this->db->prepare("DELETE FROM  `animau` WHERE id_aniamu = :id_animau");
        $req->bindValue(":id_animau", $id_animau, PDO::PARAM_INT);
    }
}