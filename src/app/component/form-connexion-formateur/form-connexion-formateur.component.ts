import { Component } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-form-connexion-formateur',
  standalone: false,
  templateUrl: './form-connexion-formateur.component.html',
  styleUrl: './form-connexion-formateur.component.css'
})
export class FormConnexionFormateurComponent {


  loginForm: FormGroup;
  showPassword: boolean = false;

  constructor(private fb: FormBuilder, private router: Router) {
    this.loginForm = this.fb.group({
      id: [''],
      password: [''],
      remember: [false]
    });
  }

  togglePasswordVisibility() {
    this.showPassword = !this.showPassword;
  }


  goToAccueilEleve() {
    this.router.navigate(['/page-acceuil-eleve']);
  }
}
