import { Component } from '@angular/core';
import { Router } from '@angular/router';  

@Component({
  selector: 'app-accueil',
  standalone: false,
  templateUrl: './accueil.component.html',
  styleUrl: './accueil.component.css'
})
export class AccueilComponent {
  constructor(private router: Router) {}

  // Méthode pour rediriger vers le formulaire de connexion
  goToLogin() {
    this.router.navigate(['/login-eleve']);
  }

  scrollToConnexion() {
    const section = document.getElementById('connexion-section');
    if (section) {
      section.scrollIntoView({ behavior: 'smooth' });
    }
  }
 
}

