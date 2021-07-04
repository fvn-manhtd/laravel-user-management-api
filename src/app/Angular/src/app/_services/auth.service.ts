import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

const AUTH_API = 'http://api.alaki-staff.test/api/';

const httpOptions = {
  headers: new HttpHeaders({ 'Content-Type': 'application/json', 'X-Requested-With' : 'XMLHttpRequest' })
};

@Injectable({
  providedIn: 'root'
})
export class AuthService {

  constructor(private http: HttpClient) { }

  login(credentials): Observable<any> {
    return this.http.post(AUTH_API + 'login', {
      username: credentials.username,
      password: credentials.password
    }, httpOptions);
  }

  register(user): Observable<any> {
    return this.http.post(AUTH_API + 'register', {
      first_name: user.firstname,
      last_name: user.lastname,
      email: user.email,
      password: user.password,
      password_confirm: user.password
    }, httpOptions);
  }
}