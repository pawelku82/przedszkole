<?php

class Osoba
{
    // property declaration
    private $id;
    private $imie1;
    private $imie2;
    private $nazwisko;
    private $plec;

    // method declaration
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getImie1() {
        return $this->imie1;
    }

    public function setImie1($imie1) {
        $this->imie1 = $imie1;
    }

    public function getImie2() {
        return $this->imie2;
    }

    public function setImie2($imie2) {
        $this->imie2 = $imie2;
    }

    public function getNazwisko() {
        return $this->nazwisko;
    }

    public function setNazwisko($nazwisko) {
        $this->nazwisko = $nazwisko;
    }

    public function getPlec() {
        return $this->plec;
    }

    public function setPlec($plec) {
        $this->plec = $plec;
    }

}

?>
