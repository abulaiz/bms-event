var selectizes = $('.selectizes').selectize();

var data_type = selectizes[0].selectize; 
var year = selectizes[1].selectize; 
var chart_type = selectizes[2].selectize;

var _URL = [];
_URL['event'] = $("#url-api-event").text();
_URL['participant'] = $("#url-api-participant").text();

$(".rm").remove();

var stat_caption = {
  'event' : 'Statistik Jumlah Acara / Event',
  'participant' : 'Statistik Jumlah Peserta Keseluruhan'
};

var stat_tooltip = {
  'event' : 'Acara',
  'participant' : 'Peserta'
};

function load_chart(){
  $("#line-chart").remove();
  $("#loader").show();
  $.post(_URL[ data_type.items[0] ] ,{
    year : year.items[0]
  }
  ,function(data){
      $("#chart").html('<canvas id="line-chart" height="500"></canvas>');

      let objTitle = {
        display: true,
        text: stat_caption[ data_type.items[0] ]
      };

      let tooltips = {
        mode: 'index',
        intersect: false,
        callbacks: {
          label: function(tooltipItem, data) {
              return tooltipItem.yLabel +" "+stat_tooltip[ data_type.items[0] ]
          },
        }
      };

      let arrObjData = [];

      let colorNames = Object.keys(window.chartColors);
      let colorName = colorNames[0];
      let newColor = window.chartColors[colorName];
      let objData = {
        label: stat_tooltip[ data_type.items[0] ],
        data: data.data,
        fill: false,
        borderColor: newColor,
        pointBorderColor: newColor,
        pointBackgroundColor: newColor,
        backgroundColor: newColor,
        pointBorderWidth: 2,
        pointHoverBorderWidth: 2,
        pointRadius: 3
      };
      arrObjData.push(objData);


      let chartOptions = {
          responsive: true,
          elements: {
            line: {
              tension: 0.000001
            }
          },
          tooltips: tooltips,
          maintainAspectRatio: false,
          legend: {
              position: 'bottom',
          },
          hover: {
            mode: 'nearest',
            intersect: true
          },
          scales: {
            xAxes: [{
              display: true,
              scaleLabel: {
                display: true,
                labelString: 'Month'
              }
            }],
            yAxes: [{
              display: true,
              scaleLabel: {
                display: true,
                labelString: 'Jumlah '+stat_tooltip[ data_type.items[0] ]
              }
            }]
          },
          title: objTitle
      };

      let chartData = {
          labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
          datasets: arrObjData
      };

      let config = {
          type: chart_type.items[0],
          options : chartOptions,
          data : chartData
      };

      // Create the chart
      let ctx = $("#line-chart");
      new Chart(ctx, config);
      $("#loader").hide();
  }); 
}

load_chart();

data_type.on('change', function(){
  if(data_type.items.length == 0)
    return;
  load_chart();
});

year.on('change', function(){
  if(year.items.length == 0)
    return;
  load_chart();
});

chart_type.on('change', function(){
  if(chart_type.items.length == 0)
    return;
  load_chart();
});