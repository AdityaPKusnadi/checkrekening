<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400&display=swap');

body {
    background-color: #eee;
    font-family: 'Poppins', sans-serif
}

.card {
    border: none;
    -webkit-box-shadow: 0 2px 3px rgba(0, 0, 0, 0.03);
    box-shadow: 0 2px 3px rgba(0, 0, 0, 0.03)
}

.comment-text {
    font-size: 12px
}

.fs-10 {
    font-size: 12px
}
  </style>
</head>
<body>
<div class="container mt-3 d-flex justify-content-center">
    <div class="row d-flex justify-content-center">
        <div class="col-md-8">
            <div class="text-left">
                <h6>Semua Laporan( <?= count($daftar) ?>)</h6>
            </div>
            <?php foreach( $daftar as $d) :?>
              <div class="card p-3 mb-2">
                <div class="d-flex flex-row"> <img src="<?= base_url('admin/assets/img/barang/').$d->foto_utama ?>" height="400" width="400" class="rounded-circle">
                    <div class="d-flex flex-column ms-2">
                        <h6 class="mb-1 text-primary"><?= $d->user_input ?></h6>
                        <p class="comment-text"><?= $d->kronologi ?></p>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="d-flex flex-row"> <span class="text-muted fw-normal fs-10"><?= $d->nama_bank .' | '. $d->atas_nama  ?></span> </div>
                </div>
            </div>  
            <?php endforeach;?>
            
            </div>
        </div>
    </div>
</div>
</body>
</html>