import { Routes } from '@angular/router';
import { Dashboard } from './pages/dashboard/dashboard';

export const routes: Routes =
[
  { path: 'dashboard', loadComponent: () => import('./pages/dashboard/dashboard').then( m => m.Dashboard) },
  { path: 'forms', loadComponent: () => import('./pages/forms/forms').then( m => m.Forms) },
  { path: 'login', loadComponent: () => import('./pages/login/login').then( m => m.Login) },
  { path: '', redirectTo: 'dashboard', pathMatch: 'full' }
];

