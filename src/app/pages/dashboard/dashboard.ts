import { Component } from '@angular/core';

interface Comment {
  user: string;
  text: string;
  date: Date;
}
@Component({
  selector: 'app-dashboard',
  imports: [],
  templateUrl: './dashboard.html',
  styleUrl: './dashboard.css'
})
export class Dashboard {
  comments: Comment[] = [
    { user: 'Usuario 1', text: 'Comentario de Ejemplo', date: new Date() },
    { user: 'Usuario 2', text: 'Comentario de Ejemplo', date: new Date() }
  ];

}
