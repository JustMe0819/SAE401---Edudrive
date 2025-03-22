import { Component } from '@angular/core';
import { Router } from '@angular/router';  

@Component({
  selector: 'app-form-connexion-eleve',
  standalone: false,
  templateUrl: './form-connexion-eleve.component.html',
  styleUrl: './form-connexion-eleve.component.css'
})
export class FormConnexionEleveComponent {
  constructor(private router: Router) {}

  goToAccueilEleve() {
    this.router.navigate(['/page-acceuil-eleve']);
  }
}
