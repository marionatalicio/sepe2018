$(document).ready(function() {
    $('#caracteristica').change(function () {
        $.post('app/controllers/controlador.php',
            {
                acao: 'fenotipos',
                vals: $('#caracteristica').val()
            }, function (dados) {
                var dbParam = JSON.parse(dados);
                var txt = '<option value="">Selecione o Fenótipo</option><option value="??">Não sei</option>';
                var list = [];

                for (var x in dbParam) {
                    list = dbParam[x];
                    txt += '<option class="item" value="' + list['geno'] + '">' + list['feno'] + "</option>";
                }

                var classe = document.getElementsByClassName('fenotipo');
                for (y in classe){

                    classe[y].getElementsByTagName('select')[0].innerHTML = txt;
                }
            });
    });

    $('#enviar').click(function () {
        $('#grafico').remove();
        $('#chart').html('<div id="grafico"><canvas id="myChart" width="400" height="500"></canvas></div>').hide();

        var vals = {
            pai: $('#feno_pai').val().split(','),
            mae: $('#feno_mae').val().split(','),
            carac: $('#caracteristica').val()
        };

        $.post('app/controllers/controlador.php',
            {
                acao: 'enviar',
                vals: vals
            }, function (dados) {
                var dbParam = JSON.parse(dados);

                var feno = [];
                var label = [];

                for (i in dbParam){
                    feno.push(dbParam[i]);
                    label.push(i);
                }

                var ctx = document.getElementById("myChart").getContext('2d');
                var values = {
                    type: 'pie',
                    data: {
                        datasets: [{
                            data: feno,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.8)',
                                'rgba(54, 162, 235, 0.8)',
                                'rgba(255, 206, 86, 0.8)',

                                'rgba(105, 255, 221, 0.8)',
                                'rgba(92, 78, 232, 0.8)',
                                'rgba(232, 176, 78, 0.8)',
                                'rgba(180, 255, 86, 0.8)',

                                'rgba(246, 211, 62, 0.8)',
                                'rgba(38, 212, 46, 0.8)',
                                'rgba(164, 38, 212, 0.8)',
                                'rgba(246, 100, 44, 0.8)',

                                'rgba(140, 92, 255, 0.8)',
                                'rgba(232, 75, 67, 0.8)',
                                'rgba(114, 232, 67, 0.8)',
                                'rgba(73, 228, 255, 0.8)'

                            ],
                            borderColor: [
                                'rgba(255,99,132,1)',
                                'rgba(54, 162, 235, 1)',
                                'rgba(255, 206, 86, 1)'
                            ],
                            borderWidth: 0
                        }],

                        // These labels appear in the legend and in the tooltips when hovering different arcs
                        labels: label
                    },
                    options: {
                        legend: {
                            display: true,
                            hidden: true
                        }
                    }

                };
                var myChart = new Chart(ctx, values);
            });
        $('#chart').show(1000);
    });
});