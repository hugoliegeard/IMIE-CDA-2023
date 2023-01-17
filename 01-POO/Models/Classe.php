<?php

class Classe
{
    private $nom;
    private $maitre;
    private $effectif;
    private $eleves;

    /**
     * @param $nom
     * @param $maitre
     * @param $effectif
     */
    public function __construct($nom, $maitre, $effectif)
    {
        $this->nom = $nom;
        $this->maitre = $maitre;
        $this->effectif = $effectif;
        $this->eleves = [];
    }

    /**
     * Permet d'ajouter un élève à la classe.
     * @param Eleve $eleve
     * @return void
     */
    public function ajouterUnEleve(Eleve $eleve)
    {
        /**
         * Permet de vérifier qu'un élève n'est
         * pas déjà présent dans le tableau
         * avant de l'ajouter.
         */
        if (!in_array($eleve, $this->eleves)) {
            $this->eleves[] = $eleve;
        }
    }

    /**
     * Retourne ma collection d'élèves.
     * @return array
     */
    public function getEleves()
    {
        return $this->eleves;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getMaitre()
    {
        return $this->maitre;
    }

    /**
     * @param mixed $maitre
     */
    public function setMaitre($maitre)
    {
        $this->maitre = $maitre;
    }

    /**
     * @return mixed
     */
    public function getEffectif()
    {
        return $this->effectif;
    }

    /**
     * @param mixed $effectif
     */
    public function setEffectif($effectif)
    {
        $this->effectif = $effectif;
    }

}