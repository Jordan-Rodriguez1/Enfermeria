'use strict';

/* Chart.js docs: https://www.chartjs.org/ */

window.chartColors = {
	color1: '#A8E6CE',
	color2: '#DCEDC2',
	color3: '#FFD3B5',
	color4: '#FFAAA6',
	color5: '#FF8C94',
	color6: '#00A8C6',
	color7: '#FF9C00',
	gray: '#a9b5c9',
	text: '#252930',
	border: '#e7e9ed'
};

/* Random number generator for demo purpose */
var randomDataPoint = function(){ return Math.round(Math.random()*100)};

// Pie Chart Demo

var pieChartConfig = {
	type: 'pie',
	data: {
		datasets: [{
			data: [
				14,
				0,
				86,
				20,
				234,
				100,
				164,
			],
			backgroundColor: [
				window.chartColors.color1,
				window.chartColors.color2,
				window.chartColors.color3,
				window.chartColors.color4,
				window.chartColors.color5,
				window.chartColors.color6,
				window.chartColors.color7,
			],
			label: 'Dataset 1'
		}],
		labels: [
			'HGZ 1',
			'HGZ 10',
			'HGSZ 4',
			'UMF 19',
			'UMF 18',
			'UMF 17',
			'Unidades',
		]
	},
	options: {
		responsive: true,
		legend: {
			display: true,
			position: 'right',
			align: 'center',
		},

		tooltips: {
			titleMarginBottom: 5,
			bodySpacing: 5,
			xPadding: 8,
			yPadding: 8,
			borderColor: window.chartColors.border,
			borderWidth: 1,
			backgroundColor: '#fff',
			bodyFontColor: window.chartColors.text,
			titleFontColor: window.chartColors.text,

			/* Display % in tooltip - https://stackoverflow.com/questions/37257034/chart-js-2-0-doughnut-tooltip-percentages */
			callbacks: {
                label: function(tooltipItem, data) {
					//get the concerned dataset
					var dataset = data.datasets[tooltipItem.datasetIndex];
					//calculate the total of this data set
					var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
					return previousValue + currentValue;
					});
					//get the current items value
					var currentValue = dataset.data[tooltipItem.index];
					//calculate the precentage based on the total and current item, also this does a rough rounding to give a whole number
					var percentage = Math.floor(((currentValue/total) * 100)+0.5);

					return percentage + " recetas";
			    },
            },


		},
	}
};

//Bar Chart Demo
// Barras
var barChartConfig = {
	type: 'bar',

	data: {
		labels: ['Xanxo', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
		datasets: [{
			label: 'Dataset 1',
			backgroundColor: "rgba(117,193,129,0.8)",
			hoverBackgroundColor: "rgba(117,193,129,1)",


			data: [
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint()
			]
		},
		{
			label: 'Dataset 2',
			backgroundColor: "rgba(91,153,234,0.8)",
			hoverBackgroundColor: "rgba(91,153,234,1)",


			data: [
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint(),
				randomDataPoint()
			]
		}
		]
	},
	options: {
		responsive: true,
		legend: {
			position: 'bottom',
			align: 'end',
		},

		tooltips: {
			mode: 'index',
			intersect: false,
			titleMarginBottom: 10,
			bodySpacing: 10,
			xPadding: 16,
			yPadding: 16,
			borderColor: window.chartColors.border,
			borderWidth: 1,
			backgroundColor: '#fff',
			bodyFontColor: window.chartColors.text,
			titleFontColor: window.chartColors.text,
			callbacks: {
                label: function(tooltipItem, data) {
	                return tooltipItem.value + '%';
                }
            },


		},
		scales: {
			xAxes: [{
				display: true,
				gridLines: {
					drawBorder: false,
					color: window.chartColors.border,
				},

			}],
			yAxes: [{
				display: true,
				gridLines: {
					drawBorder: false,
					color: window.chartColors.borders,
				},
				ticks: {
		            beginAtZero: true,
		            userCallback: function(value, index, values) {
		                return value + '%';
		            }
		        },


			}]
		}

	}
}

// Generate charts on load
window.addEventListener('load', function(){

	var pieChart = document.getElementById('chart-pie').getContext('2d');
	window.myPie = new Chart(pieChart, pieChartConfig);

	var lineChart = document.getElementById('canvas-linechart').getContext('2d');
	window.myLine = new Chart(lineChart, lineChartConfig);

	var barChart = document.getElementById('chart-barras').getContext('2d');
	window.myBar = new Chart(barChart, barChartConfig);


});
