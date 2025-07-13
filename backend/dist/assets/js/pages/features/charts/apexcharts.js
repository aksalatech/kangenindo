"use strict";

// Shared Colors Definition
const primary = '#6993FF';
const success = '#1BC5BD';
const info = '#8950FC';
const warning = '#FFA800';
const danger = '#F64E60';

// Class definition
function generateBubbleData(baseval, count, yrange) {
    var i = 0;
    var series = [];
    while (i < count) {
      var x = Math.floor(Math.random() * (750 - 1 + 1)) + 1;;
      var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
      var z = Math.floor(Math.random() * (75 - 15 + 1)) + 15;
  
      series.push([x, y, z]);
      baseval += 86400000;
      i++;
    }
    return series;
  }

function generateData(count, yrange) {
    var i = 0;
    var series = [];
    while (i < count) {
        var x = 'w' + (i + 1).toString();
        var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

        series.push({
            x: x,
            y: y
        });
        i++;
    }
    return series;
}

var KTApexChartsDemo = function () {
	// Private functions
	var chartRecap = function () {
		const apexChart = "#chart_1";
		var options = {
			series: [{
				name: 'On Progress',
				data: [10, 41, 35, 51, 49, 62, 69, 91, 148]
			},
			{
				name: 'Approved',
				data : [8 , 50, 20, 32, 60, 70, 80, 92, 130]
			},
			{
				name: 'Reject',
				data : [7, 20, 30, 42, 21, 73, 24, 44, 210]
			}
			],
			chart: {
				height: 350,
				type: 'line',
				zoom: {
					enabled: false
				}
			},
			dataLabels: { 	
				enabled: false
			},
			
			stroke: {
				curve: 'straight'
			},
			grid: {
				row: {
					colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
					opacity: 0.5
				},
			},
			xaxis: {
				type: 'datetime',
				categories: ["2018-09-10", "2018-09-11", "2018-09-12", "2018-09-13", "2018-09-14", "2018-09-15", "2018-09-16", "2018-09-17", "2018-09-18"]
			},
			tooltip: {
				x: {
					format: 'dd/MM/yy'
				},
			},
			colors: [primary,success,danger]
		};

		var chart = new ApexCharts(document.querySelector(apexChart), options);
		chart.render();
	}

	return {
		// public functions
		init: function () {
			chartRecap();
		}
	};
}();

jQuery(document).ready(function () {
	KTApexChartsDemo.init();
});
