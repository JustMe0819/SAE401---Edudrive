import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { AuthService } from '../../service/auth.service';

@Component({
  selector: 'app-form-connexion-formateur',
  standalone: false,
  templateUrl: './form-connexion-formateur.component.html',
  styleUrls: ['./form-connexion-formateur.component.css']  // Correction ici pour le style
})
export class FormConnexionFormateurComponent {

  loginForm: FormGroup;
  showPassword: boolean = false;
  errorMessage: string = '';

  constructor(private fb: FormBuilder, private router: Router, private authService: AuthService) {
    this.loginForm = this.fb.group({
      mail: ['', [Validators.required, Validators.email]],
      password: ['', [Validators.required, Validators.minLength(6)]],
      remember: [false]
    });
  }

  togglePasswordVisibility() {
    this.showPassword = !this.showPassword;
  }

  onSubmit() {
    if (this.loginForm.valid) {
      this.authService.loginFormateur(this.loginForm.value).subscribe(
        (response) => {
          console.log('Connexion réussie:', response);
          this.router.navigate(['/page-accueil-formateur']);
        },
        (error) => {
          console.error('Erreur de connexion:', error);
          this.errorMessage = 'Email ou mot de passe incorrect.';
        }
      );
    } else {
      this.errorMessage = 'Veuillez remplir correctement le formulaire.';
    }
  }
}
