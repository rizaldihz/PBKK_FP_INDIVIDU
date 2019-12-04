{% extends '../layout/index.volt' %}

{% block title %}Tambah Kebutuhan{% endblock %}

{% block morecss %}
<link rel="stylesheet" href="{{url('adminlte/bower_components/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{url('adminlte/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{url('adminlte/dist/css/skins/_all-skins.min.css')}}">
{% endblock %}

{% block content %}
<div class="content-wrapper">
  <section class="content-header">
      <h1>Tambah Kebutuhan</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <section class="content">

      <!-- Default box -->
      <div class="box box-primary">
            <!-- <div class="box-header with-border">
              <h3 class="box-title">Quick Example</h3>
            </div> -->
            <!-- /.box-header -->
            <!-- form start -->
            {{flashSession.output()}}
            <form action="{{url('kebutuhan/tambah')}}" role="form" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="row">
                  <div class="form-group col-xs-6">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama Kebutuhan">
                  </div>
                  <div class="form-group col-xs-6">
                    <label for="jumlah">Jumlah</label>
                    <input type="text" class="form-control" name="jumlah" placeholder="Jumlah">
                  </div>
                  <div class="form-group col-xs-6">
                    <label for="label_id">Kategori</label>
                    <select class="form-control select2" style="width: 100%;" name="label_id">
                      {% for label in labels %}
                      <option value="{{label.id}}">{{label.nama}}</option>
                      {% endfor %}
                    </select>
                  </div>
                  <div class="form-group col-xs-6">
                    <label for="resipien_id">Resipien</label>
                    <select class="form-control select2" style="width: 100%;" name="resipien_id">
                      {% for res in resipien %}
                      <option value="{{res.id}}">{{res.nama}}</option>
                      {% endfor %}
                    </select>
                  </div>
                  <div class="form-group col-xs-12">
                    <label for="keterangan">Keterangan</label>
                    <textarea class="form-control" rows="5" placeholder="Latar belakang alasan membutuhkan donasi ..." name="keterangan"></textarea>
                  </div>
                  <div class="form-group col-xs-4">
                    <label for="file">File input</label>
                    <input type="file" id="exampleInputFile" name="file[]" multiple>
                    <p class="help-block">Pilih Foto untuk menampilkan kebutuhan</p>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            <!-- form end -->
          </div>
      <!-- /.box -->

    </section>
</div>
{% endblock %}

{% block morejs %}
<script src="{{url('adminlte/plugins/iCheck/icheck.min.js')}}"></script>
<script src="{{url('adminlte/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<script type="text/javascript">
$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
    checkboxClass: 'icheckbox_minimal-blue',
    radioClass   : 'iradio_minimal-blue'
  });
$('.select2').select2();
</script>
{% endblock %}