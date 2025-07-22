import {Component, ElementRef, viewChild, ViewChild} from '@angular/core';
import { CommonModule, DatePipe } from '@angular/common';
import { Chart, elements } from 'chart.js/auto';
import createPlugin from 'tailwindcss/plugin';
import withOptions = createPlugin.withOptions;

interface TodoList {
  date: Date;
  title: string;
  description: string;
}
@Component({
  selector: 'app-dashboard',
  imports: [ DatePipe, CommonModule ],
  templateUrl: './dashboard.html',
  styleUrl: './dashboard.css'
})
export class Dashboard {

  chart = viewChild.required<ElementRef>('chart');

  todo: TodoList[] = [
    { date: new Date(), title: 'To-Do 1', description: 'Descripción de la tarea 1' },
    { date: new Date(), title: 'To-Do 2', description: 'Descripción de la tarea 2' },
    { date: new Date(), title: 'To-Do 3', description: 'Descripción de la tarea 3' }
  ];

  ngOnInit() {
    new Chart(this.chart().nativeElement,
    {
      type: 'line',
      data:
        {
          labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
          datasets:
            [
              {
                //label: 'Visitantes',
                data: [150, 326, 285, 184, 325, 726, 1570, 1862, 965, 325, 112, 178],
                borderColor: '#FFF',
                backgroundColor: 'rgba(0,0,192,0.2)',
                fill: 'start'
              }
            ]
        },
      options:
        {
          maintainAspectRatio: false,
          responsive: true,
          elements: { line: { tension: 0.4 } },
          scales: {
            x: {
              ticks: { color: '#FFF' },
              grid: { color: '#ffffff50'}
            }
          }
        },
      //plugins: { legend: { labels: { color: '#FFF' } } }
    })
  }
}
