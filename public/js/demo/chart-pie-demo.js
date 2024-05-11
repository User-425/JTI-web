// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

var itemNames = itemsSelling.map(item => item.name);
var soldQuantities = itemsSelling.map(item => item.sold);

function generateColors(quantityArray) {
  var colors = [];
  var maxQuantity = Math.max(...quantityArray);
  var minQuantity = Math.min(...quantityArray);
  var colorStep = (maxQuantity - minQuantity) / quantityArray.length;

  for (var i = 0; i < quantityArray.length; i++) {
      var normalizedValue = (quantityArray[i] - minQuantity) / (maxQuantity - minQuantity);
      var red = Math.round(255 * normalizedValue);
      var green = Math.round(255 * (1 - normalizedValue));
      var blue = 0;
      colors.push(`rgb(${red},${green},${blue})`);
  }
  return colors;
}

var backgroundColors = ['#4e73df', '#1cc88a', '#36b9cc', '#FF5733', '#33FF57', '#5733FF', '#FF33E1', '#33FFE8'];

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    labels: itemNames,
    datasets: [{
      data: soldQuantities,
      backgroundColor: backgroundColors,
      hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf','#FF954E', '#4EFF95', '#954EFF', '#FF4EE2', '#4EFFEC' ],
      hoverBorderColor: "rgba(234, 236, 244, 1)",
    }],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: '#dddfeb',
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false
    },
    cutoutPercentage: 80,
  },
});

// Generate legend HTML dynamically
var legendHTML = "";
for (var i = 0; i < itemNames.length; i++) {
    legendHTML += `
        <span class="mr-2">
            <i class="fas fa-circle" style="color:${backgroundColors[i]}"></i> ${itemNames[i]}
        </span>
    `;
}

// Set legend HTML
var legendContainer = document.getElementById("legendContainer");
if (legendContainer) {
    legendContainer.innerHTML = legendHTML;
}