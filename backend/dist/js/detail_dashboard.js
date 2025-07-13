// Javascript
$("#arrange").change(function(e){
	window.location = base_url + "Home?t=" + $("#arrange").val();
});

function doit(){
    var temp = $("#brancOption").val();
    $("#action").val(temp);
    $("#productView").submit();
  }


function formatNumber(biaya) {
    var n = parseFloat(biaya);
    var value = n.toLocaleString(
      undefined, // use a string like 'en-US' to override browser locale
      { minimumFractionDigits: 2 }
    );
    return value;
}

// Shared Colors Definition
const primary = '#6993FF';
const success = '#1BC5BD';
const info = '#8950FC';
const warning = '#FFA800';
const danger = '#F64E60';

var jsonValueV = JSON.parse($("#jsonValue").html());
// var customer = JSON.parse($("#itemCharts").html());
// var item = JSON.parse($("#customerCharts").html());

var timeStamp = JSON.parse($("#timeStamp").html());
var apv = JSON.parse($("#apv").html());
var rjc = JSON.parse($("#rjc").html());
// var branch = JSON.parse($("#project").html());
    //var branch_revenue = JSON.parse($("#branch_revenue").html());
    // var tempBranch = [];

    // for (var x in branch) {
    // 	tempBranch.push(branch[x]);
    // }

    // $(function () {
    // 	Highcharts.chart('chartsa', {
    // 		chart: {
    // 			type: 'line'
    // 		},
    // 		title: {
    // 			text: 'Statistik Permintaan KTP-El Reader'
    // 		},
    // 		subtitle: {
    // 			text: 'Source: SIM - SAM'
    // 		},
    // 		xAxis: {
    // 			categories: timeStamp
    // 		},
    // 		yAxis: {
    // 			title: {
    // 				text: 'Certificates'
    // 			}
    // 		},
    // 		plotOptions: {
    // 			line: {
    // 				dataLabels: {
    // 					enabled: true
    // 				},
    // 				enableMouseTracking: false
    // 			}
    // 		},
    // 		series: [{
    // 			name: 'Total',
    // 			data: jsonValueV
    // 		}, {
    // 			name: 'Approved',
    // 			data: apv
    // 		}, {
    //             name: 'Rejected',
    //             data: rjc
    //         }]
    // 	});
    // });

	var KTApexChartsDemo = function () {
		// Private functions
		var chartRecap = function () {
			const apexChart = "#chart_1";
			var options = {
				series: [{
					name: 'Total',
					data: jsonValueV
				},
				{
					name: 'Approved',
					data : apv
				},
				{
					name: 'Rejected',
					data : rjc
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
					categories: timeStamp
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

	var tableHome = function (){
		var initTable1 = function() {
			var table = $('#kt_datatable1');
	
			// begin first table
			table.DataTable({
				scrollY: '50vh',
				scrollX: true,
				scrollCollapse: true,
			});
		}
	
		return {
			// public functions
			init: function () {
				initTable1();
			}
		};
	}();
	
	
	
	var DateFilter = function () {
		var dateRangeFilter = function(){
	
			$('#startDateFilter').datetimepicker({
				format: 'YYYY-MM-DD'
			});
			$('#endDateFilter').datetimepicker({
				useCurrent: false,
				format: 'YYYY-MM-DD'
			});
	
			$('#startDateFilter').on('change.datetimepicker', function (e) {
				$('#endDateFilter').datetimepicker('minDate', e.date);
			});
			$('#endDateFilter').on('change.datetimepicker', function (e) {
				$('#startDateFilter').datetimepicker('maxDate', e.date);
			});
			
		};
	
		return {
			// Public functions
			init: function() {
				dateRangeFilter();
			}
		};
	
	}();
	
	
	jQuery(document).ready(function () {
		KTApexChartsDemo.init();
		DateFilter.init();
		tableHome.init();
	});