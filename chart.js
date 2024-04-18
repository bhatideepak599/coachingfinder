
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "Placement Record Last 5 Years"
	},	
	axisY: {
		title: "No of students",
		titleFontColor: "#4F81BC",
		lineColor: "#4F81BC",
		labelFontColor: "#4F81BC",
		tickColor: "#4F81BC"
	},
	axisY2: {
		title: "",
		titleFontColor: "#C0504E",
		lineColor: "#C0504E",
		labelFontColor: "#C0504E",
		tickColor: "#C0504E"
	},	
	toolTip: {
		shared: true
	},
	legend: {
		cursor:"pointer",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Total Students",
		legendText: "Total Students",
		showInLegend: true, 
		dataPoints:[
			{ label:"2015", y: 260 },
			{ label: "2016", y: 300 },
			{ label: "2017", y: 240 },
			{ label: "2018", y: 320 },
			{ label: "2019", y: 340 },
			{ label: "2020", y: 300 }
		]
	},
	{
		type: "column",	
		name: "Qualified Students",
		legendText: "Qualified Students",
		axisYType: "secondary",
		showInLegend: true,
		dataPoints:[
			{ label: "2015", y:  180},
			{ label: "2016", y:  280 },
			{ label: "2017", y:  230 },
			{ label: "2018", y: 280 },
			{ label: "2019", y: 300 },
			{ label: "2020", y: 230 }
		]
	}]
});
chart.render();

function toggleDataSeries(e) {
	if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	}
	else {
		e.dataSeries.visible = true;
	}
	chart.render();
}

}
