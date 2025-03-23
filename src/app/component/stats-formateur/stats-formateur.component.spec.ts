import { ComponentFixture, TestBed } from '@angular/core/testing';

import { StatsFormateurComponent } from './stats-formateur.component';

describe('StatsFormateurComponent', () => {
  let component: StatsFormateurComponent;
  let fixture: ComponentFixture<StatsFormateurComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [StatsFormateurComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(StatsFormateurComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
