document.addEventListener('DOMContentLoaded', () => {
    Highcharts.chart('container', {

        chart: {
            type: 'column'
        },
        credits:{
            text: 'aku tampan',
            href: "http://ptumdi.com"
            //enabled: false
        },
        title:{
            text: 'aku sedang belajar'
        },

        xAxis: {
            categories: ['2', '4', '6','8','10']
        },
       
        series: [
            {
                name: 'kuesioner',
                data: [1,2,3]
            }

        ]
    });



});