<div class="card card-info">
              <div class="card-header">
              
              <form class="form-horizontal form-label-left" novalidate  action="<?= base_url('home/aksi_tambah_kelas')?>" method="post">
                <h1></h1>
       
        <div class="item form-group">
          <label class="control-label col-12" >Nama kelas<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="nama_kelas" class="form-control col-12" data-validate-length-range="6" data-validate-words="2" name="nama_kelas" required="required" placeholder="Nama kelas">
          </div>
        </div>
        <h1></h1>
        <div class="item form-group">
          <label class="control-label col-12" >Remark <span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="remark_kelas" name="remark_kelas" placeholder="Remark " required="required" class="form-control col-12">
          </div>
        </div>
        <h1></h1>
        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-md-offset-3">
            <a href="/home/kelas" type="submit" class="btn btn-primary">Cancel</a></button>
            <button id="send" type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
            </div>