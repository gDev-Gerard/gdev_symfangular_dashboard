import { Component, signal, OnInit } from '@angular/core';
import { transition, trigger, style, animate } from "@angular/animations";

@Component (
  {
    selector: 'app-header',
    imports: [],
    templateUrl: './header.html',
    styleUrl: './header.css',
    animations: [
      trigger('expandMenu',
        [
          transition(':enter', [style({opacity: 1, height: 0}),
            animate('500ms ease-out', style({ opacity: 1, height: '*' }) ) ]),
          transition(':leave', [//style({opacity: 0, height: 0}),
            animate('500ms ease-out', style({ opacity: 1, height: '*' }) ) ])
        ]
      )]
  })

export class Header implements OnInit {
  collapsed = signal(false);

  ngOnInit() {
    this.collaps();
  }

  collaps() {
    this.collapsed.set(!this.collapsed());
  }
}
