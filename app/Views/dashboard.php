<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Metas já - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="./resources/css/style.css">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <h2 class="navbar-brand">Metas já </h2>
                <div class="d-flex justify-content-center">
                    <a>Registre, acompanhe e conclua suas metas</a>
                </div>

                <div class="navbar-nav">
                    <a href="/logout" class="nav-link">Sair</a>
                </div>
            </div>
        </nav>
        <hr>
        <div class="text-success">
            <hr>
        </div>
        <hr class="border border-danger border-2 opacity-50">
        <hr class="border border-primary border-3 opacity-75">

        <div class="container-fluid d-flex align-items-center justify-content-between">
            <h2 class="display-5 justify-content-center">
                Minhas metas
            </h2>             
            <form action="/goal/filter?status=" method="get" class="d-flex align-items-center">
                <select class="form-select me-2" name="status" id="status">
                    <option value=" ">

                    </option>
                    <option value="Concluída">
                        Concluidas
                    </option>
                    <option value="Cancelada">
                        Canceladas
                    </option>
                </select>
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </form>
            <a href="/form/goal/create" class="btn btn-success">Nova Meta</a>
        </div>
        <hr class="border border-3 opacity-75">
        <div class="container fluid">
            <ul class="list-group">

                <?php if (empty($goals)): ?>
                    <div class="container-fluid d-flex align-items-center justify-content-between">
                        <h2 class="display-5 justify-content-center">
                            Não há metas por aqui
                        </h2>
                    <?php else: ?>
                        <?php foreach ($goals as $goal): ?>

                        <li class="list-group-item d-flex justify-content-between align-items-center">

                            <div class="d-flex align-items-center">
                                <a href="/goal/cancel?status=Cancelada&&id=<?= $goal->id ?>" class="btn btn-danger me-3">Cancelar</a>
                                <a href="/goal/edit?id=<?= $goal->id ?>" class="btn btn-primary me-3">Editar</a>
                                <p class="mb-0">
                                    <?= $goal->desc_goal ?>
                                </p>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <p class="mb-0 me-3">Data Limite</p>
                                <p class="mb-0 me-3">
                                    <?= date('d/m/Y', strtotime($goal->dead_line)) ?>
                                </p>
                                <a href="/goal/conclude?status=Concluída&&id=<?= $goal->id ?>" class="ml-3 btn btn-success">Concluir</a>
                            </div>
                        </li>
                        <?php endforeach ?>
                    <?php endif ?>
            </ul>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
        </script>
</body>

</html>