import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { AuthService } from '../../service/auth.service';

@Component({
  selector: 'app-form-inscription-formateur',
  standalone: false,
  templateUrl: './form-inscription-formateur.component.html',
  styleUrls: ['./form-inscription-formateur.component.css']
})
export class FormInscriptionFormateurComponent {
  registerForm: FormGroup;
  errorMessage: string = '';
  showPassword: boolean = false;
  showConfirmPassword: boolean = false; 

  constructor(private fb: FormBuilder, private authService: AuthService, private router: Router) {
    this.registerForm = this.fb.group({
      nom: ['', Validators.required],
      prenom: ['', Validators.required],
      email: ['', [Validators.required, Validators.email]],
      autoecole: ['', Validators.required],
      password: ['', [Validators.required, Validators.minLength(6)]],
      confirmPassword: ['', [Validators.required, Validators.minLength(6)]]
    }, {
      validators: this.passwordMatchValidator
    });
  }

  // ✅ Corrigé : Ajout de la fonction pour afficher/masquer le mot de passe
  togglePasswordVisibility(field: string) {
    if (field === 'password') {
      this.showPassword = !this.showPassword;
    } else if (field === 'confirmPassword') {
      this.showConfirmPassword = !this.showConfirmPassword;
    }
  }

  passwordMatchValidator(form: FormGroup) {
    const password = form.get('password')?.value;
    const confirmPassword = form.get('confirmPassword')?.value;

    if (password !== confirmPassword) {
      form.get('confirmPassword')?.setErrors({ noMatch: true });
    } else {
      form.get('confirmPassword')?.setErrors(null);
    }
  }

  onSubmit() {
    if (this.registerForm.valid) {
      this.authService.registerFormateur(this.registerForm.value).subscribe(
        response => {
          if (response.emailExists) {
            // Affichage du message d'erreur avec lien cliquable
            this.errorMessage = `Cet email est déjà utilisé. <a href="/form-connexion-formateur">Cliquez ici pour vous connecter</a>`;
          } else {
            alert('Inscription réussie ! Redirection vers la connexion.');
            this.router.navigate(['/page-accueil-formateur']);
          }
        },
        error => {
          console.error('Erreur lors de l\'inscription :', error);
          this.errorMessage = error.error.message || 'Une erreur est survenue, veuillez réessayer.';
        }
      );
    } else {
      this.errorMessage = 'Veuillez remplir tous les champs obligatoires.';
    }
  }
}