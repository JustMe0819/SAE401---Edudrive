import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { AuthService } from '../../service/auth.service';

@Component({
  selector: 'app-form-connexion-eleve',
  standalone: false,
  templateUrl: './form-connexion-eleve.component.html',
  styleUrl: './form-connexion-eleve.component.css'
})
export class FormConnexionEleveComponent {

  loginForm: FormGroup;
  showPassword: boolean = false;
  message: string = ''; // Déclaration de la variable message

  constructor(private fb: FormBuilder, private router: Router, private authService: AuthService) {
    this.loginForm = this.fb.group({
      neph: ['', [Validators.required]],
      password: ['', [Validators.required]],
      remember: [false]
    });
  }

  togglePasswordVisibility() {
    this.showPassword = !this.showPassword;
  }

  onSubmit() {
    if (this.loginForm.valid) {
      const { neph, password } = this.loginForm.value;

      this.authService.login(neph, password).subscribe(
        response => {
          this.message = ''; // Effacer le message précédent
          this.router.navigate(['/page-accueil-eleve']); // Redirection après connexion réussie
        },
        error => {
          this.message = 'Numéro NEPH ou mot de passe incorrect'; // Message d'erreur
        }
      );
    } else {
      this.message = 'Veuillez remplir tous les champs'; // Message d'erreur si le formulaire est invalide
    }
  }
}
