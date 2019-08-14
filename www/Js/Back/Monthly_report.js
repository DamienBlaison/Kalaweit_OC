var ctx = document.getElementById(id).getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Adhesion', 'Association', 'Animaux', 'Dulan', 'Foret'],
        datasets: [{
            label: '€',
            data: JSON.parse(data),
            backgroundColor: [
                'rgba(221, 75, 57, 0.6)',
                'rgba(96, 92, 168, 0.6)',
                'rgba(54, 162, 235, 0.6)',
                'rgba(243, 156, 18, 0.6)',
                'rgba(0, 166, 90, 0.6)'

            ],
            borderColor: [
                'rgba(221, 75, 57, 1)',
                'rgba(96, 92, 168, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(243, 156, 18, 1)',
                'rgba(0, 166, 90, 1)'

            ],
            borderWidth: 0.5
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        },
        legend: {
            display: false
        }
    }
});
