import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FormConnexionEleveComponent } from './form-connexion-eleve.component';

describe('FormConnexionEleveComponent', () => {
  let component: FormConnexionEleveComponent;
  let fixture: ComponentFixture<FormConnexionEleveComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [FormConnexionEleveComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(FormConnexionEleveComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
