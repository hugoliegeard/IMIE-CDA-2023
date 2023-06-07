import {Component, OnInit} from '@angular/core';
import {Category} from "../../shared/interfaces/models/category";
import {CategoryService} from "../http/category/category.service";

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent implements OnInit {

  /**
   * Initialisation d'un tableau de catégorie vide.
   */
  categories: Category[] = [];

  constructor(private categoryService: CategoryService) {
  }

  /**
   * Au moment du chargement du composant, angular va exécuter la fonction ngOnInit.
   */
  ngOnInit(): void {
    /**
     * Cette fonction va contacter notre API Symfony pour demander à récupérer
     * la liste des catégories.
     *
     * L'observable, va écouter la requète de l'API et nous prévenir via le "subscribe"
     * dès lors que la réponse sera disponible.
     */
    this.categoryService.getCategories().subscribe(apiCategoryResponse => {
      /**
       * La réponse étant disponible, je stock dans mon tableau de catégories,
       * les catégories de l'API.
       */
      this.categories = apiCategoryResponse["hydra:member"];
    });
  }

}
