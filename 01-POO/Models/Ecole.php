<?php

/**
 * Une classe PHP, c'est une entité regroupant
 * par thème, des "variables" appelée "propriétés"
 * et des fonctions appelées "méthodes".
 */
class Ecole extends Academie
{

    /* --
     * Déclaration des propriétés de notre classe Ecole.
     -- */
    private $nom;
    private $adresse;
    private $capacite;
    private $directeur;
    private $classes;

    /**
     * Pour permettre l'attribution de valeurs
     * à mes propriétés, je vais mettre en place
     * un CONSTRUCTEUR.
     * -----------------------------------------
     * L'objectif du constructeur, c'est de remplir
     * d'initialiser, d'hydrater les propriétés
     * de ma classe. IL DOIT ETRE PUBLIC.
     * -----------------------------------------
     * Cette fonction est executée AUTOMATIQUEMENT
     * par PHP au moment de l'instanciation.
     */
    public function __construct($nom, $adresse, $capacite, $directeur)
    {
        parent::__construct();
        $this->capacite = $capacite;
        $this->adresse = $adresse;
        $this->directeur = $directeur;
        $this->nom = $nom;
        $this->classes = [];
    }

    /**
     * @return array
     */

    // ----------------------------- GETTER

    public function getClasses()
    {
        return $this->classes;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function getNomComplet()
    {
        return $this->nom . ' | ' . $this->getNomAcademie();
    }

    public function getAdresse()
    {
        return $this->adresse;
    }

    public function getCapacite()
    {
        return $this->capacite;
    }

    public function getDirecteur()
    {
        return $this->directeur;
    }

    // ----------------------------- SETTER

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function setDirecteur($directeur)
    {
        $this->directeur = $directeur;
    }

    public function setCapacite($capacite)
    {
        $this->capacite = $capacite;
    }

    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    public function ajouterUneClasse(Classe $classe)
    {
        if (!in_array($classe, $this->classes)) {
            $this->classes[] = $classe;
        }
    }

}
