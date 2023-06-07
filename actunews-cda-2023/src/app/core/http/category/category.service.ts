import {Injectable} from '@angular/core';
import {HttpClient} from "@angular/common/http";
import {ApiCategoryResponse} from "../../../shared/interfaces/api/api.category.response";
import {Observable} from "rxjs";
import {environment} from "../../../../environments/environment";

@Injectable({
  providedIn: 'root'
})
export class CategoryService {

  constructor(private http: HttpClient) {
  }

  getCategories(): Observable<ApiCategoryResponse> {
    return this.http.get<ApiCategoryResponse>(environment.apiEndpoint + '/api/categories');
  }

}
