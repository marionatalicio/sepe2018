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
                alert(txt);

                var classe = document.getElementsByClassName('fenotipo');
                for (y in classe){

                    classe[y].getElementsByTagName('select')[0].innerHTML = txt;
                }
            });
    });
});