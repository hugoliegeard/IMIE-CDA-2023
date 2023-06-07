import {Category} from "../models/category";
import {Post} from "../models/post";

export interface ApiPostResponse {
  "hydra:totalItems": number;
  "hydra:member": Post[]
}
