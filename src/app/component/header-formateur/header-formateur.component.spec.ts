import { ComponentFixture, TestBed } from '@angular/core/testing';

import { HeaderFormateurComponent } from './header-formateur.component';

describe('HeaderFormateurComponent', () => {
  let component: HeaderFormateurComponent;
  let fixture: ComponentFixture<HeaderFormateurComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [HeaderFormateurComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(HeaderFormateurComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
