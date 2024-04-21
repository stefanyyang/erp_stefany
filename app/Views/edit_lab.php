<div class="card card-info">
              <div class="card-header">
              
              <form class="form-horizontal form-label-left" novalidate  action="<?= base_url('home/aksi_edit_lab')?>" method="post">
                
        <input type="hidden" name="id" value="<?= $octa->id_lab?>">

        <div class="item form-group">
          <label class="control-label col-12" >Nama Laboratium<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="nama_lab" class="form-control col-12 "name="nama_lab" required="required" placeholder="Nama Laboratium" value="<?= $octa->nama_lab?>">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12" >Remark Laboratium<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="remark_lab" name="remark_lab" placeholder="Remark Laboratium" required="required" class="form-control col-12 " value="<?= $octa->remark_lab?>">
          </div>
        </div>
        <h1></h1>
        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-md-offset-3">
            <a href="/home/lab" type="submit" class="btn btn-primary">Cancel</a></button>
            <button id="send" type="submit" class="btn btn-success">Update</button>
          </div>
        </div>
      </form>
            </div>