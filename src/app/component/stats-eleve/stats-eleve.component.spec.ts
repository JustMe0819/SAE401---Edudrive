import { ComponentFixture, TestBed } from '@angular/core/testing';

import { StatsEleveComponent } from './stats-eleve.component';

describe('StatsEleveComponent', () => {
  let component: StatsEleveComponent;
  let fixture: ComponentFixture<StatsEleveComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [StatsEleveComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(StatsEleveComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
