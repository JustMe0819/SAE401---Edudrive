import { Component } from '@angular/core';
import { FormBuilder, FormGroup } from '@angular/forms';
import { Router } from '@angular/router';

@Component({
  selector: 'app-form-inscription-formateur',
  standalone: false,
  templateUrl: './form-inscription-formateur.component.html',
  styleUrl: './form-inscription-formateur.component.css'
})
export class FormInscriptionFormateurComponent {


  loginForm: FormGroup;
  showPassword: boolean = false;
  showConfirmPassword: boolean = false;

  constructor(private fb: FormBuilder, private router: Router) {
    this.loginForm = this.fb.group({
      nom: [''],
      prenom: [''],
      email: [''],
      autoecole: [''],
      password: [''],
      remember: [false]
    });
  }

  togglePasswordVisibility(field: string) {
    if (field === 'password') {
        this.showPassword = !this.showPassword;
    } else if (field === 'confirmPassword') {
        this.showConfirmPassword = !this.showConfirmPassword;
    }
}


  goToAccueilEleve() {
    this.router.navigate(['/page-acceuil-eleve']);
  }
}
