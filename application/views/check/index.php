<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>cek rekening</title>

  <!-- Bootstrap core CSS -->
  <link href="<?= base_url('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
  <link href="<?= base_url('assets/vendor/simple-line-icons/css/simple-line-icons.css')?>" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="<?= base_url('assets/css/landing-page.min.css')?>" rel="stylesheet">
  <script src="<?php echo base_url('/assets/sweetalert/sweetalert2.all.min.js'); ?>"></script>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-light bg-light static-top">
    <div class="container">
      <a class="navbar-brand" href="#">checkrekening</a>
      <a class="btn btn-primary" href="<?= site_url('checkrekening/lapor/'.$this->session->has_userdata('user').'') ?>">Lapor!</a>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h1 class="mb-3">Verifikasi rekening!</h1>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
          <form>
            <div class="form-row">
              <div class="col-12 col-md-9 mb-2 mb-md-0">
                <input type="no_rekening" id="no_rekening" class="form-control form-control-lg" placeholder="masukan nomer rekening">
              </div>
              <div class="col-12 col-md-3">
                <button type="button" onclick="check()" class="btn btn-block btn-lg btn-primary">Periksa!</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </header>

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center" id="notifikasiverif">
    <div class="container">
      <!--  -->
      <div class="col-lg-12">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-ban m-auto text-primary" id="ikon"></i> <!-- ban untuk yang terverfikasi -->
            </div>
            <h3>Data Terverifikasi</h3>
            <p class="lead mb-0">data nomer rekening pernah di laporkan di sistem kami!</p>
            <p class="lead mb-0">Ditemukan <span id="jmllapor"></span> laporan!</p>
            <p class="lead mb-0" id="link"></p>
          </div>
        </div>
      <!--  -->
    </div>
  </section>

  <!-- Icons Grid -->
  <section class="features-icons bg-light text-center" id="notifikasi404">
    <div class="container">
      <!--  -->
      <div class="col-lg-12">
          <div class="features-icons-item mx-auto mb-0 mb-lg-3">
            <div class="features-icons-icon d-flex">
              <i class="icon-check m-auto text-primary" id="ikon"></i> <!-- ban untuk yang terverfikasi -->
            </div>
            <h3>Data Tidak Terverifikasi</h3>
            <p class="lead mb-0">data nomer rekening belum pernah di laporkan di sistem kami!</p>
          </div>
        </div>
      <!--  -->
    </div>
  </section>

   <!-- Icons Grid -->
   <section class="features-icons bg-light text-center">
    <div class="container">
      <!--  -->
        <div class="col-lg-12">
            <div id="informasi">

            </div>
        </div>
      <!--  -->
    </div>
  </section>

  <!-- Call to Action -->
  <section class="call-to-action text-white text-center">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <h2 class="mb-4">Ingin melaporkan nomer rekening? Periksa Sekarang!</h2>
          <a  class="btn btn-block btn-lg btn-primary" href="<?= site_url('checkrekening/lapor/'.$this->session->has_userdata('user').'') ?>">Lapor!</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer bg-light">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
          <ul class="list-inline mb-2">
            <li class="list-inline-item">
              <a href="#">Tentang</a>
            </li>
            <li class="list-inline-item">&sdot;</li>
            <li class="list-inline-item">
              <a href="#">Kontak Kami</a>
            </li>
          </ul>
          <p class="text-muted small mb-4 mb-lg-0">&copy; CheckRekening <span id="tahun"></span>. All Rights Reserved.</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="<?= base_url('assets/vendor/jquery/jquery.min.js')?>"></script>
  <script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
  <script>
   $(document).ready(function () {
    document.getElementById("tahun").innerHTML = new Date().getFullYear();
    $('#notifikasiverif').removeAttr('style').hide();
    $('#notifikasi404').removeAttr('style').hide();
  });

    function check(){
      var nomer_rekening = $('#no_rekening').val();
      var html ="";
      $.ajax({
        type: "POST",
        url: "<?= site_url('/checkrekening/check')?>",
        data: {
              norek:nomer_rekening,
              },
        dataType: "text",
        success: function (response) {
        var data =  JSON.parse(response);
        $('#jmllapor').html(data.length);
        console.log(data);

        if(data == "404"){
          // $('#notifikasi404').show();
          // $('#notifikasiverif').removeAttr('style').hide();
          Swal.fire({
            icon: 'error',
            title: 'Data Tidak Terverifikasi',
            text: 'Data nomer rekening belum pernah dilaporkan dalam sistem kami!'
          });
          $('#no_rekening').val('');
        }else{
          Swal.fire({
            icon: 'success',
            title: 'Data Terverifikasi',
            text: 'Data nomer rekening pernah dilaporkan dalam sistem kami!',
            footer: '<a href="<?= site_url('/checkrekening/list/')?>'+nomer_rekening+'">Detail Lebih lanjut</a>'
          });
          // $('#notifikasiverif').show();
          // $('#notifikasi404').removeAttr('style').hide();
          $('#no_rekening').val('');
          // html = "<a href='<?php//= site_url('/checkrekening/list/')?>"+nomer_rekening+"'>Detail!</a>";
          // console.log(html);
          // $("#link").html(html);
        }
          
        }
      });
    }
  </script>

</body>

</html>
