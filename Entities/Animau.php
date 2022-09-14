<?php

class Animau {

    private $id_animau;
    private $nom;
    private $age;
    private $race;
    private $couleur;

    public function __construct(array $data) {
        $this->hydrate($data);
    }

    public function hydrate(array $data) {
        foreach ($data as $key => $value) {
           // One gets the setter's name matching the attribute.
           $method = 'set'.ucfirst($key);
 
           // If the matching setter exists
           if (method_exists($this, $method)) {
              // One calls the setter.
              $this->$method($value);
           }
        }
     }

     /** START GETTERS AND SETTERS **/

    public function getId_animau()
    {
        return $this->id_animau;
    }

    public function setId_animau($id_animau)
    {
        $this->id_animau = $id_animau;

        return $this;
    }


    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }


    public function getAge()
    {
        return $this->age;
    }

    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }


    public function getRace()
    {
        return $this->race;
    }


    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }


    public function getCouleur()
    {
        return $this->couleur;
    }


    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;

        return $this;
    }
}