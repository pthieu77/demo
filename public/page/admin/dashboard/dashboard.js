var url_dashboard = base_ajax + '/admin/dashboard';

$(document).ready(function() {

    renderDataChart();

});

var renderDataChart = function() {
    getAPI(url_dashboard, function(data) {
        if (data && data.label && data.data) {
            var ctx = document.getElementById("dashboard_chart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: data.label,
                    datasets: [{
                        backgroundColor: [
                            "#2ecc71",
                            "#3498db",
                            "#95a5a6",
                            "#9b59b6",
                            "#f1c40f",
                            "#e74c3c",
                            "#34495e"
                        ],
                        data: data.data
                    }]
                }
            });
        }
    });
}