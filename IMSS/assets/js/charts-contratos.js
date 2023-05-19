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

// Pie Chart Demo

var pieChartConfig = {
	type: 'pie',
	data: {
		datasets: [{
			data: [
				randomDataPoint(),
				randomDataPoint(),
			],
			backgroundColor: [
				window.chartColors.green,
				window.chartColors.blue,
			],
		}],
		labels: [
			'Formalizado',
			'En elaboración y validación',
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

// Generate charts on load
window.addEventListener('load', function(){

	var pieChart = document.getElementById('chart-pie').getContext('2d');
	window.myPie = new Chart(pieChart, pieChartConfig);
});
