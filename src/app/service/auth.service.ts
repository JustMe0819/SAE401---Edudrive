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

  private apiUrl = 'http://localhost:3000/login';  // L'URL de ton API

  constructor(private http: HttpClient) {}

  login(neph: string, password: string): Observable<LoginResponse> {
    const body = { neph, password };
    return this.http.post<LoginResponse>(this.apiUrl, body);
  }
}
