import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FormConnexionFormateurComponent } from './form-connexion-formateur.component';

describe('FormConnexionFormateurComponent', () => {
  let component: FormConnexionFormateurComponent;
  let fixture: ComponentFixture<FormConnexionFormateurComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [FormConnexionFormateurComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(FormConnexionFormateurComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
