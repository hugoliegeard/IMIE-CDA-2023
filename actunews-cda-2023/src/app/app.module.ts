import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import {FormsModule} from "@angular/forms";
import {HeaderComponent} from "./core/header/header.component";
import { FooterComponent } from './core/footer/footer.component';
import { HomeComponent } from './modules/pages/home/home.component';
import { SidebarComponent } from './core/sidebar/sidebar.component';
import { CategoriesComponent } from './modules/pages/categories/categories.component';
import { ArticleComponent } from './modules/pages/article/article.component';
import {HttpClientModule} from "@angular/common/http";
import { Error404Component } from './modules/pages/error404/error404.component';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    FooterComponent,
    HomeComponent,
    SidebarComponent,
    CategoriesComponent,
    ArticleComponent,
    Error404Component
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule,
    HttpClientModule,
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
