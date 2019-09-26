<? $this->title = "Профиль";?>
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Профиль</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form action="/admin/admin-profile/set-profile" method="get" >
        <div class="box-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Логин </label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Новый логин" name="username" value="<?=$admin->username;?>" required>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Пароль</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Новый пароль" name="password" required>
            </div>

        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </form>
</div>