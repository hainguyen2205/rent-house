drawPostByDistrictChart();
drawMonthlyRevence();

function drawPostByDistrictChart() {
  fetch('/admin/get-post-count-district')
    .then(response => response.json())
    .then(data => {
      const labels = data.post_count.map(item => item.district.district_name);
      const dataset = data.post_count.map(item => item.post_count);
      const ctx = document.getElementById('post-by-district-chart').getContext('2d');
      new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: labels,
          datasets: [{
            data: dataset,
            backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e', '#e74a3b', '#858796', '#5a5c69', '#9b59b6', '#34495e'],
            hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf', '#f9c513', '#e24437', '#737b8e', '#4b4d59', '#7d3c98', '#2c3e50'],
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
            display: true,
            position: 'bottom',
            labels: {
              usePointStyle: true,
            },
          },
          cutoutPercentage: 80,
        },
      });
    })
    .catch(error => {
      console.error('There was a problem with the fetch operation:', error);
    });
}
function drawMonthlyRevence() {
  fetch('/admin/get-monthly-revenue')
    .then(response => response.json())
    .then(data => {
      const months = data.monthly_revenue.map(item => {
        const month = item.month;
        const year = item.year;
        return `${month}/${year}`;
      });
      const revenues = data.monthly_revenue.map(item => item.revenue);
      const ctx = document.getElementById('revenue-chart').getContext('2d');
      new Chart(ctx, {
        type: 'line',
        data: {
          labels: months,
          datasets: [{
            label: "Earnings",
            lineTension: 0.3,
            backgroundColor: "rgba(78, 115, 223, 0.05)",
            borderColor: "rgba(78, 115, 223, 1)",
            pointRadius: 3,
            pointBackgroundColor: "rgba(78, 115, 223, 1)",
            pointBorderColor: "rgba(78, 115, 223, 1)",
            pointHoverRadius: 3,
            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
            pointHitRadius: 10,
            pointBorderWidth: 2,
            data: revenues,
          }]
        },
        options: {
          maintainAspectRatio: false,
          layout: {
            padding: {
              left: 10,
              right: 25,
              top: 25,
              bottom: 0
            }
          },
          scales: {
            xAxes: [{
              gridLines: {
                display: false,
                drawBorder: false
              },
              ticks: {
                maxTicksLimit: 12
              }
            }],
            yAxes: [{
              ticks: {
                maxTicksLimit: 5,
                padding: 10,
                callback: function (value, index, values) {
                  return value.toLocaleString();
                }
              },
              gridLines: {
                color: "rgb(234, 236, 244)",
                zeroLineColor: "rgb(234, 236, 244)",
                drawBorder: false,
                borderDash: [2],
                zeroLineBorderDash: [2]
              }
            }]
          },
          legend: {
            display: false
          },
          tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            titleMarginBottom: 10,
            titleFontColor: '#6e707e',
            titleFontSize: 14,
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            intersect: false,
            mode: 'index',
            caretPadding: 10,
            callbacks: {
              label: function (tooltipItem, chart) {
                return tooltipItem.yLabel.toLocaleString() + 'đ';
              }
            }
          }
        }
      });
    })
    .catch(error => {
      console.error('There was a problem with the fetch operation:', error);
    });
}

