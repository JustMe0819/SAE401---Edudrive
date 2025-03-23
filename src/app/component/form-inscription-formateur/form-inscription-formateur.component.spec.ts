import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FormInscriptionFormateurComponent } from './form-inscription-formateur.component';

describe('FormInscriptionFormateurComponent', () => {
  let component: FormInscriptionFormateurComponent;
  let fixture: ComponentFixture<FormInscriptionFormateurComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [FormInscriptionFormateurComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(FormInscriptionFormateurComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
