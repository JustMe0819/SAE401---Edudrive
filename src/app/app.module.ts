import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { provideHttpClient } from '@angular/common/http';
import { NgChartsModule } from 'ng2-charts'; // Importation de ChartsModule

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HeaderComponent } from './component/header/header.component';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';
import { HeaderFormateurComponent } from './component/header-formateur/header-formateur.component';
import { StatsEleveComponent } from './component/stats-eleve/stats-eleve.component';
import { FooterComponent } from './component/footer/footer.component';
import { AccueilComponent } from './component/accueil/accueil.component';
import { FormConnexionEleveComponent } from './component/form-connexion-eleve/form-connexion-eleve.component';
import { FormInscriptionFormateurComponent } from './component/form-inscription-formateur/form-inscription-formateur.component';
import { FormConnexionFormateurComponent } from './component/form-connexion-formateur/form-connexion-formateur.component';
import { StatsFormateurComponent } from './component/stats-formateur/stats-formateur.component';

@NgModule({
  declarations: [
    AppComponent,
    HeaderComponent,
    HeaderFormateurComponent,
    StatsEleveComponent,
    FooterComponent,
    AccueilComponent,
    FormConnexionEleveComponent,
    FormInscriptionFormateurComponent,
    FormConnexionFormateurComponent,
    StatsFormateurComponent
  ],

  imports: [
    BrowserModule,
    AppRoutingModule,
    NgbModule,
    ReactiveFormsModule,
    FormsModule,
    NgChartsModule 
  ],
  providers: [provideHttpClient()], 
  bootstrap: [AppComponent]
})
export class AppModule { }
