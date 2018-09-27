<pre>
    <?php
        $caminho = 'data/data.json';
        require_once 'app/model.php';
    ?>
</pre>

<html>
<head>
    <title>Calculator 3000</title>
    <base href="http://localhost/sepe2018/">

    <link rel="stylesheet" type="text/css" href="assets/vendor/semantic/semantic.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/semantic/components/header.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/semantic/components/form.css">

    <script src="assets/vendor/jquery/jquery.js"></script>

    <script src="assets/vendor/charJS/Chart.js"></script>

    <script src="assets/vendor/semantic/semantic.js"></script>
    <script type="text/javascript" src="assets/vendor/semantic/components/form.js"></script>

    <script src="assets/front/index.js"></script>
    <script src="app/js/controller.js"></script>
</head>

<div class="ui container" style="margin: 20px 0">
    <h2 class="ui center aligned icon header">
        <i class="users icon"></i>
        Calculator 3000
    </h2>
</div>
<div class="ui container segment">
    <form class="ui form">
        <div class="field">
            <label>Característica</label>
            <select id="caracteristica" class="ui search dropdown">
                <option value="">Selecione a Característica</option>
                <?php foreach ($data as $key => $value): ?>
                    <option value="<?= $key ?>"><?= $value['nome'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="ui two column grid">
            <div class="row">
                <div class="column">
                    <h2 class="ui header">
                        <i class="mars icon"></i>
                        <div class="content">
                            Pai
                        </div>
                    </h2>
                    <div class="field">
                        <select id="feno_pai" class="ui fluid search dropdown fenotipo">
                            <option value="">Selecione o Fenótipo</option>
                        </select>
                    </div>
                </div>
                <div class="column">
                    <h2 class="ui header">
                        <i class="venus icon"></i>
                        <div class="content">
                            Mãe
                        </div>
                    </h2>
                    <div class="field">
                        <select id="feno_mae" class="ui fluid search dropdown fenotipo">
                            <option value="">Selecione o Fenótipo</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="column">
                    <div class="ui clear button" id="enviar">
                        Enviar
                    </div>
                </div>
            </div>
        </div>
        <div class="ui centered grid">
            <div class="six wide tablet eight wide computer column">
                <div id="chart" style="width: 500px ">

                </div>
            </div>
        </div>
    </form>
</div>
</html>