import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

export interface LoginResponse {
  message: string;
}

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  // URL de l'API pour la connexion élève et formateur
  private eleveApiUrl = 'http://localhost:3000/login';  // Connexion élève
  private formateurApiUrl = 'http://localhost:3000/login-formateur';  // Connexion formateur
  private apiUrl = 'https://localhost:3000/inscription'; // Inscription formateur


  constructor(private http: HttpClient) {}

  // Connexion élève
  login(neph: string, password: string): Observable<LoginResponse> {
    const body = { neph, password };
    return this.http.post<LoginResponse>(this.eleveApiUrl, body);
  }

  // Inscription formateur
  registerFormateur(formData: any): Observable<any> {
    return this.http.post(`${this.formateurApiUrl}/inscription-formateur`, formData);
  }

  // Connexion formateur
  loginFormateur(credentials: { email: string, password: string }): Observable<LoginResponse> {
    return this.http.post<LoginResponse>(this.formateurApiUrl, credentials);
  }
}
