<?php

class Academie
{
    private $nom;

    public function __construct()
    {
        $this->nom = "Academie de France";
    }

    /**
     * @return mixed
     */
    protected function getNomAcademie()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNomAcademie($nom)
    {
        $this->nom = $nom;
    }

}