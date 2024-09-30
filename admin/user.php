<?php 
session_start();
unset($_SESSION['menu']);
$_SESSION['menu'] = 'users';
require_once './header.php';
require_once './functions/users.php';
$id_user = $_SESSION['id_user'];
if(isset($_POST['hapus'])){

    $id_user = $_POST['id_user'];
    $users->HapusUser($id_user);
}
$users = $users->Index();
?>
<?php if (isset($_SESSION['success'])): ?>
<script>
Swal.fire({
    title: 'Sukses!',
    text: '<?php echo $_SESSION['success']; ?>',
    icon: 'success',
    confirmButtonText: 'OK'
});
</script>
<?php unset($_SESSION['success']); // Menghapus session setelah ditampilkan ?>
<?php endif; ?>

<?php if (isset($_SESSION['error'])): ?>
<script>
Swal.fire({
    title: 'Error!',
    text: '<?php echo $_SESSION['error']; ?>',
    icon: 'error',
    confirmButtonText: 'OK'
});
</script>
<?php unset($_SESSION['error']); // Menghapus session setelah ditampilkan ?>
<?php endif; ?>

<div class="container" style="font-family: 'Prompt', sans-serif; margin-bottom:220px;">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar User</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered nowrap" style="width:100%" id="table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Password</th>
                                    <th scope="col">Level</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php $i = 1;?>
                                <?php foreach ($users as $key => $user):?>
                                <?php if($user['level'] != 0):?>
                                <tr>
                                    <th scope="row"><?=$i++;?></th>
                                    <td><?= $user['username'];?></td>
                                    <td>******</td>
                                    <td><?= $user['level'] == 0 ? 'Admin':'Pengguna';?></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#hapus<?= $user['id_user'];?>">
                                            Hapus
                                        </button>
                                    </td>
                                </tr>
                                <?php endif;?>
                                <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php foreach ($users as $user):?>
<div class="modal fade" id="hapus<?=$user['id_user'];?>" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <input type="hidden" name="id_user" value="<?=$user['id_user'];?>">
                <div class="modal-body">
                    <p>Anda yakin ingin menghapus user <strong>
                            <?=$user['username'];?></strong> ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="hapus" class="btn btn-outline-primary">
                        Hapus
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach;?>
<?php 
    require_once './footer.php';
?>