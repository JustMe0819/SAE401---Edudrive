import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HeaderComponent } from './component/header/header.component';
import { HeaderFormateurComponent } from './component/header-formateur/header-formateur.component';
import { StatsEleveComponent } from './component/stats-eleve/stats-eleve.component';
import { FooterComponent } from './component/footer/footer.component';
import { AccueilComponent } from './component/accueil/accueil.component';
import { FormConnexionEleveComponent } from './component/form-connexion-eleve/form-connexion-eleve.component';
import { FormInscriptionFormateurComponent } from './component/form-inscription-formateur/form-inscription-formateur.component';
import { FormConnexionFormateurComponent } from './component/form-connexion-formateur/form-connexion-formateur.component';
import { StatsFormateurComponent } from './component/stats-formateur/stats-formateur.component';

const routes: Routes = [
  {path: "header", component: HeaderComponent},
  {path: "header-formateur", component: HeaderFormateurComponent},
  {path: "page-accueil-eleve", component: StatsEleveComponent},
  {path: "footer", component: FooterComponent},
  {path: "Edudrive", component: AccueilComponent},
  {path: "", component: AccueilComponent},
  {path: "login-eleve", component: FormConnexionEleveComponent},
  {path: "inscription-formateur", component: FormInscriptionFormateurComponent},
  {path: "login-formateur", component: FormConnexionFormateurComponent},
  {path: "page-accueil-formateur", component: StatsFormateurComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
