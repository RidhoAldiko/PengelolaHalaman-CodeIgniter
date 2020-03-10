<!-- Header -->
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8"></div>
<div class="container-fluid mt--8">
<!-- Table -->
<div class="row">
    <div class="col">
    <div class="card shadow">
        <div class="card-header border-0">
        <?= form_error('title',
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>','
        </div>') 
        ?>
        <?= form_error('url',
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>','
        </div>') 
        ?>
        <?= form_error('icon',
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>','
        </div>') 
        ?>
        <?= $this->session->flashdata('message'); ?>
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addPage">
            <i class="fas fa-plus"></i> Tambah Halaman
        </button>
        </div>
        <div class="table-responsive">
        <table class="table">
            <thead class="thead-light">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Judul Halaman</th>
                <th scope="col">Nama Controller</th>
                <th scope="col">Ikon</th>
                <th scope="col">Tanggal dibuat</th>
                <th scope="col">Status terbit</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; foreach ($pages as $p) : ?>
                
                <tr>
                <th scope="row"><?= $i++; ?></th>
                    <td><?= $p['title']; ?></td>
                    <td><?= $p['url']; ?></td>
                    <td><?= $p['icon']; ?></td>
                    <td><?= $p['date_created']; ?></td>
                    <td>
                        <div class="form-group form-check">
                            <input type="checkbox"  <?= check_is_publish($p['publish'])?> class="form-check-input check-active-publish" id="publish_me"
                            data-is_publish="<?= $p['publish'] ?>" data-id="<?= $p['id'] ?>">
                        </div>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>

<!-- Modal add page -->
<div class="modal fade" id="addPage" tabindex="-1" role="dialog" aria-labelledby="addPages" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h3 class="modal-title" id="addPages">Tambah Halaman Baru</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
    <form action="<?= base_url('halaman'); ?>" method="POST">
        <div class="form-group">
            <label for="exampleInputEmail1">Judul Halaman</label>
            <input type="text" class="form-control" placeholder="Judul Halaman" id="title" name="title" aria-describedby="title">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Controller</label>
            <input type="text" class="form-control" placeholder="Nama Controller" id="url" name="url" aria-describedby="url">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Ikon</label>
            <input type="text" class="form-control" placeholder="Ikon font awesome" id="icon" name="icon" aria-describedby="icon">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" value="1" name="publish" id="publish">
            <label class="form-check-label" for="publish">Terbitkan ?</label>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </div>
    </form>
    </div>
    
    </div>
</div>
</div>

