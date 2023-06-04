<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tabel CRUD USER</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link href="<?= base_url('assets/'); ?>css/adm_usr.css" rel="stylesheet">
    <script src="<?= base_url('assets/'); ?>js/adm_usr.js"></script>
</head>

<body>
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="<?= base_url('C_auth/edit_user_action') ?>">
                <div class="modal-header">
                    <h4 class="modal-title">Edit User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <input type="hidden" value="<?php echo $queryUsrDetail->id_mitra ?>" name="id_user">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="nama_user" class="form-control"
                            value="<?php echo $queryUsrDetail->nama_user ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email_user" class="form-control"
                            value="<?php echo $queryUsrDetail->email_user ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password_user" class="form-control"
                            value="<?php echo $queryUsrDetail->password_user ?>" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" name="cancel" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" name="submit" value="Save">
                </div>
            </form>
        </div>
    </div>
</body>

</html>