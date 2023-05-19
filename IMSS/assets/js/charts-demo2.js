'use strict';

/* Chart.js docs: https://www.chartjs.org/ */

window.chartColors = {
	green: '#75c181', // rgba(117,193,129, 1)
	blue: '#5b99ea', // rgba(91,153,234, 1)
	gray: '#a9b5c9',
	text: '#252930',
	border: '#e7e9ed'
};

/* Random number generator for demo purpose */
var randomDataPoint = function(){ return Math.round(Math.random()*100)};

//Bar Chart Demo

var barChartConfig = {
	type: 'bar',

	data: {
		labels: ['Ene','Feb','Mar','Apr'],
		datasets: [{
			label: 'Colima',
			backgroundColor: "rgba(117,193,129,0.8)",
			hoverBackgroundColor: "rgba(117,193,129,1)",
			data: [
				94.72,
				98.29,
				96.91,
				94.83,
			]
		},
		{
			label: 'Media Nacional',
			backgroundColor: "rgba(91,153,234,0.8)",
			hoverBackgroundColor: "rgba(91,153,234,1)",
			data: [
				94.79,
				93.52,
				93.46,
				91.08,
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

	var barChart = document.getElementById('chart-bar').getContext('2d');
	window.myBar = new Chart(barChart, barChartConfig);


});
