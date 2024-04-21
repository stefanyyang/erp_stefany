<div class="card card-info">
              <div class="card-header">
               
              <form class="form-horizontal form-label-left" novalidate  action="<?= base_url('home/aksi_edit_pelajaran')?>" method="post">
        <input type="hidden" name="id" value="<?= $octa->id_pelajaran?>">

        <div class="item form-group">
          <label class="control-label col-12" >Nama Pelajaran<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="nama_pelajaran" class="form-control col-12 "name="nama_pelajaran" required="required" placeholder="Nama Pelajaran" value="<?= $octa->nama_pelajaran?>">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12" >Guru <span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="guru" name="guru" placeholder="Guru " required="required" class="form-control col-12 " value="<?= $octa->guru?>">
          </div>
        </div>
        <h1></h1>
        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-md-offset-3">
            <a href="/home/Pelajaran" type="submit" class="btn btn-primary">Cancel</a></button>
            <button id="send" type="submit" class="btn btn-success">Update</button>
          </div>
        </div>
      </form>
            </div>