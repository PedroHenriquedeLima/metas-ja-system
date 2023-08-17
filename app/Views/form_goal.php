<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cadastrar Meta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="./resources/css/style.css">
</head>

<body>
    <div class="container">
        <h1>Defina uma meta</h1>
        <form action="/form/goal/create" method="post">
            <div class="mb-3">
                <label for="desc_goal" class="form-label">Descrição</label>
                <input type="text" name="desc_goal" class="form-control" id="desc_goal">
            </div>
            <div class="mb-3">
                <label for="dead_line" class="form-label">Data Limite</label>
                <input type="date" id="dead_line" name="dead_line" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrar-se</button>
            <?php if (!empty($error)) {echo '<p>' . $error, '</p>';}?>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>