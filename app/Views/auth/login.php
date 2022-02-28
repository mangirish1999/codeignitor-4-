<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <div class=" container ">
        <div class="row" style="margin-top:45px;">
            <div class="col-md-4 col-md-offset-4">
                <h4>Sign In</h4>
                <form action="<?= base_url('auth/check'); ?>" method="post" autocomplete="off">
                    <?= csrf_field(); ?>
                    <?php if (!empty(session()->getFlashdata('Fail'))) :  ?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('Fail'); ?></div>
                    <?php endif ?>
                    <?php if (!empty(session()->getFlashdata('Success'))) :  ?>
                    <div class="alert alert-success"><?= session()->getFlashdata('Success'); ?></div>
                    <?php endif ?>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" value="<?= set_value('email'); ?>" name="email"
                            id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email">
                        <span class="text-danger">
                            <?= isset($validation) ? display_error($validation, 'email') : '' ?>
                        </span>

                    </div>
                    <div class=" form-group mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control"
                            value="<?= set_value('password'); ?>" id="" placeholder="Enter password">
                        <span class="text-danger">
                            <?= isset($validation) ? display_error($validation, 'password') : '' ?>
                        </span>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    <br>

                    <a href="<?= site_url('auth/register') ?>">Create New Account</a>
                </form>

            </div>

        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

</body>

</html>