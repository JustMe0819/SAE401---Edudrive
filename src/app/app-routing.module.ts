import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HeaderComponent } from './component/header/header.component';
import { HeaderFormateurComponent } from './component/header-formateur/header-formateur.component';
import { StatsEleveComponent } from './component/stats-eleve/stats-eleve.component';
import { FooterComponent } from './component/footer/footer.component';
import { AccueilComponent } from './component/accueil/accueil.component';
import { FormConnexionEleveComponent } from './component/form-connexion-eleve/form-connexion-eleve.component';

const routes: Routes = [
  {path: "header", component: HeaderComponent},
  {path: "header-formateur", component: HeaderFormateurComponent},
  {path: "page-acceuil-eleve", component: StatsEleveComponent},
  {path: "footer", component: FooterComponent},
  {path: "Edudrive", component: AccueilComponent},
  {path: "", component: AccueilComponent},
  {path: "login-eleve", component: FormConnexionEleveComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
