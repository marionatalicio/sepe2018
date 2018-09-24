<pre>
    <?php
        require_once 'app/controllers/controlador.php';
        var_dump($data['olho']);
    ?>
</pre>


<html>
<head>
    <title>Calculator 3000</title>
    <link rel="stylesheet" type="text/css" href="assets/vendor/semantic/semantic.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/semantic/components/header.css">
    <script src="assets/vendor/jquery/jquery.js"></script>
    <script src="assets/vendor/semantic/semantic.js"></script>
    <script src="assets/front/index.js"></script>
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
            <select class="ui search dropdown">
                <option value="">Selecione a Característica</option>
                <?php foreach ($data as $key => $value): ?>
                    <option value="<?= $key ?>"><?= $value['nome'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="ui two column grid">
            <div class="column">
                <h2 class="ui header">
                    <i class="mars icon"></i>
                    <div class="content">
                        Pai
                    </div>
                </h2>
                <div class="field">
                    <select class="ui search dropdown">
                        <option value="">Selecione o Fenótipo</option>
                        <option value="Aa">Verde</option>
                        <option value="aa">Azul</option>
                        <option value="AA">Castanho</option>
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
                    <select class="ui search dropdown">
                        <option value="">Selecione o Fenótipo</option>
                        <option value="Aa">Verde</option>
                        <option value="aa">Azul</option>
                        <option value="AA">Castanho</option>
                    </select>
                </div>
            </div>
        </div>
    </form>
</div>

</html>