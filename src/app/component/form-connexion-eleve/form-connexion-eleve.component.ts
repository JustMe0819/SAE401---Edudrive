import { Component } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-form-connexion-eleve',
  standalone: false,
  templateUrl: './form-connexion-eleve.component.html',
  styleUrl: './form-connexion-eleve.component.css'
})
export class FormConnexionEleveComponent {

  loginForm: FormGroup;
  showPassword: boolean = false;

  constructor(private fb: FormBuilder, private router: Router) {
    this.loginForm = this.fb.group({
      neph: [''],
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

