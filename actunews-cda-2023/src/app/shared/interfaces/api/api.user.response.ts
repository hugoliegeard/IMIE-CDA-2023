import {Category} from "../models/category";
import {Post} from "../models/post";
import {User} from "../models/user";

export interface ApiUserResponse {
  "hydra:totalItems": number;
  "hydra:member": User[]
}
