<div class="card card-info">
              <div class="card-header">
           
              <form class="form-horizontal form-label-left" novalidate  action="<?= base_url('home/aksi_edit_blok')?>" method="post">
        <input type="hidden" name="id" value="<?= $octa->id_blok?>">

        <div class="item form-group">
          <label class="control-label col-12" >Nama Blok<span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="nama_blok" class="form-control col-12 "name="nama_blok" required="required" placeholder="Nama Blok" value="<?= $octa->nama_blok?>">
          </div>
        </div>
        <div class="item form-group">
          <label class="control-label col-12" >Remark <span class="required"></span>
          </label>
          <div class="col-12">
            <input type="text" id="remark_blok" name="remark_blok" placeholder="Remark " required="required" class="form-control col-12 " value="<?= $octa->remark_blok?>">
          </div>
        </div>
        <h1></h1>
        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-md-offset-3">
            <a href="/home/blok" type="submit" class="btn btn-primary">Cancel</a></button>
            <button id="send" type="submit" class="btn btn-success">Update</button>
          </div>
        </div>
      </form>
            </div>