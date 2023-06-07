import {Category} from "../models/category";

export interface ApiCategoryResponse {
  "hydra:totalItems": number;
  "hydra:member": Category[]
}
