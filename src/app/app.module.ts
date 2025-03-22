import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HeaderComponent } from './component/header/header.component';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { HeaderFormateurComponent } from './component/header-formateur/header-formateur.component';
import { NgChartsModule } from 'ng2-charts';
import { StatsEleveComponent } from './component/stats-eleve/stats-eleve.component';
import { FooterComponent } from './component/footer/footer.component';
import { AccueilComponent } from './component/accueil/accueil.component';
import { FormConnexionEleveComponent } from './component/form-connexion-eleve/form-connexion-eleve.component';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    HeaderFormateurComponent,
    StatsEleveComponent,
    FooterComponent,
    AccueilComponent,
    FormConnexionEleveComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    NgbModule,
    NgChartsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
