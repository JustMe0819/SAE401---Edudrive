import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { HeaderComponent } from './component/header/header.component';
import { HeaderFormateurComponent } from './component/header-formateur/header-formateur.component';
import { StatsEleveComponent } from './component/stats-eleve/stats-eleve.component';
import { FooterComponent } from './component/footer/footer.component';

const routes: Routes = [
  {path: "header", component: HeaderComponent},
  {path: "header-formateur", component: HeaderFormateurComponent},
  {path: "Page d'acceuil élève", component: StatsEleveComponent},
  {path: "footer", component: FooterComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
