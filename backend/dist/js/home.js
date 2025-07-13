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


var jsonValueV = JSON.parse($("#jsonValue").html());
var mapChart = JSON.parse($("#mapChart").html());
// var customer = JSON.parse($("#itemCharts").html());
// var item = JSON.parse($("#customerCharts").html());

var timeStamp = JSON.parse($("#timeStamp").html());
var apv = JSON.parse($("#apv").html());
var rjc = JSON.parse($("#rjc").html());

// Shared Colors Definition
const primary = '#6993FF';
const success = '#1BC5BD';
const info = '#8950FC';
const warning = '#FFA800';
const danger = '#F64E60';

// var branch = JSON.parse($("#project").html());
    //var branch_revenue = JSON.parse($("#branch_revenue").html());
    // var tempBranch = [];

    // for (var x in branch) {
    // 	tempBranch.push(branch[x]);
    // }

    var index = 0;
    var map;
    var infoWindow = [];
    function initMap() {
    	var index = 0;

    	var current = {lat: -6.1745 , lng:106.8227}

    	map = new google.maps.Map(document.getElementById('map'), {
    		center: current,
    		scrollwheel: false,
    		zoom: 7
    	});

    	for (var i = 0; i < tempBranch.length; i++) {
    		index++;
            var prjID = tempBranch[i]["projectID"];
    		var name = tempBranch[i]["projectNm"];
    		var address = tempBranch[i]["address"];
    		var city = tempBranch[i]["city"];
    		var countryNm = tempBranch[i]["countryNm"];
    		var latitude = tempBranch[i]["latitude"];
    		var langitude = tempBranch[i]["langitude"];
    		var total = tempBranch[i]["total"];
    		var marker = [];
    		var myPosition = {lat: latitude, lng: langitude};
            // Create a map object and specify the DOM element for display.
            var contentString = "<div id='content'><b>"+name+
            "</b></br>"+address+"<br>"+city+"<br/>"+countryNm+
            "<br/><br/>Nilai Proyek :<br/><b>Rp. "+ formatNumber(total) +
            "</b></div>";
            infoWindow[i] = addMarker(prjID, myPosition, contentString);
        }

        map.addListener("click", function()
        {
        	clearInfoWindow();
        });
    }

    function clearInfoWindow()
    {
    	for (var i=0; i<infoWindow.length;i++)
    	{
    		infoWindow[i].close();
    	}
    }

    function getBranchInfo(projectID)
    {
    	$.ajax({
    		url : base_url + "Home/get_info_project",
    		type : "POST",
    		dataType : "html",
    		data : "id=" + projectID,
    		success : function(result)
    		{
    			var json = $.parseJSON(result);
                var cost = json.real_materialCost + json.real_workCost + json.real_otherCost;
    			$("#branchRevenue").html("Rp. " + formatNumber(json.cost));
    			$("#branchCost").html("Rp. " + formatNumber(cost));
    			$("#branchProfit").html("Rp. " + formatNumber(json.cost-cost));
    		},
    		error : function(result) 
    		{
    			console.log("AJAX Error : " + result);
    		}
    	})
    }

    function addMarker(prjID, myPosition, contentString)
    {
    	var infoWindow = new google.maps.InfoWindow({
    		content : contentString
    	});

    	var marker = new google.maps.Marker({
    		map : map,
    		position : myPosition,
    		title : prjID
    	});

    	marker.addListener('click', function() {
    		clearInfoWindow();
    		infoWindow.open(map, marker);
    		getBranchInfo(prjID);
    	});

    	return infoWindow;
    }

    // $(function () {
    // 	Highcharts.chart('chartsa', {
    // 		chart: {
    // 			type: 'line'
    // 		},
    // 		title: {
    // 			text: 'Statistik Aktivasi SAM'
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
	
	// var _initMixedWidget1 = function () {
	// 	var element = document.getElementById("kt_mixed_widget_1_chart");
	// 	var height = parseInt(KTUtil.css(element, 'height'));
	
	// 	if (!element) {
	// 		return;
	// 	}
	
	// 	var strokeColor = '#D13647';
	
	// 	var options = {
	// 		series: [{
	// 			name: 'Request',
	// 			data: jsonValueV
	// 		}],
	// 		chart: {
	// 			type: 'area',
	// 			height: height,
	// 			toolbar: {
	// 				show: false
	// 			},
	// 			zoom: {
	// 				enabled: false
	// 			},
	// 			sparkline: {
	// 				enabled: true
	// 			},
	// 			dropShadow: {
	// 				enabled: true,
	// 				enabledOnSeries: undefined,
	// 				top: 5,
	// 				left: 0,
	// 				blur: 3,
	// 				color: strokeColor,
	// 				opacity: 0.5
	// 			}
	// 		},
	// 		plotOptions: {},
	// 		legend: {
	// 			show: false
	// 		},
	// 		dataLabels: {
	// 			enabled: false
	// 		},
	// 		fill: {
	// 			type: 'solid',
	// 			opacity: 0
	// 		},
	// 		stroke: {
	// 			curve: 'smooth',
	// 			show: true,
	// 			width: 3,
	// 			colors: [strokeColor]
	// 		},
	// 		xaxis: {
	// 			categories: timeStamp,
	// 			axisBorder: {
	// 				show: false,
	// 			},
	// 			axisTicks: {
	// 				show: false
	// 			},
	// 			labels: {
	// 				show: false,
	// 				style: {
	// 					colors: KTApp.getSettings()['colors']['gray']['gray-500'],
	// 					fontSize: '12px',
	// 					fontFamily: KTApp.getSettings()['font-family']
	// 				}
	// 			},
	// 			crosshairs: {
	// 				show: false,
	// 				position: 'front',
	// 				stroke: {
	// 					color: KTApp.getSettings()['colors']['gray']['gray-300'],
	// 					width: 1,
	// 					dashArray: 3
	// 				}
	// 			}
	// 		},
	// 		yaxis: {
	// 			min: 0,
	// 			max: 80,
	// 			labels: {
	// 				show: false,
	// 				style: {
	// 					colors: KTApp.getSettings()['colors']['gray']['gray-500'],
	// 					fontSize: '12px',
	// 					fontFamily: KTApp.getSettings()['font-family']
	// 				}
	// 			}
	// 		},
	// 		states: {
	// 			normal: {
	// 				filter: {
	// 					type: 'none',
	// 					value: 0
	// 				}
	// 			},
	// 			hover: {
	// 				filter: {
	// 					type: 'none',
	// 					value: 0
	// 				}
	// 			},
	// 			active: {
	// 				allowMultipleDataPointsSelection: false,
	// 				filter: {
	// 					type: 'none',
	// 					value: 0
	// 				}
	// 			}
	// 		},
	// 		tooltip: {
	// 			style: {
	// 				fontSize: '12px',
	// 				fontFamily: KTApp.getSettings()['font-family']
	// 			},
	// 			marker: {
	// 				show: false
	// 			}
	// 		},
	// 		colors: ['transparent'],
	// 		markers: {
	// 			colors: [KTApp.getSettings()['colors']['theme']['light']['danger']],
	// 			strokeColor: [strokeColor],
	// 			strokeWidth: 3
	// 		}
	// 	};
	
	// 	var chart = new ApexCharts(element, options);
	// 	chart.render();
	// }
	
	var KTApexChartsDemo = function () {
		// Private functions
		var chartRecap = function () {
			const apexChart = "#chart_1";
			var options = {
				series: [{
					name: 'Total Alumni',
					data: jsonValueV
				},
				{
					name: 'Total Alumni Pria',
					data : apv
				},
				{
					name: 'Total Alumni Wanita',
					data : rjc
				}
				],
				chart: {
					height: 350,
					type: 'bar',
					zoom: {
						enabled: false
					}
				},
				title: {
					text: 'Statistik Data Alumni IPB HAE'
				},
				subtitle: {
					text: 'Source: IPB HAE'
				},
				dataLabels: { 	
					enabled: false
				},
				grid: {
					row: {
						colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
						opacity: 0.5
					},
				},
				xaxis: {
					categories: timeStamp
				},
				yAxis: {
					title: {
						text: 'Kartu SAM'
					}
				},
				plotOptions: {
					column: {
					   pointPadding: 0.2,
					   borderWidth: 0
				   }
			   },
				tooltip: {
					headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
					pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
						'<td style="padding:0"><b>{point.y:.0f} kartu</b></td></tr>',
					footerFormat: '</table>',
					shared: true,
					useHTML: true
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

		(async () => {

		    const data = await fetch(
		        'https://demo-live-data.highcharts.com/aapl-v.json'
		    ).then(response => response.json());

		    // // create the chart
		    // Highcharts.chart('chart_1', {
		    // 	chart: {
			   //      type: 'bar'
			   //  },
		    //     rangeSelector: {
		    //         selected: 1
		    //     },

		    //     title: {
		    //         text: 'Statistik Data Alumni IPB HAE'
		    //     },

		    //     xAxis: {
		    //     	type: 'category',
	    	// 		categories: timeStamp,
	    	// 		labels: {
				  //     rotation: 45, // Rotate labels for better readability
				  //     style: {
				  //       fontSize: '13px' // Adjust font size if needed
				  //     }
				  //   }
	    	// 	},

		    //     series: [{
		    //     	type: 'column',
		    //         name: 'Total Alumni',
		    //         data: jsonValueV,
		    //     }, {
		    //     	type: 'column',
		    //         name: 'Total Pria',
		    //         data: apv,
		    //     }, {
		    //     	type: 'column',
		    //         name: 'Total Wanita',
		    //         data: rjc,
		    //     }]
		    // });
		})();		
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

	// (async () => {

	//     const topology = await fetch(
	//         'https://code.highcharts.com/mapdata/countries/id/id-all.topo.json'
	//     ).then(response => response.json());

	//     // Prepare demo data. The data is joined to map using value of 'hc-key'
	//     // property by default. See API docs for 'joinBy' for more info on linking
	//     // data and map.
	//     // const data = [
	//     //     ['id-3700', 10], ['id-ac', 11], ['id-jt', 12], ['id-be', 13],
	//     //     ['id-bt', 14], ['id-kb', 15], ['id-bb', 16], ['id-ba', 17],
	//     //     ['id-ji', 18], ['id-ks', 19], ['id-nt', 20], ['id-se', 21],
	//     //     ['id-kr', 22], ['id-ib', 23], ['id-su', 24], ['id-ri', 25],
	//     //     ['id-sw', 26], ['id-ku', 27], ['id-la', 28], ['id-sb', 29],
	//     //     ['id-ma', 30], ['id-nb', 31], ['id-sg', 32], ['id-st', 33],
	//     //     ['id-pa', 34], ['id-jr', 35], ['id-ki', 36], ['id-1024', 37],
	//     //     ['id-jk', 38], ['id-go', 39], ['id-yo', 40], ['id-sl', 41],
	//     //     ['id-sr', 42], ['id-ja', 43], ['id-kt', 44]
	//     // ];

	//     // Create the chart
	//     Highcharts.mapChart('chart_3', {
	//         chart: {
	//             map: topology,
	//             backgroundColor: "#B8D7F4",
	//         },

	//         title: {
	//             text: 'Grafik Sebaran Alumni IPB HAE'
	//         },

	//         subtitle: {
	//             text: 'Source map: <a href="http://code.highcharts.com/mapdata/countries/id/id-all.topo.json">Indonesia</a>'
	//         },

	//         mapNavigation: {
	//             enabled: true,
	//             buttonOptions: {
	//                 verticalAlign: 'bottom'
	//             }
	//         },

	//         colorAxis: {
	//             min: 0,
	//          //    stops: [
	// 	        //     [0, 'red'],      // Values less than 0 will be red
	// 	        //     [0.01, 'orange'], // Values between 0 and 0.25 will be orange
	// 	        //     [0.05, 'lightblue'],  // Values between 0.25 and 0.5 will be yellow
	// 	        //     [0.1, 'green'],  // Values between 0.5 and 0.75 will be green
	// 	        //     [0.3, 'blue'],  // Values between 0.5 and 0.75 will be green
	// 	        //     [0.6, 'magenta'],  // Values between 0.5 and 0.75 will be green
	// 	        //     [1, 'navy']       // Values greater than or equal to 0.75 will be blue
	// 	        // ]
	// 	        stops: [
	// 	            [0, 'White'],      // Values less than 0 will be red
	// 	            [0.01, '#0B4C63'], // Values between 0 and 0.25 will be orange
	// 	            [0.05, '#7350BB'],  // Values between 0.25 and 0.5 will be yellow
	// 	            [0.1, '#3CD391'],  // Values between 0.5 and 0.75 will be green
	// 	            [0.3, '#4AA0FF'],  // Values between 0.5 and 0.75 will be green
	// 	            [0.6, '#053254'],  // Values between 0.5 and 0.75 will be green
	// 	            [1, '#011321']       // Values greater than or equal to 0.75 will be blue
	// 	        ]
	//         },
	//         legend: {
	//             title: {
	//                 text: 'Value Scale'
	//             },
	//             align: 'right',
	//             layout: 'vertical',
	//             verticalAlign: 'middle',
	// 	        labelFormatter: function () {
	// 	            // Define labels and explanations for the legend
	// 	            const labelsAndExplanations = [
	// 	                // { label: 'Red', explanation: '<= 0' },
	// 	                // { label: 'Orange', explanation: 'Values between 0 and 0.25' },
	// 	                // { label: 'Green', explanation: 'Values between 0.25 and 0.5' },
	// 	                // { label: 'Light Blue', explanation: 'Values between 0.5 and 0.75' },
	// 	                // { label: 'Light Green', explanation: 'Values between 0.5 and 0.75' },
	// 	                // { label: 'Magenta', explanation: 'Values between 0.5 and 0.75' },
	// 	                // { label: 'Navy', explanation: 'Values greater than or equal to 0.75' }
	// 	                { label: 'White', explanation: '<= 0' },
	// 	                { label: '#0B4C63', explanation: 'Values between 0 and 0.25' },
	// 	                { label: '#7350BB', explanation: 'Values between 0.25 and 0.5' },
	// 	                { label: '#3CD391', explanation: 'Values between 0.5 and 0.75' },
	// 	                { label: '#4AA0FF', explanation: 'Values between 0.5 and 0.75' },
	// 	                { label: '#053254', explanation: 'Values between 0.5 and 0.75' },
	// 	                { label: '#011321', explanation: 'Values greater than or equal to 0.75' }
	// 	            ];
		            
	// 	            const index = this.index;
	// 	            const labelAndExplanation = labelsAndExplanations[index];

	// 	            // Construct the label with an explanation
	// 	            return labelAndExplanation.label + ': ' + labelAndExplanation.explanation;
	// 	        }
	//         },
	//         series: [{
	//             data: mapChart,
	//             name: 'Jumlah Alumni',
	//             states: {
	//                 hover: {
	//                     color: '#BADA55'
	//                 }
	//             },
	//             dataLabels: {
	//                 enabled: true,
	//                 // format: '{point.name}',
	//                 formatter: function() {
	// 		            if (this.point['hc-key'] == 'id-ib') {
	// 		                return 'Papua Barat';
	// 		            } else if (this.point['hc-key'] == 'id-jk') {
	// 		                return 'DKI Jakarta';
	// 		            }

	// 		            return this.point.name;
	// 		        }
	//             },
	//              tooltip: {
	// 	              headerFormat: '',
	// 	              useHTML: true,
	// 	              pointFormatter: function () {
	// 	                  // Customize the tooltip content here
	// 	                  var customData = "";
	// 	                  var provName = this.name;
	// 	                  // alert(provName);
	// 	                  if (provName == "Irian Jaya Barat") {
	// 	                  	provName = "Papua Barat";
	// 	                  } else if (provName == "Bangka-Belitung") {
	// 	                  	provName = "Kepulauan Bangka Belitung";
	// 	                  } else if (provName == "Jakarta Raya") {
	// 	                  	provName = "DKI Jakarta";
	// 	                  } else if (provName == "Yogyakarta") {
	// 	                  	provName = "Daerah Istimewa Yogyakarta";
	// 	                  }
	// 	                  $.ajax({
	// 	                  	url : base_url + "Dashboard/get_tooltip?prov=" + provName,
	// 	                  	type: "GET",
	// 	                  	async: false,
	// 	                  	dataType: "html",
	// 	                  	success: function(result) {
	// 	                  		console.log(result);
	// 	                  		var json = $.parseJSON(result);
	// 	                  		var html = "";
	// 	                  		for(var i=0;i<json.length;i++) {
	// 	                  			html += json[i].kabkot_name + ": " + json[i].jml + "<br>";
	// 	                  		}
	// 	                  		// alert("#customData-" + provName.replace(/ /g,"_"));
	// 	                  		 // const escapedData = $('<div/>').text(html).html()
	// 	                  		 // const parsedData = $.parseHTML(html);
	// 	                  		customData = html;
	// 	                  		// $("#customData-" + provName.replace(/ /g,"_")).html(parsedData);
	// 	                  		// console.log($("#customData-" + provName.replace(/ /g,"_")).html());
	// 	                  	},
	// 	                  	error: function(result) {
	// 	                  		console.log(result);
	// 	                  		alert("Error when getting tool tip !");
	// 	                  	}
		                  	
	// 	                  });
						
	// 	                  return '<b>' + provName + ': ' + this.value + '</b><br><div id="customData-' + this.name.replace(/ /g,"_") + '">' + customData + '</div>';
	// 	              }
	// 	          }
	//         }]
	//     });

	// })();


	// (async () => {

	//     const topology = await fetch(
	//         'https://code.highcharts.com/mapdata/countries/id/id-all.topo.json'
	//     ).then(response => response.json());

	//     // const data = await fetch(
	//     //     'https://cdn.jsdelivr.net/gh/highcharts/highcharts@1e9e659c2d60fbe27ef0b41e2f93112dd68fb7a3/samples/data/european-train-stations-near-airports.json'
	//     // ).then(response => response.json());

	//     Highcharts.mapChart('chart_2', {
	//         chart: {
	//             map: topology,
	//             backgroundColor: "#B8D7F4",
	//             events: {
	// 		        render: function() {
	// 		          //color clusters based on data avg
	// 		          const mapChart = this;

	// 		          if (mapChart.series[1].markerClusterInfo.clusters.length > 0) {
	// 		          	console.log(mapChart.series[1].markerClusterInfo.clusters.length);
	// 		            for (let i = 0; i < mapChart.series[1].markerClusterInfo.clusters.length; i++) {
	// 		            	let avg = 0;
	// 		            	let clusterData = mapChart.series[1].markerClusterInfo.clusters[i].data.map(el => el.options.value);
	// 		            	sum = clusterData.reduce((a, b) => a + b, 0);
	// 		            	avg = sum;
	// 		            	// for (let j = 0; j < mapChart.series[1].markerClusterInfo.clusters[i].data.length; j++) {
			            			
					              
	// 				           //    avg += parseInt(sum); // (sum / clusterData.length) || -1;

	// 				           //    mapChart.series[1].markerClusterInfo.clusters[i].data[j].avg = avg;
					              
	// 		            	// }
	// 		            	mapChart.series[1].markerClusterInfo.clusters[i].avg = avg;
	// 			              clusterPoint = mapChart.series[1].markerClusterInfo.clusters[i].point;
	// 			              console.log(clusterPoint);
	// 			              clusterPoint.avg = avg;
	// 			              clusterPoint.clusterPointsAmount = avg;
	// 			              // clusterPoint.marker.radius = avg / 5;
	// 			              if (clusterPoint.dataLabel != null) {
	// 								clusterPoint.dataLabel.attr({
	// 									text: avg
	// 								});
	// 							}


			              
	// 					   var total = parseFloat($("#minimize_2 > div.card-toolbar > div.card-container2 > div:nth-child(1) > p:nth-child(3)").text());			
	// 		              if (avg >= total) {
	// 		              	if (clusterPoint.graphic != null) {
	// 			                clusterPoint.graphic.attr({
	// 			                  fill: "#011321"
	// 			                });
	// 		            	}
	// 						clusterPoint.marker.fillColor = "##011321";
	// 		              } else if (avg >= 0.7 * total) {
	// 		              	if (clusterPoint.graphic != null) {
	// 			                clusterPoint.graphic.attr({
	// 			                  fill: "#08497B"
	// 			                });
	// 		            	}
	// 						clusterPoint.marker.fillColor = "#08497B";
	// 		              } else if (avg >= 0.5 * total) {
	// 		              	if (clusterPoint.graphic != null) {
	// 			                clusterPoint.graphic.attr({
	// 			                  fill: "#0D62A3"
	// 			                });
	// 		            	}
	// 						clusterPoint.marker.fillColor = "#0D62A3";
	// 		              } else if (avg >= 0.3 * total) {
	// 			            if (clusterPoint.graphic != null) {
	// 			                clusterPoint.graphic.attr({
	// 			                  fill: "#2F77AE"
	// 			                });
	// 		            	}
	// 						clusterPoint.marker.fillColor = "#2F77AE";
	// 		              } else if (avg >= 0.1 * total) {
	// 		              	if (clusterPoint.graphic != null) {
	// 			                clusterPoint.graphic.attr({
	// 			                  fill: "#4E8EC0"
	// 			                });
	// 		            	}
	// 						clusterPoint.marker.fillColor = "#4E8EC0";
	// 		              } else if (avg <= 0) {
	// 		              	if (clusterPoint.graphic != null) {
	// 			                clusterPoint.graphic.attr({
	// 			                  fill: "#ffffff"
	// 			                });
	// 		            	}
	// 						clusterPoint.marker.fillColor = "#ffffff";
	// 		              }
	// 		            }

	// 		          }
	// 		        }
	// 		      }
	//         },
	//         title: {
	//             text: 'Grafik Sebaran Alumni IPB HAE',
	//             align: 'center'
	//         },
	//         subtitle: {
	//             text: 'Source map: Indonesia',
	//             align: 'center'
	//         },
	//         mapNavigation: {
	//             enabled: true
	//         },
	//          legend: {
	//             title: {
	//                 text: 'Value Scale'
	//             },
	//             // align: 'right',
	//             // layout: 'vertical',
	//             // verticalAlign: 'middle'
	//         },
	//         tooltip: {
	//             headerFormat: '',
	//             pointFormat: '<b>{point.name}</b><br><b>Jml Alumni:</b> {point.total:.0f}<br/><b>Jml Male:</b> {point.total_male:.0f}<br/><b>Jml Female:</b> {point.total_female:.0f}',
	//         	clusterFormat: 'Total Alumni: {point.clusterPointsAmount}'
	//         },
	//         colorAxis: {
	//             min: 0,
	//             max: parseFloat($("#minimize_2 > div.card-toolbar > div.card-container2 > div:nth-child(1) > p:nth-child(3)").text()),
	//             stops: [
	// 	            [0, 'White'],      // Values less than 0 will be red
	// 	            [0.01, '#78ADD6'], // Values between 0 and 0.25 will be orange
	// 	            [0.1, '#4E8EC0'],  // Values between 0.25 and 0.5 will be yellow
	// 	            [0.3, '#2F77AE'],  // Values between 0.5 and 0.75 will be green
	// 	            [0.5, '#0D62A3'],  // Values between 0.5 and 0.75 will be green
	// 	            [0.7, '#08497B'],  // Values between 0.5 and 0.75 will be green
	// 	            [1, '#011321']       // Values greater than or equal to 0.75 will be blue
	// 	        ]
	//         },
	//         plotOptions: {
	//             mappoint: {
	//                 cluster: {
	//                     enabled: true,
	//                     allowOverlap: false,
	//                     animation: {
	//                         duration: 450
	//                     },
	//                     layoutAlgorithm: {
	//                         type: 'grid',
	//                         gridSize: 70
	//                     },
	//                     zones: [{
	//                         from: 1,
	//                         to: 10,
	//                         marker: {
	//                             radius: 13
	//                         }
	//                     }, {
	//                         from: 10,
	//                         to: 25,
	//                         marker: {
	//                             radius: 15
	//                         }
	//                     }, {
	//                         from: 25,
	//                         to: 60,
	//                         marker: {
	//                             radius: 17
	//                         }
	//                     }, {
	//                         from: 60,
	//                         to: 200,
	//                         marker: {
	//                             radius: 19
	//                         }
	//                     }, {
	//                         from: 200,
	//                         to: 1000,
	//                         marker: {
	//                             radius: 21
	//                         }
	//                     }]
	//                 }
	//             }
	//         },
	//         series: [{
	//             name: 'Jumlah Alumni',
	//             accessibility: {
	//                 exposeAsGroupOnly: true
	//             },
	//             borderColor: '#A0A0A0',
	//             nullColor: 'rgba(177, 244, 177, 0.5)',
	//             showInLegend: true
	//         }, {
	//             type: 'mappoint',
	//             enableMouseTracking: true,
	//             accessibility: {
	//                 point: {
	//                     descriptionFormat: '{#if isCluster}' +
	//                             'Grouping of {clusterPointsAmount} points.' +
	//                             '{else}' +
	//                             '{name}, country code: {country}.' +
	//                             '{/if}'
	//                 }
	//             },
	//             colorKey: 'clusterPointsAmount',
	//             name: 'Cities',
	//             data: mapChart,
	//             color: Highcharts.getOptions().colors[5],
	//             marker: {
	//                 lineWidth: 1,
	//                 lineColor: '#fff',
	//                 symbol: 'mapmarker',
	//                 radius: 8
	//             },
	//             dataLabels: {
	//                 verticalAlign: 'top'
	//             }
	//         }]
	//     });

	// })();

var chart;

var doubleClicker = {
    clickedOnce : false,
    timer : null,
    timeBetweenClicks : 400
};

// call to reset double click timer
var resetDoubleClick = function() {
  clearTimeout(doubleClicker.timer);
  doubleClicker.timer = null;
  doubleClicker.clickedOnce = false;
};

// Define a variable to store the last click timestamp
var lastClickTime = 0;

function handleMapClick(e) {
    var currentTime = new Date().getTime();
    
    // Calculate the time difference between the last click and the current click
    var timeDiff = currentTime - lastClickTime;

    // Check if the time difference is within the double-click threshold (e.g., 300 milliseconds)
    if (timeDiff < 300) {
        // Double-click detected, perform your custom logic here
        console.log('Double Click Detected!');
        console.log(e);
        if (event.point.name == "Indonesia") {
        	window.setTimeout(function(e) {
        		$("#divEarth").fadeOut("fast");
        		$("#divIndonesia").fadeIn("slow");
        	}, 400);
        	
        } 
        else {
        	$("#divIndonesia").hide();
        	$("#divEarth").show();
        }
    } else {
        // Single-click detected
        console.log('Single Click Detected!');
    }

    // Update the last click timestamp
    lastClickTime = currentTime;
}

function renderMap() {	
	(async () => {
		const data = [
		    {
		        name: 'United States of America',
		        value: 1477
		    },
		    {
		        name: 'Brazil',
		        value: 490
		    },
		    {
		        name: 'Mexico',
		        value: 882
		    },
		    {
		        name: 'Canada',
		        value: 161
		    },
		    {
		        name: 'Russia',
		        value: 74
		    },
		    {
		        name: 'Argentina',
		        value: 416
		    },
		    {
		        name: 'Bolivia',
		        value: 789
		    },
		    {
		        name: 'Colombia',
		        value: 805
		    },
		    {
		        name: 'Paraguay',
		        value: 2011
		    },
		    {
		        name: 'Indonesia',
		        value: 372
		    },
		    {
		        name: 'South Africa',
		        value: 466
		    },
		    {
		        name: 'Papua New Guinea',
		        value: 1239
		    },
		    {
		        name: 'Germany',
		        value: 1546
		    },
		    {
		        name: 'China',
		        value: 54
		    },
		    {
		        name: 'Chile',
		        value: 647
		    },
		    {
		        name: 'Australia',
		        value: 62
		    },
		    {
		        name: 'France',
		        value: 844
		    },
		    {
		        name: 'United Kingdom',
		        value: 1901
		    },
		    {
		        name: 'Venezuela',
		        value: 503
		    },
		    {
		        name: 'Ecuador',
		        value: 1560
		    },
		    {
		        name: 'India',
		        value: 116
		    },
		    {
		        name: 'Iran',
		        value: 208
		    },
		    {
		        name: 'Guatemala',
		        value: 2716
		    },
		    {
		        name: 'Philippines',
		        value: 828
		    },
		    {
		        name: 'Sweden',
		        value: 563
		    },
		    {
		        name: 'Saudi Arabia',
		        value: 100
		    },
		    {
		        name: 'Democratic Republic of the Congo',
		        value: 87
		    },
		    {
		        name: 'Kenya',
		        value: 346
		    },
		    {
		        name: 'Zimbabwe',
		        value: 507
		    },
		    {
		        name: 'Peru',
		        value: 149
		    },
		    {
		        name: 'Ukraine',
		        value: 323
		    },
		    {
		        name: 'Angola',
		        value: 141
		    },
		    {
		        name: 'Japan',
		        value: 480
		    },
		    {
		        name: 'United Republic of Tanzania',
		        value: 187
		    },
		    {
		        name: 'Costa Rica',
		        value: 3153
		    },
		    {
		        name: 'Algeria',
		        value: 66
		    },
		    {
		        name: 'Pakistan',
		        value: 196
		    },
		    {
		        name: 'Spain',
		        value: 301
		    },
		    {
		        name: 'Finland',
		        value: 487
		    },
		    {
		        name: 'Nicaragua',
		        value: 1225
		    },
		    {
		        name: 'Libya',
		        value: 83
		    },
		    {
		        name: 'Cuba',
		        value: 1211
		    },
		    {
		        name: 'Uruguay',
		        value: 760
		    },
		    {
		        name: 'Oman',
		        value: 426
		    },
		    {
		        name: 'Italy',
		        value: 439
		    },
		    {
		        name: 'Czech Republic',
		        value: 1657
		    },
		    {
		        name: 'Poland',
		        value: 414
		    },
		    {
		        name: 'New Zealand',
		        value: 465
		    },
		    {
		        name: 'Guyana',
		        value: 594
		    },
		    {
		        name: 'Panama',
		        value: 1574
		    },
		    {
		        name: 'Malaysia',
		        value: 347
		    },
		    {
		        name: 'Namibia',
		        value: 136
		    },
		    {
		        name: 'South Korea',
		        value: 1145
		    },
		    {
		        name: 'Honduras',
		        value: 921
		    },
		    {
		        name: 'Iraq',
		        value: 233
		    },
		    {
		        name: 'Thailand',
		        value: 198
		    },
		    {
		        name: 'Mozambique',
		        value: 125
		    },
		    {
		        name: 'Turkey',
		        value: 127
		    },
		    {
		        name: 'Iceland',
		        value: 958
		    },
		    {
		        name: 'Kazakhstan',
		        value: 36
		    },
		    {
		        name: 'Norway',
		        value: 312
		    },
		    {
		        name: 'Syria',
		        value: 484
		    },
		    {
		        name: 'Zambia',
		        value: 118
		    },
		    {
		        name: 'South Sudan',
		        value: 132
		    },
		    {
		        name: 'Egypt',
		        value: 83
		    },
		    {
		        name: 'Madagascar',
		        value: 143
		    },
		    {
		        name: 'North Korea',
		        value: 681
		    },
		    {
		        name: 'Denmark',
		        value: 1885
		    },
		    {
		        name: 'Greece',
		        value: 589
		    },
		    {
		        name: 'Botswana',
		        value: 131
		    },
		    {
		        name: 'Sudan',
		        value: 43
		    },
		    {
		        name: 'Croatia',
		        value: 1233
		    },
		    {
		        name: 'Bulgaria',
		        value: 627
		    },
		    {
		        name: 'El Salvador',
		        value: 3282
		    },
		    {
		        name: 'Belarus',
		        value: 320
		    },
		    {
		        name: 'Myanmar',
		        value: 98
		    },
		    {
		        name: 'Portugal',
		        value: 700
		    },
		    {
		        name: 'Switzerland',
		        value: 1575
		    },
		    {
		        name: 'The Bahamas',
		        value: 6094
		    },
		    {
		        name: 'Lithuania',
		        value: 973
		    },
		    {
		        name: 'Somalia',
		        value: 97
		    },
		    {
		        name: 'Chad',
		        value: 47
		    },
		    {
		        name: 'Ethiopia',
		        value: 52
		    },
		    {
		        name: 'Yemen',
		        value: 108
		    },
		    {
		        name: 'Morocco',
		        value: 123
		    },
		    {
		        name: 'Suriname',
		        value: 353
		    },
		    {
		        name: 'French Polynesia',
		        value: 14110
		    },
		    {
		        name: 'Nigeria',
		        value: 59
		    },
		    {
		        name: 'Uzbekistan',
		        value: 125
		    },
		    {
		        name: 'Afghanistan',
		        value: 80
		    },
		    {
		        name: 'Austria',
		        value: 631
		    },
		    {
		        name: 'Belize',
		        value: 2061
		    },
		    {
		        name: 'Israel',
		        value: 2186
		    },
		    {
		        name: 'Nepal',
		        value: 328
		    },
		    {
		        name: 'Uganda',
		        value: 238
		    },
		    {
		        name: 'Romania',
		        value: 196
		    },
		    {
		        name: 'Vietnam',
		        value: 145
		    },
		    {
		        name: 'Gabon',
		        value: 171
		    },
		    {
		        name: 'Mongolia',
		        value: 28
		    },
		    {
		        name: 'United Arab Emirates',
		        value: 514
		    },
		    {
		        name: 'Latvia',
		        value: 675
		    },
		    {
		        name: 'Belgium',
		        value: 1354
		    },
		    {
		        name: 'Hungary',
		        value: 458
		    },
		    {
		        name: 'Laos',
		        value: 178
		    },
		    {
		        name: 'Ireland',
		        value: 581
		    },
		    {
		        name: 'Central African Republic',
		        value: 63
		    },
		    {
		        name: 'Azerbaijan',
		        value: 448
		    },
		    {
		        name: 'Taiwan',
		        value: 1147
		    },
		    {
		        name: 'Dominican Republic',
		        value: 745
		    },
		    {
		        name: 'Solomon Islands',
		        value: 1286
		    },
		    {
		        name: 'Slovakia',
		        value: 728
		    },
		    {
		        name: 'Cameroon',
		        value: 70
		    },
		    {
		        name: 'Malawi',
		        value: 340
		    },
		    {
		        name: 'Vanuatu',
		        value: 2543
		    },
		    {
		        name: 'Mauritania',
		        value: 29
		    },
		    {
		        name: 'Niger',
		        value: 24
		    },
		    {
		        name: 'Liberia',
		        value: 301
		    },
		    {
		        name: 'Netherlands',
		        value: 856
		    },
		    {
		        name: 'Puerto Rico',
		        value: 3237
		    },
		    {
		        name: 'Tunisia',
		        value: 187
		    },
		    {
		        name: 'Fiji',
		        value: 1532
		    },
		    {
		        name: 'Jamaica',
		        value: 2585
		    },
		    {
		        name: 'Kyrgyzstan',
		        value: 146
		    },
		    {
		        name: 'Republic of the Congo',
		        value: 79
		    },
		    {
		        name: 'Ivory Coast',
		        value: 85
		    },
		    {
		        name: 'Republic of Serbia',
		        value: 336
		    },
		    {
		        name: 'Turkmenistan',
		        value: 55
		    },
		    {
		        name: 'Mali',
		        value: 20
		    },
		    {
		        name: 'New Caledonia',
		        value: 1368
		    },
		    {
		        name: 'Bosnia and Herzegovina',
		        value: 469
		    },
		    {
		        name: 'Lesotho',
		        value: 791
		    },
		    {
		        name: 'Tajikistan',
		        value: 170
		    },
		    {
		        name: 'Antarctica',
		        value: 2
		    },
		    {
		        name: 'Burkina Faso',
		        value: 84
		    },
		    {
		        name: 'Georgia',
		        value: 316
		    },
		    {
		        name: 'Senegal',
		        value: 104
		    },
		    {
		        name: 'Kiribati',
		        value: 23428
		    },
		    {
		        name: 'Sri Lanka',
		        value: 294
		    },
		    {
		        name: 'Bangladesh',
		        value: 138
		    },
		    {
		        name: 'Estonia',
		        value: 425
		    },
		    {
		        name: 'Jordan',
		        value: 203
		    },
		    {
		        name: 'Cambodia',
		        value: 91
		    },
		    {
		        name: 'Guinea',
		        value: 65
		    },
		    {
		        name: 'Slovenia',
		        value: 794
		    },
		    {
		        name: 'Northern Cyprus',
		        value: 1623
		    },
		    {
		        name: 'Greenland',
		        value: 7
		    },
		    {
		        name: 'Marshall Islands',
		        value: 82873
		    },
		    {
		        name: 'Swaziland',
		        value: 814
		    },
		    {
		        name: 'Haiti',
		        value: 508
		    },
		    {
		        name: 'Seychelles',
		        value: 30769
		    },
		    {
		        name: 'Djibouti',
		        value: 561
		    },
		    {
		        name: 'Eritrea',
		        value: 129
		    },
		    {
		        name: 'Armenia',
		        value: 390
		    },
		    {
		        name: 'Cook Islands',
		        value: 46610
		    },
		    {
		        name: 'Ghana',
		        value: 44
		    },
		    {
		        name: 'Macedonia',
		        value: 393
		    },
		    {
		        name: 'Cape Verde',
		        value: 2232
		    },
		    {
		        name: 'Maldives',
		        value: 30201
		    },
		    {
		        name: 'Singapore',
		        value: 12690
		    },
		    {
		        name: 'Guinea Bissau',
		        value: 284
		    },
		    {
		        name: 'Lebanon',
		        value: 782
		    },
		    {
		        name: 'Sierra Leone',
		        value: 112
		    },
		    {
		        name: 'Togo',
		        value: 147
		    },
		    {
		        name: 'Turks and Caicos Islands',
		        value: 8439
		    },
		    {
		        name: 'Burundi',
		        value: 273
		    },
		    {
		        name: 'Equatorial Guinea',
		        value: 250
		    },
		    {
		        name: 'Falkland Islands',
		        value: 575
		    },
		    {
		        name: 'Kuwait',
		        value: 393
		    },
		    {
		        name: 'Moldova',
		        value: 213
		    },
		    {
		        name: 'Rwanda',
		        value: 284
		    },
		    {
		        name: 'Benin',
		        value: 54
		    },
		    {
		        name: 'East Timor',
		        value: 403
		    },
		    {
		        name: 'Kosovo',
		        value: 551
		    },
		    {
		        name: 'Micronesia',
		        value: 8547
		    },
		    {
		        name: 'Qatar',
		        value: 518
		    },
		    {
		        name: 'Saint Vincent and the Grenadines',
		        value: 15424
		    },
		    {
		        name: 'Tonga',
		        value: 8368
		    },
		    {
		        name: 'Western Sahara',
		        value: 23
		    },
		    {
		        name: 'Guam',
		        value: 9191
		    },
		    {
		        name: 'Mauritius',
		        value: 2463
		    },
		    {
		        name: 'Montenegro',
		        value: 372
		    },
		    {
		        name: 'Northern Mariana Islands',
		        value: 10776
		    },
		    {
		        name: 'Albania',
		        value: 146
		    },
		    {
		        name: 'Bahrain',
		        value: 5263
		    },
		    {
		        name: 'British Virgin Islands',
		        value: 26490
		    },
		    {
		        name: 'Comoros',
		        value: 1790
		    },
		    {
		        name: 'French Southern and Antarctic Lands',
		        value: 522
		    },
		    {
		        name: 'Samoa',
		        value: 1418
		    },
		    {
		        name: 'Spratly Islands',
		        value: 800000
		    },
		    {
		        name: 'Svalbard',
		        value: 64
		    },
		    {
		        name: 'Trinidad and Tobago',
		        value: 780
		    },
		    {
		        name: 'American Samoa',
		        value: 13393
		    },
		    {
		        name: 'Antigua and Barbuda',
		        value: 6778
		    },
		    {
		        name: 'Cayman Islands',
		        value: 11364
		    },
		    {
		        name: 'Grenada',
		        value: 8721
		    },
		    {
		        name: 'Palau',
		        value: 6536
		    },
		    {
		        name: 'Palestinian Territories',
		        value: 500
		    },
		    {
		        name: 'Anguilla',
		        value: 21978
		    },
		    {
		        name: 'Bhutan',
		        value: 52
		    },
		    {
		        name: 'Dominica',
		        value: 2663
		    },
		    {
		        name: 'Guernsey',
		        value: 25608
		    },
		    {
		        name: 'Hong Kong',
		        value: 1864
		    },
		    {
		        name: 'Luxembourg',
		        value: 773
		    },
		    {
		        name: 'Saint Kitts and Nevis',
		        value: 7663
		    },
		    {
		        name: 'Saint Lucia',
		        value: 3300
		    },
		    {
		        name: 'Saint Pierre and Miquelon',
		        value: 8264
		    },
		    {
		        name: 'São Tomé and Príncipe',
		        value: 2075
		    },
		    {
		        name: 'Virgin Islands of the U.S.',
		        value: 5780
		    },
		    {
		        name: 'Wallis and Futuna',
		        value: 14085
		    },
		    {
		        name: 'Aruba',
		        value: 5556
		    },
		    {
		        name: 'Barbados',
		        value: 2326
		    },
		    {
		        name: 'Bermuda',
		        value: 18657
		    },
		    {
		        name: 'British Indian Ocean Territory',
		        value: 16667
		    },
		    {
		        name: 'Brunei',
		        value: 190
		    },
		    {
		        name: 'Faroe Islands',
		        value: 718
		    },
		    {
		        name: 'Gambia',
		        value: 99
		    },
		    {
		        name: 'Gibraltar',
		        value: 153846
		    },
		    {
		        name: 'Jan Mayen',
		        value: 2653
		    },
		    {
		        name: 'Jersey',
		        value: 8621
		    },
		    {
		        name: 'Macau',
		        value: 35461
		    },
		    {
		        name: 'Malta',
		        value: 3165
		    },
		    {
		        name: 'Isle of Man',
		        value: 1748
		    },
		    {
		        name: 'Montserrat',
		        value: 9804
		    },
		    {
		        name: 'Nauru',
		        value: 47170
		    },
		    {
		        name: 'Niue',
		        value: 3846
		    },
		    {
		        name: 'Paracel Islands',
		        value: 129032
		    },
		    {
		        name: 'Saint Barthelemy',
		        value: 40000
		    },
		    {
		        name: 'Saint Helena, Ascension and Tristan da Cunha',
		        value: 2538
		    },
		    {
		        name: 'Saint Martin',
		        value: 18382
		    },
		    {
		        name: 'Sint Maarten',
		        value: 29412
		    },
		    {
		        name: 'Tuvalu',
		        value: 39063
		    },
		    {
		        name: 'Wake Island',
		        value: 153846
		    }
		];

const getGraticule = () => {
    const data = [];

    // Meridians
    for (let x = -180; x <= 180; x += 15) {
        data.push({
            geometry: {
                type: 'LineString',
                coordinates: x % 90 === 0 ? [
                    [x, -90],
                    [x, 0],
                    [x, 90]
                ] : [
                    [x, -80],
                    [x, 80]
                ]
            }
        });
    }

    // Latitudes
    for (let y = -90; y <= 90; y += 10) {
        const coordinates = [];
        for (let x = -180; x <= 180; x += 5) {
            coordinates.push([x, y]);
        }
        data.push({
            geometry: {
                type: 'LineString',
                coordinates
            },
            lineWidth: y === 0 ? 2 : undefined
        });
    }

    return data;
};

// Add flight route after initial animation
// const afterAnimate = e => {
//     const chart = e.target.chart;

//     if (!chart.get('flight-route')) {
//         chart.addSeries({
//             type: 'mapline',
//             name: 'Flight route, Amsterdam - Los Angeles',
//             animation: false,
//             id: 'flight-route',
//             data: [{
//                 geometry: {
//                     type: 'LineString',
//                     coordinates: [
//                         [4.90, 53.38], // Amsterdam
//                         [-118.24, 34.05] // Los Angeles
//                     ]
//                 },
//                 color: '#313f77'
//             }],
//             lineWidth: 2,
//             accessibility: {
//                 exposeAsGroupOnly: true
//             }
//         }, false);
//         chart.addSeries({
//             type: 'mappoint',
//             animation: false,
//             data: [{
//                 name: 'Amsterdam',
//                 geometry: {
//                     type: 'Point',
//                     coordinates: [4.90, 53.38]
//                 }
//             }, {
//                 name: 'LA',
//                 geometry: {
//                     type: 'Point',
//                     coordinates: [-118.24, 34.05]
//                 }
//             }],
//             color: '#313f77',
//             accessibility: {
//                 enabled: false
//             }
//         }, false);
//         chart.redraw(false);
//     }
// };





	Highcharts.getJSON(
	    'https://code.highcharts.com/mapdata/custom/world.topo.json',
	    topology => {

		        chart = Highcharts.mapChart('chart_2', {
		            chart: {
		                map: topology,
		                backgroundColor: 'transparent'
		            },

		            title: {
		                text: '',
		                floating: true,
		                align: 'left',
		                style: {
		                    textOutline: '2px black'
		                }
		            },

		            // subtitle: {
		            //     text: 'Source: <a href="http://www.citypopulation.de/en/world/bymap/airports/">citypopulation.de</a><br>' +
		            //         'Click and drag to rotate globe<br>',
		            //     floating: true,
		            //     y: 34,
		            //     align: 'left'
		            // },

		            legend: {
		                enabled: false
		            },

		            mapNavigation: {
		                enabled: true,
		                enableDoubleClickZoomTo: true,
		                buttonOptions: {
		                    verticalAlign: 'bottom'
		                }
		            },

		            mapView: {
		                maxZoom: 30,
		                projection: {
		                    name: 'Orthographic',
		                    rotation: [-120, -10],
		                    zoom: 10
		                }
		            },

		            colorAxis: {
		                tickPixelInterval: 100,
		                minColor: '#BFCFAD',
		                maxColor: '#31784B',
		                max: 1000
		            },

		            tooltip: {
		                pointFormat: '{point.name}: {point.value}'
		            },

		            plotOptions: {
		                series: {
		                    animation: {
		                        duration: 750
		                    },
		                    clip: false
		                },
		                map: {
				            events: {
				                click: handleMapClick,
				              //   function (e) {
				              //       // 'event' contains information about the click, such as coordinates
				              //       // You can add your custom logic here
				              // //       console.log('Map Clicked:', event);
				              // //       if (doubleClicker.clickedOnce === true && doubleClicker.timer) {
						            // //   resetDoubleClick();
						            // //   ondbclick(e, this);
						            // // } else {
						            // //   doubleClicker.clickedOnce = true;
						            // //   doubleClicker.timer = setTimeout(function(){
						            // //     resetDoubleClick();
						            // //   }, doubleClicker.timeBetweenClicks);
						            // // }
						            // click: 
				              //       // if (event.point.name == "Indonesia") {

				              //       // 	window.setTimeout(function(e) {
				              //       // 		$("#divEarth").fadeOut("fast");
				              //       // 		$("#divIndonesia").fadeIn("slow");
				              //       // 	}, 500);
				                    	
				              //       // } 
				              //       // else {
				              //       // 	$("#divIndonesia").hide();
				              //       // 	$("#divEarth").show();
				              //       // }
				              //   }
				            }
				        }
		            },

		            series: [{
		                name: 'Graticule',
		                id: 'graticule',
		                type: 'mapline',
		                data: getGraticule(),
		                nullColor: 'rgba(0, 0, 0, 0.05)',
		                accessibility: {
		                    enabled: false
		                },
		                enableMouseTracking: false
		            }, {
		                data,
		                joinBy: 'name',
		                name: 'Jumlah Alumni IPB HAE',
		                states: {
		                    hover: {
		                        color: '#a4edba',
		                        borderColor: '#333333'
		                    }
		                },
		                dataLabels: {
		                    enabled: false,
		                    format: '{point.name}'
		                },
		                accessibility: {
		                    exposeAsGroupOnly: true
		                }
		            }]
		        });

		        // Render a circle filled with a radial gradient behind the globe to
		        // make it appear as the sea around the continents
		        const renderSea = () => {
		            let verb = 'animate';
		            if (!chart.sea) {
		                chart.sea = chart.renderer
		                    .circle()
		                    .attr({
		                        fill: {
		                            radialGradient: {
		                                cx: 0.4,
		                                cy: 0.4,
		                                r: 1
		                            },
		                            stops: [
		                                [0, 'white'],
		                                [1, 'lightblue']
		                            ]
		                        },
		                        zIndex: -1
		                    })
		                    .add(chart.get('graticule').group);
		                verb = 'attr';
		            }

		            const bounds = chart.get('graticule').bounds,
		                p1 = chart.mapView.projectedUnitsToPixels({
		                    x: bounds.x1,
		                    y: bounds.y1
		                }),
		                p2 = chart.mapView.projectedUnitsToPixels({
		                    x: bounds.x2,
		                    y: bounds.y2
		                });
		            chart.sea[verb]({
		                cx: (p1.x + p2.x) / 2,
		                cy: (p1.y + p2.y) / 2,
		                r: Math.min(p2.x - p1.x, p1.y - p2.y) / 2
		            });
		        };
		        renderSea();
		        Highcharts.addEvent(chart, 'redraw', renderSea);

		    }
		);


	})();
}



	
	
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
		// renderMap();
		// _initMixedWidget1();
		$(".table_list").DataTable({
			"searching": false
		});
	});

$(document).ready(function(e) {
	$('#BranchTable').DataTable({
		"columnDefs": [{
			"defaultContent": "-",
			"targets": "_all",
			"orderable": false, "targets": [0]
		}],
		"paging": true,
		"lengthChange": false,
		"searching": true,
		"ordering": true,
		"info": true,
		"autoWidth": false
	});

	$("body").on("click", "#btEarth", function(e) {
		$("#divIndonesia").fadeOut("fast");
        $("#divEarth").fadeIn("slow");
        chart.mapZoom();
	});

	$("body").on("click", ".btDetailNum", function(e) {
		var where = $(this).attr("data-where");
		var title = $(this).attr("data-title");
		$("#spTitle").html(title);

		$.ajax({
			url: base_url + "Home/get_alumni",
			type: "POST",
			dataType: "html",
			data: "where=" + where,
			success: function(result) {
				console.log(result);
				var json = $.parseJSON(result);
				var html = "";
				for(var i=0;i<json.length;i++) {
					html += "<tr>" +
								"<td align='center'>" + (i+1) + "</td>" + 
								"<td>" + json[i].nama + "</td>" +  
								"<td>" + json[i].nrp_nim + "</td>" +  
								"<td>" + (json[i].sex == "M" ? "Pria" : (json[i].sex == "F" ? "Wanita" : "-")) + "</td>" +  
								"<td>" + (json[i].angkatan != null ? json[i].angkatan : "") + "</td>" + 
								"<td>" + json[i].program_studi + "</td>" + 
								"<td>" + (json[i].no_hp == null ? "-" : json[i].no_hp) + "</td>" + 
								"<td>" + json[i].tempat_lahir + ((json[i].tanggal_lahir != null && json[i].tanggal_lahir != "") ? " " + formatDateSimple(json[i].tanggal_lahir) : "") + "</td>" + 
							"</tr>";
				}
				
				try {
					$('#StockTable').DataTable().destroy();
				} catch(e) { }

				$("#tbody_alumni").html(html);
				
				$('#StockTable').DataTable({
					"columnDefs": [{
						"defaultContent": "-",
						"targets": "_all",
						"orderable": false, "targets": [0]
					}],
					"paging": true,
					"lengthChange": false,
					"searching": true,
					"ordering": true,
					"info": true,
					"autoWidth": false
				});
				// $('#StockTable').DataTable().clear().draw();
				$("#alumni-dialog").modal("show");
			}
		})
	});
});
