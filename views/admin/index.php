<?php
require_once "./views/templates/header.php"
?>
    <div class="container">
<? if (!empty($data['error'])) : ?>
    <h4 class="text-center bg-danger p-5 mt-5"><? echo $data['error']; ?></h4>
    <div class="card mt-5">
        <div class="card-block">
            Здравствуй: <? echo $data['user']->name ?>
        </div>
    </div>
    <div class="card mb-3">
        <img class="card-img-top" src="<? echo $data['user']->avatar ?>" alt="avatar">
        <div class="card-block">
            <h4 class="card-title"><? echo $data['user']->login ?></h4>
            <p class="card-text">Возраст:
                <? if (!empty($data['user']->age)) : ?>
                    <? echo $data['user']->age; ?>
                <? else: ?>
            <form id="set-age" method="post" action="/users/setage">
                <input type="text" name="age" class="w-25" placeholder="Укажите возраст">
                <button type="submit" value="ok" id="ok-btn">Ok</button>
            </form>
            </p>
            <? endif; ?>
        </div>
    </div>
<? else : ?>
    <div class="card mt-5">
        <div class="card-block">
            Здравствуй: <? echo $data['user']->name ?>
        </div>
    </div>
    <div class="card mb-3">
        <img class="card-img-top" src="<? echo $data['user']->avatar ?>" alt="avatar">
        <div class="card-block">
            <h4 class="card-title"><? echo $data['user']->login ?></h4>
            <p class="card-text">Возраст:
                <? if (!empty($data['user']->age)) : ?>
                    <? echo $data['user']->age; ?>
                <? else: ?>
            <form id="set-age" method="post" action="/users/setage">
                <input type="text" name="age" class="w-25" placeholder="Укажите возраст">
                <button type="submit" value="ok" id="ok-btn">Ok</button>
            </form>
            </p>
            <? endif; ?>
        </div>
    </div>
    </div>
    <div class="container">
        <div class="row d-flex justify-content-between align-items-center">
            <p class="pb-3 pt-3">Всего пользователей: <? echo $data['count'] ?></p>
            <a href="" class="createUserLink">Создать пользователя</a>

            <!--            Registration Form-->

            <form action="/registration/signup" enctype="multipart/form-data" method="post" id="createUserForm"
                  class="hidden-xs-up">
                <div class="row">
                    <div class="col-md-3 field-label-responsive">
                        <label for="name">Name</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
                                <input type="text" name="name" class="form-control" id="name"
                                       placeholder="John Doe" required autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <!-- Put name validation error messages here -->
                        </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 field-label-responsive">
                        <label for="email">Login</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                                <input type="text" name="login" class="form-control" id="email"
                                       placeholder="Enter you login" required autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                            <!-- Put e-mail validation error messages here -->
                        </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 field-label-responsive">
                        <label for="password">Password</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                                <input type="password" name="password" class="form-control" id="password"
                                       placeholder="Password" required>
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-md-3">
                        <div class="form-control-feedback">
                            <span class="text-danger align-middle">
                                <i class="fa fa-close"> Example Error Message</i>
                            </span>
                        </div>
                    </div>-->
                </div>
                <div class="row">
                    <div class="col-md-3 field-label-responsive">
                        <label for="password">Confirm Password</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem">
                                    <i class="fa fa-repeat"></i>
                                </div>
                                <input type="password" name="password-confirmation" class="form-control"
                                       id="password-confirm" placeholder="Password" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 field-label-responsive">
                        <label for="password">Set you'r avatar</label>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                <div class="input-group-addon" style="width: 2.6rem">
                                    <i class="fa fa-vcard"></i>
                                </div>
                                <input type="file" name="avatar" class="form-control"
                                       id="avatar" aria-describedby="fileHelp" required>
                                <small id="fileHelp" class="form-text text-muted ml-5">Only jpg, jpeg, png</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-success"><i class="fa fa-user-plus"></i> Register</button>
                    </div>
                </div>
            </form>
            <!--            end Registration Form-->
        </div>
        <table class="table main-table table-striped">
            <thead>
            <tr>
                <th>Login</th>
                <th>Name</th>
                <th>Age</th>
                <th class="text-center">Avatar</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <? if (!empty($data['desc'])) : ?>
                <? foreach ($data['desc'] as $val) : ?>
                    <tr>
                        <td><? echo $val->login ?></td>
                        <td><? echo $val->name ?></td>
                        <? if ($val->age >= 18) : ?>
                            <td class="text-success"><? echo $val->age ?></td>
                        <? else : ?>
                            <td class="text-warning"><? echo $val->age ?></td>
                        <? endif; ?>
                        <td class="text-center"><img src="<? echo $val->avatar ?>" alt="user avatar"></td>
                        <td><a href="" class="fa fa-trash text-danger"></a></td>
                    </tr>
                <? endforeach; ?>

            <? elseif (!empty($data['asc'])) : ?>
                <? foreach ($data['asc'] as $val) : ?>
                    <tr>
                        <td><? echo $val->login ?></td>
                        <td><? echo $val->name ?></td>
                        <td><? echo $val->age ?></td>
                        <td class="text-center"><img src="<? echo $val->avatar ?>" alt="user avatar"></td>
                        <td><a href="" class="fa fa-trash text-danger"></a></td>
                    </tr>
                <? endforeach; ?>

            <? elseif (!empty($data['all'])) : ?>
                <? foreach ($data['all'] as $val) : ?>
                    <tr>
                        <td><? echo $val->login ?></td>
                        <td><? echo $val->name ?></td>
                        <td><? echo $val->age ?></td>
                        <td class="text-center"><img src="<? echo $val->avatar ?>" alt="user avatar"></td>
                        <td ><a href="/users/delete/?id=<? echo $val->id; ?>" class="fa fa-trash text-danger"></a></td>
                    </tr>
                <? endforeach; ?>

            <? endif; ?>
            </tbody>
        </table>
    </div>
<? endif; ?>
<?php
require_once "./views/templates/footer.php"
?>