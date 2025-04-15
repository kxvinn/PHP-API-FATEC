<?php
$result = [];
$groupedByUF = [];
$error = null;

if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST['search'])) {
    $search = strtolower(trim($_POST['search']));
    $url = "https://servicodados.ibge.gov.br/api/v1/localidades/municipios";

    $ch = curl_init();

    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_FOLLOWLOCATION => true,
    ]);

    $r = curl_exec($ch);

    if (curl_errno($ch)) {
        $error = "Erro ao conectar com a API: " . curl_error($ch);
    } else {
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($httpCode === 200) {
            $data = json_decode($r, true);

            foreach ($data as $municipio) {
                $nome = $municipio['nome'] ?? '';
                $ufSigla = $municipio['microrregiao']['mesorregiao']['UF']['sigla'] ?? '??';

                if (strpos(strtolower($nome), $search) !== false) {
                    // Agrupar por UF
                    $groupedByUF[$ufSigla][] = $municipio;
                }
            }

        } else {
            $error = "Erro na resposta da API: HTTP {$httpCode}";
        }
    }

    curl_close($ch);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Busca de Municípios - IBGE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<section class="section">
    <div class="container">
        <h1 class="title has-text-centered">Busca de Municípios (IBGE)</h1>

        <form method="POST" class="box" action="">
            <div class="field">
                <label class="label has-text-centered">Digite o nome do município:</label>
                <div class="control">
                    <input class="input" type="text" name="search" placeholder="Ex: São Paulo, Recife" required autofocus>
                </div>
            </div>

            <div class="control align-center">
                <button class="button is-link">Buscar</button>
            </div>
        </form>

        <?php if ($error): ?>
            <div class="notification is-danger">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($groupedByUF)): ?>
            <?php foreach ($groupedByUF as $uf => $municipios): ?>
                <h2 class="title is-1 mt-5"><?= $uf ?></h2>
                <div class="columns is-multiline">
                    <?php foreach ($municipios as $m): ?>
                        <div class="column is-half">
                            <div class="card">
                                <div class="card-content">
                                    <p class="title is-5"><?= htmlspecialchars($m['nome']) ?></p>
                                    <p class="subtitle is-6 mt-5">
                                        Microrregião: <?= $m['microrregiao']['nome'] ?><br>
                                        Mesorregião: <?= $m['microrregiao']['mesorregiao']['nome'] ?><br>
                                        Região: <?= $m['microrregiao']['mesorregiao']['UF']['regiao']['nome'] ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        <?php elseif ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
            <div class="notification is-warning mt-5">
                Nenhum município encontrado com esse nome.
            </div>
        <?php endif; ?>
    </div>
</section>
</body>
</html>
