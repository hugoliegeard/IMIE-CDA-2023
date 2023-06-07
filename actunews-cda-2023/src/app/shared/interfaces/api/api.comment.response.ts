import {Category} from "../models/category";

export interface ApiCommentResponse {
  "hydra:totalItems": number;
  "hydra:member": Comment[]
}
