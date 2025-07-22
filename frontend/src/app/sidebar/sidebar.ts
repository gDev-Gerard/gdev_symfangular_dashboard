import { CommonModule } from '@angular/common';
import { Component, inject, signal } from '@angular/core';
import { animate, style, transition, trigger } from '@angular/animations';
import { Router, RouterModule, RouterOutlet } from '@angular/router';
//import {filter} from 'rxjs';


@Component({
  selector: 'app-sidebar',
  imports: [ CommonModule, RouterModule, RouterOutlet ],
  templateUrl: './sidebar.html',
  styleUrl: './sidebar.css',
  animations: [
    trigger('expandContractMenu',
      [
        transition(':enter', [style({opacity: 1, height: 0}),
          animate('500ms ease-out', style({ opacity: 1, height: '*' }) ) ]),
        transition(':leave', [//style({opacity: 0, height: 0}),
          animate('500ms ease-out', style({ opacity: 1, height: '*' }) ) ])
      ]
    )]
})

export class Sidebar {
  collapsed = signal(false);
  router =  inject(Router)

  isActive(route:string){
    return this.router.url===route;
  }
}
