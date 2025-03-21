import { Component, AfterViewInit } from '@angular/core';
import { ChartOptions, ChartData, ChartType } from 'chart.js';
import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';

@Component({
  selector: 'app-stats-eleve',
  standalone: false,
  templateUrl: './stats-eleve.component.html',
  styleUrls: ['./stats-eleve.component.css']
})
export class StatsEleveComponent implements AfterViewInit {

  public lineChartType: ChartType = 'line';
  
  public lineChartOptions: ChartOptions = {
    responsive: true,
    plugins: {
      legend: { display: true }
    }
  };

  public lineChartData: ChartData<'line'> = {
    labels: ['Test9', 'Test8', 'Test7', 'Test6', 'Test5', 'Test4', 'Test3', 'Test2', 'Test1'], 
    datasets: [
      { data: [15, 21, 20, 29, 29, 33, 30, 35, 36], label: 'Tests complets', borderColor: 'blue' },
      { data: [11, 9, 15, 18, 14, 16, 19, 20, 18], label: 'Séries thématiques', borderColor: '#FF8000' }
    ]
  };

  progress = 0;  
  totalTests = 10;   
  completedTests = 0; 

  ngAfterViewInit() {
    this.initCalendar();
  }

  initCalendar() {
    new Calendar(document.getElementById('calendar')!, {
      plugins: [dayGridPlugin],
      initialView: 'dayGridMonth'
    }).render();
  }

  calculateProgress() {
    this.progress = (this.completedTests / this.totalTests) * 100;
  }

  completeTest() {
    if (this.completedTests < this.totalTests) {
      this.completedTests++;
      this.calculateProgress();
    }
  }

  simulateTestCompletion() {
    let interval = setInterval(() => {
      if (this.completedTests < this.totalTests) {
        this.completeTest();
      } else {
        clearInterval(interval);
      }
    }, 1000);
  }
}
