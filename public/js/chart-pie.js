// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

//Set Array;       
var labelArray = [];
var dataArray = [];
var colorArray = [];

//Populate Array
$("#tblExpenses > tbody > tr").each(function (row, tr) {
  labelArray.push($('td:eq(0)', this).html());  
    
  amount = $('td:eq(1)', this).html().replace(",", "");
  dataArray.push(amount.replace("P",""));

  colorArray.push(getRandomColor());

});

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: labelArray,
    datasets: [{
      data: dataArray,
      backgroundColor: colorArray,
    }],
  },
});

//Generate Color
function getRandomColor() {
  var letters = '0123456789ABCDEF';
  var color = '#';
  for (var i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}
