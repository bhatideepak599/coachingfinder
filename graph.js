<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
window.addEventListener("load", function () {
    // Line Chart
    var chart = new CanvasJS.Chart("chartContainer1", {
        theme:"light2",
        animationEnabled: true,
        title:{
            text: "Game of Thrones Viewers of the First Airing on HBO"
        },
        axisY :{
            title: "Number of Viewers",
            suffix: "mn"
        },
        toolTip: {
            shared: "true"
        },
        legend:{
            cursor:"pointer",
            itemclick : toggleDataSeries
        },
        data: [{
            type: "spline",
            visible: false,
            showInLegend: true,
            yValueFormatString: "##.00mn",
            name: "Season 1",
            dataPoints: [
                { label: "Ep. 1", y: 2.22 },
                { label: "Ep. 2", y: 2.20 },
                { label: "Ep. 3", y: 2.44 },
                { label: "Ep. 4", y: 2.45 },
                { label: "Ep. 5", y: 2.58 },
                { label: "Ep. 6", y: 2.44 },
                { label: "Ep. 7", y: 2.40 },
                { label: "Ep. 8", y: 2.72 },
                { label: "Ep. 9", y: 2.66 },
                { label: "Ep. 10", y: 3.04 }
            ]
        },
        {
            type: "spline", 
            showInLegend: true,
            visible: false,
            yValueFormatString: "##.00mn",
            name: "Season 2",
            dataPoints: [
                { label: "Ep. 1", y: 3.86 },
                { label: "Ep. 2", y: 3.76 },
                { label: "Ep. 3", y: 3.77 },
                { label: "Ep. 4", y: 3.65 },
                { label: "Ep. 5", y: 3.90 },
                { label: "Ep. 6", y: 3.88 },
                { label: "Ep. 7", y: 3.69 },
                { label: "Ep. 8", y: 3.86 },
                { label: "Ep. 9", y: 3.38 },
                { label: "Ep. 10", y: 4.20 }
            ]
        },
        {
            type: "spline",
            visible: false,
            showInLegend: true,
            yValueFormatString: "##.00mn",
            name: "Season 3",
            dataPoints: [
                { label: "Ep. 1", y: 4.37 },
                { label: "Ep. 2", y: 4.27 },
                { label: "Ep. 3", y: 4.72 },
                { label: "Ep. 4", y: 4.87 },
                { label: "Ep. 5", y: 5.35 },
                { label: "Ep. 6", y: 5.50 },
                { label: "Ep. 7", y: 4.84 },
                { label: "Ep. 8", y: 4.13 },
                { label: "Ep. 9", y: 5.22 },
                { label: "Ep. 10", y: 5.39 }
            ]
        },
        {
            type: "spline",
              visible: false,
            showInLegend: true,
            yValueFormatString: "##.00mn",
            name: "Season 4",
            dataPoints: [
                { label: "Ep. 1", y: 6.64 },
                { label: "Ep. 2", y: 6.31 },
                { label: "Ep. 3", y: 6.59 },
                { label: "Ep. 4", y: 6.95 },
                { label: "Ep. 5", y: 7.16 },
                { label: "Ep. 6", y: 6.40 },
                { label: "Ep. 7", y: 7.20 },
                { label: "Ep. 8", y: 7.17 },
                { label: "Ep. 9", y: 6.95 },
                { label: "Ep. 10", y: 7.09 }
            ]
        },
        {
            type: "spline", 
            showInLegend: true,
            yValueFormatString: "##.00mn",
            name: "Season 5",
            dataPoints: [
                { label: "Ep. 1", y: 8 },
                { label: "Ep. 2", y: 6.81 },
                { label: "Ep. 3", y: 6.71 },
                { label: "Ep. 4", y: 6.82 },
                { label: "Ep. 5", y: 6.56 },
                { label: "Ep. 6", y: 6.24 },
                { label: "Ep. 7", y: 5.40 },
                { label: "Ep. 8", y: 7.01 },
                { label: "Ep. 9", y: 7.14 },
                { label: "Ep. 10", y: 8.11 }
            ]
        },
        {
            type: "spline", 
            showInLegend: true,
            yValueFormatString: "##.00mn",
            name: "Season 6",
            dataPoints: [
                { label: "Ep. 1", y: 7.94 },
                { label: "Ep. 2", y: 7.29 },
                { label: "Ep. 3", y: 7.28 },
                { label: "Ep. 4", y: 7.82 },
                { label: "Ep. 5", y: 7.89 },
                { label: "Ep. 6", y: 6.71 },
                { label: "Ep. 7", y: 7.80 },
                { label: "Ep. 8", y: 7.60 },
                { label: "Ep. 9", y: 7.66 },
                { label: "Ep. 10", y: 8.89 }
            ]
        },
        {
            type: "spline", 
            showInLegend: true,
            yValueFormatString: "##.00mn",
            name: "Season 7",
            dataPoints: [
                { label: "Ep. 1", y: 10.11 },
                { label: "Ep. 2", y: 9.27 },
                { label: "Ep. 3", y: 9.25 },
                { label: "Ep. 4", y: 10.17 },
                { label: "Ep. 5", y: 10.72 },
                { label: "Ep. 6", y: 10.24 },
                { label: "Ep. 7", y: 12.07 }
            ]
        },
              {
            type: "spline", 
            showInLegend: true,
            yValueFormatString: "##.00mn",
            name: "Season 8",
            dataPoints: [
                { label: "Ep. 1", y: 11.76 },
                { label: "Ep. 2", y: 10.29 },
                { label: "Ep. 3", y: 12.02 },
                { label: "Ep. 4", y: 11.80 },
                { label: "Ep. 5", y: 12.48 },
                { label: "Ep. 6", y: 13.61 }
            ]
        }]
    });

    // Bar Chart
    var down = downData;
    var up = upData;

    var barChart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title: {
            text: "Placement Record of last 5 Years"
        },
        axisY: {
            title: "Total No. of students ",
            titleFontColor: "#4F81BC",
            lineColor: "#4F81BC",
            labelFontColor: "#4F81BC",
            tickColor: "#4F81BC"
        },
        toolTip: {
            shared: true
        },
        legend: {
            cursor: "pointer",
            itemclick: toggleDataSeries
        },
        data: [{
            type: "column",
            name: "Total placed users",
            legendText: "Total placed users",
            showInLegend: true,
            dataPoints: up
        },
        {
            type: "column",
            name: "Total Registered users",
            legendText: "Total Registered users",
            axisYType: "secondary",
            showInLegend: true,
            dataPoints: down
        }]
    });

    // Render both charts
    lineChart.render();
    barChart.render();

    function toggleDataSeries(e) {
        if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
            e.dataSeries.visible = false;
        }
        else {
            e.dataSeries.visible = true;
        }
        barChart.render();
    }
    
});

