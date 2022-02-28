<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Dashboard</title>
</head>

<body>

    <div class="container">
        <div class="row" style="margin-top:40px">
            <div class="col col-md-offset-4">
                <h4>Dashboard</h4>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <h1>Hello! <?= $userInfo['name'] ?></h1>
                            <th>Name</th>
                            <th>Email</th>
                            <th></th>
                        </tr>
                    <tbody>
                        <tr>
                            <th><?= $userInfo['name'] ?></th>
                            <th><?= $userInfo['email'] ?></th>
                            <th><a href="<?= site_url('auth/logout'); ?>">Logout</a></th>
                        </tr>
                    </tbody>

                    </thead>
                </table>
            </div>
        </div>
    </div>

</body>

</html>