<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\M_model;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class Home extends BaseController
{
    public function index()
    {
    	echo view('partial/header');
    	echo view('login');
    	echo view('partial/footer');
     
    }
       public function aksi_login()
    {
        $u=$this->request->getPost('username');
        $p=$this->request->getPost('pswd');
        $model= new M_model();
        $data=array(
            'username'=>$u,
            'password'=>$p
        );
        $cek=$model->getWhere2('user', $data);
        if ($cek > 0) {
        session()->set('id', $cek['id_user']);
        session()->set('username', $cek['username']);
        session()->set('level', $cek['level']);
        return redirect()->to('/home/dashboard');
        }else {
            return redirect()->to('/Home');
        }
    }

    //   public function user()
    // {
    //    if(session()->get('id')>0) {
    //    //  // if(session()->get('level')==1){
    //     $jojo=new M_model();
    //     $on='user.level=level.id_level';
    //     $diva['octa'] =$jojo->tampil('user');
    //     echo view('partial/header');
    //     echo view('partial/side_menu');
    //     echo view('v_user',$diva);
    //     echo view('partial/footer');

    //     // }else{
    //     //     return redirect()->to('/Home');

    //  }
    //  public function pengguna()
    //  {
    //     if(session()->get('id')>0) {
    //     $jojo=new M_model();
    //     $diva['octa'] =$jojo->tampil('pengguna');
    //     echo view('partial/header');
    //     echo view('partial/side_menu');
    //     echo view('pengguna',$diva);
    //     echo view('partial/footer');
    //     }else{
    //     return redirect()->to('/Home');
    //     }
    // }
    public function pengguna()
    {
   if(session()->get('id')>0) {
    $model = new M_model();
    $on='pengguna.id_user_user=user.id_user';
    $on2='pengguna.id_kelas=kelas.id_kelas';
    $diva['octa'] = $model->super('pengguna', 'user', 'kelas', $on, $on2);

    $id = session()->get('id');
    $where = array('id' => $id);

    echo view('partial/header');
    echo view('partial/side_menu');
    echo view('pengguna', $diva);
    echo view('partial/footer');
}else{
    return redirect()->to('/home/dashboard');
}
    }
    //  public function tambah_pengguna()
    // {
    //     if(session()->get('id')>0) {
    //     $model=new M_model();
    //     echo view('partial/header');
    //     echo view('partial/side_menu');
    //     $diva['octa'] = $model->tampil('kelas');
    //     echo view('tambah_pengguna', $diva);
    //     echo view('partial/footer');
    //     }else{
    //     return redirect()->to('/Home');
    //     }
    // }
    public function tambah_pengguna()
{
        if(session()->get('level')== 1 || session()->get('level')== 2 || session()->get('level')== 3) {

        $model=new M_model();
        $on='pengguna.id_kelas=kelas.id_kelas';
        $on2='pengguna.id_user_user=user.id_user';
        $diva['octa']=$model->super('pengguna', 'kelas', 'user', $on, $on2);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
        // $kui['foto']=$model->getRow('user',$where);

        $diva['octa']=$model->tampil('kelas'); 

        echo view('partial/header', $diva);
        echo view('partial/side_menu');
        echo view('tambah_pengguna');
        echo view('partial/footer');

        }else{
        return redirect()->to('/home/dashboard');
    }
}

    //  public function aksi_tambah_pengguna()
    // {
    //     $a=$this->request->getPost('nama');
    //     $b=$this->request->getPost('ttl');
    //     $c=$this->request->getPost('nik');
    //     $d=$this->request->getPost('jk');
    //     $e=$this->request->getPost('tanggal_pengguna');
    //     $f=$this->request->getPost('alamat');
        
    //     $simpan=array(
    //     'nama'=>$a,
    //     'ttl'=>$b,
    //     'nik'=>$c,
    //     'jk'=>$d,
    //     'tanggal_pengguna'=>$e,
    //     'alamat'=>$f
      
    //     );
    //     $model=new M_model();
    //     $model->simpan('pengguna',$simpan);
    //     return redirect()->to('/Home/pengguna');

    // }
public function aksi_tambah_pengguna()
{
    $model=new M_model();
        
    $kelas=$this->request->getPost('id_kelas');
    $nik=$this->request->getPost('nik');
    $nama=$this->request->getPost('nama');
    $jk=$this->request->getPost('jk');
    $alamat=$this->request->getPost('alamat');
    $ttl=$this->request->getPost('ttl');
    $username=$this->request->getPost('username');
    $password=$this->request->getPost('password');
    $level=$this->request->getPost('level');
    $id_user=session()->get('id');
    
    $user=array(
    'username'=>$username,
    'password'=>md5($password),
    'level'=>$level,
    );

    $model=new M_model();
    $model->simpan('user', $user);
    $where=array('username'=>$username);
    $id=$model->getarray('user', $where);
    $iduser = $id['id_user'];

    $pengguna=array(
        'id_kelas'=> $kelas,
        'nik'=>$nik,
        'nama'=>$nama,
        'jk'=>$jk,
        'alamat'=>$alamat,
        'ttl'=>$ttl,
        'id_user_user'=>$iduser,
        // 'tanggal_pgu'=>date('Y-m-d')
    );
    // print_r($pengguna);
    $model->simpan('pengguna', $pengguna);
    return redirect()->to('/home/pengguna');
}
    // public function edit_pengguna($id)
    // {
    //     $model=new M_model();
    //     $where=array('id_pengguna'=>$id);
    //     echo view('partial/header');
    //     echo view('partial/side_menu');
    //     $data['jojo']=$model->getWhere('pengguna',$where);
    //     echo view('edit_pengguna',$data);
    //     echo view('partial/footer');
    
    // }
public function edit_pengguna($id)
{
        if(session()->get('level')== 1) {

        $model=new M_model();
        $where2=array('pengguna.id_user_user'=>$id);
        $on=('pengguna.id_user_user=user.id_user');
        $on2=('pengguna.id_kelas=kelas.id_kelas');
        $diva['octa']=$model->ultraRow('pengguna', 'user', 'kelas',$on, $on2,$where2);
        $diva['ok']=$model->tampil('kelas');

        $id=session()->get('id');
        $where=array('id_user_user'=>$id);
        // $where=array('id_user' => session()->get('id'));
        // $kui['foto']=$model->getRow('user',$where);

        echo view('partial/header',);
        echo view('partial/side_menu');
        echo view('edit_pengguna', $diva);
        echo view('partial/footer');

        }else{
        return redirect()->to('/home/dashboard');
    }
}
     public function aksi_edit_pengguna()
{
    $id= $this->request->getPost('id');
    $kelas=$this->request->getPost('id_kelas');
    $nik=$this->request->getPost('nik');
    $nama=$this->request->getPost('nama');
    $jk=$this->request->getPost('jk');
    $alamat=$this->request->getPost('alamat');
    $ttl=$this->request->getPost('ttl');
    $username=$this->request->getPost('username');
    $level=$this->request->getPost('level');
    // $iduser=session()->get('id');

    $where=array('id_user'=>$id); 
    $where2=array('id_user_user'=>$id);   
    if ($password !='') {
        $user=array(
            'username'=>$username,
            'level'=>$level,
        );
    }else{
        $user=array(
            'username'=>$username,
            'level'=>$level,
        );
    }
    
    $model=new M_model();
    $model->qedit('user', $user, $where);

    $pengguna=array(
        'id_kelas'=> $kelas,
        'nik'=>$nik,
        'nama'=>$nama,
        'jk'=>$jk,
        'alamat'=>$alamat,
        'ttl'=>$ttl,
       
    );
   
    $model->qedit('pengguna', $pengguna, $where2);
    return redirect()->to('/home/pengguna');
}
    //  public function delete_pengguna($id)
    // {
    //     $model=new M_model();
    //     $where=array('pengguna'=>$id);
    //     $where2=array('id_pengguna'=>$id);
    //     $model->hapus('pengguna',$where2);
    //     return redirect()->to('/Home/pengguna');
    // }
 public function delete_pengguna($id)
{
    // if(session()->get('level')== 1) {

        $model=new M_model();
        $where2=array('id_user'=>$id);
        $where=array('id_user_user'=>$id);
        $model->hapus('pengguna',$where);
        $model->hapus('user',$where2);
        return redirect()->to('/home/pengguna');

    // }else{
    //     return redirect()->to('/home/dashboard');
    // }
}
 
     public function dashboard()
   {
        if(session()->get('id')>0) {
        echo view('partial/header');
        echo view('partial/side_menu');
        echo view('dasboard');
        echo view('partial/footer');
        }else{
        return redirect()->to('/Home');
        }
    }

     public function jadwal()
    {
        if(session()->get('id')>0) {
        $model = new M_model();
    $on='jadwal.id_kelas=kelas.id_kelas';
    $on2='jadwal.id_lab=lab.id_lab';
    $on3='jadwal.id_blok=blok.id_blok';
    $on4='jadwal.id_pelajaran=pelajaran.id_pelajaran';
    $diva['octa'] = $model->monster('jadwal', 'kelas', 'lab', 'blok', 'pelajaran', $on, $on2, $on3, $on4);

    $id = session()->get('id');
    $where = array('id' => $id);

    echo view('partial/header', $diva);
    echo view('partial/side_menu');
    echo view('jadwal');
    echo view('partial/footer');
        }else{
        return redirect()->to('/Home');
        }
    }
    public function tambah_jadwal()
    {
     
      $model=new M_model();
        $on='jadwal.id_kelas=kelas.id_kelas';
        $on2='jadwal.id_lab=lab.id_lab';
        $on3='jadwal.id_blok=blok.id_blok';
        $on4='jadwal.id_pelajaran=pelajaran.id_pelajaran';
        $diva['octa'] = $model->monster('jadwal', 'kelas', 'lab', 'blok', 'pelajaran', $on, $on2, $on3, $on4);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        $where=array('id_user' => session()->get('id'));
       
        $diva['octa']=$model->tampil('kelas'); 
        $diva['a']=$model->tampil('lab'); 
        $diva['b']=$model->tampil('blok'); 
        $diva['c']=$model->tampil('pelajaran'); 

        echo view('partial/header',$diva);
        echo view('partial/side_menu');
        echo view('tambah_jadwal', $diva);
        echo view('partial/footer');
       
    }
     public function aksi_tambah_jadwal()
    {
         $model=new M_model();
    $a=$this->request->getPost('id_kelas');
    $b=$this->request->getPost('id_lab');
    $c=$this->request->getPost('id_blok');
    $d=$this->request->getPost('id_pelajaran');
    $jam=$this->request->getPost('jam');
    $sesi=$this->request->getPost('sesi');
    $nama_tahun=$this->request->getPost('nama_tahun');
    $tgl=$this->request->getPost('tgl');
    $data=array(
        'id_kelas'=>$a,
        'id_lab'=>$b,
        'id_blok'=>$c,
        'id_pelajaran'=>$d,
        'jam'=>$jam,
        'sesi'=>$sesi,
        'nama_tahun'=>$nama_tahun,
        'tgl'=>$tgl,
    );
   
    $model->simpan('jadwal',$data);
    return redirect()->to('/home/jadwal');

    }

     public function edit_jadwal($id)
    {
          $model=new M_model();
        $where=array('id_jadwal'=>$id);
        $on='jadwal.id_kelas=kelas.id_kelas';
        $on2='jadwal.id_lab=lab.id_lab';
        $on3='jadwal.id_blok=blok.id_blok';
        $on4='jadwal.id_pelajaran=pelajaran.id_pelajaran';
        $diva['octa'] = $model->monsterRows('jadwal', 'kelas', 'lab', 'blok', 'pelajaran', $on, $on2, $on3, $on4, $where);
        $diva['a']=$model->tampil('kelas');
        $diva['b']=$model->tampil('lab');
        $diva['c']=$model->tampil('blok');
        $diva['d']=$model->tampil('pelajaran');

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        echo view('partial/header',$diva);
        echo view('partial/side_menu',);
        echo view('edit_jadwal');
        echo view('partial/footer');

    
    }
     public function aksi_edit_jadwal()
    {
        $model=new M_model();
    $id=$this->request->getPost('id');
    $id_kelas=$this->request->getPost('id_kelas');
    $id_lab=$this->request->getPost('id_lab');
    $id_blok=$this->request->getPost('id_blok');
    $id_pelajaran=$this->request->getPost('id_pelajaran');
    $jam=$this->request->getPost('jam');
    $sesi=$this->request->getPost('sesi');
    $nama_tahun=$this->request->getPost('nama_tahun');
    $tgl=$this->request->getPost('tgl');
    $data=array(
        // 'jam_masuk'=>$jam_masuk,
        'id_kelas'=>$id_kelas,
        'id_lab'=>$id_lab,
        'id_blok'=>$id_blok,
        'id_pelajaran'=>$id_pelajaran,
        'jam'=>$jam,
        'sesi'=>$sesi,
        'nama_tahun'=>$nama_tahun,
        'tgl'=>$tgl,
    );
    // print_r($data);
    $where=array('id_jadwal'=>$id);
    $model->qedit('jadwal',$data,$where);
    return redirect()->to('/home/jadwal');

    }
      public function delete_jadwal($id)
    {
      
        $model=new M_model();
        $where=array('id_jadwal'=>$id);
        $model->hapus('jadwal',$where);
        return redirect()->to('/home/jadwal');
    }
    //  public function lab()
    //  {
    //     if(session()->get('id')>0) {
    //     $jojo=new M_model();
    //     $diva['octa'] =$jojo->tampil('lab');
    //     echo view('partial/header');
    //     echo view('partial/side_menu');
    //     echo view('lab',$diva);
    //     echo view('partial/footer');
    //     }else{
    //     return redirect()->to('/Home');
    //     }
    // }
     public function lab()
    {
     if(session()->get('id')>0) {
    $jojo = new M_model();
    $diva['octa'] = $jojo->tampil('lab');

    $id = session()->get('id');
    $where = array('id' => $id);

    echo view('partial/header', $diva);
    echo view('partial/side_menu');
    echo view('lab');
    echo view('partial/footer');
    }else{
        return redirect()->to('/Home');
        }
    }
     public function tambah_lab()
    {
        if(session()->get('level')== 1 || session()->get('level')== 2 || session()->get('level')== 3) {
         $model=new M_model();
        $diva['octa']=$model->tampil('lab');

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        echo view('partial/header',$diva);
        echo view('partial/side_menu',$diva);
        echo view('tambah_lab',$diva);
        echo view('partial/footer');
         }else{
        return redirect()->to('/Home');
        }
    }
      public function aksi_tambah_lab()
    {
       $model=new M_model();
    $nama_lab=$this->request->getPost('nama_lab');
    $remark_lab=$this->request->getPost('remark_lab');
    $data=array(
      
        'nama_lab'=>$nama_lab,
        'remark_lab'=>$remark_lab,
    );
    $model->simpan('lab',$data);
    return redirect()->to('/home/lab');

    }
     public function edit_lab($id)
    {
        $model=new M_model();
        $where=array('id_lab'=>$id);
        $diva['octa']=$model->getWhere('lab', $where);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        echo view('partial/header',$diva);
        echo view('partial/side_menu',$diva);
        echo view('edit_lab',$diva);
        echo view('partial/footer');
    }
     public function aksi_edit_lab()
    {
         $model=new M_model();
    $id=$this->request->getPost('id');
    $nama_lab=$this->request->getPost('nama_lab');
    $remark_lab=$this->request->getPost('remark_lab');
    $data=array(
        'nama_lab'=>$nama_lab,
        'remark_lab'=>$remark_lab,
    );
    $where=array('id_lab'=>$id);
    $model->qedit('lab',$data,$where);
    return redirect()->to('/home/lab');

    }
    public function delete_lab($id)
    {
       $model=new M_model();
        $where=array('id_lab'=>$id);
        $model->hapus('lab',$where);
        return redirect()->to('/home/lab');
    }
      public function kelas()
     {
        if(session()->get('id')>0) {
         $model = new M_model();
    $diva['octa'] = $model->tampil('kelas');

    $id = session()->get('id');
    $where = array('id' => $id);

    echo view('partial/header', $diva);
    echo view('partial/side_menu');
    echo view('kelas');
    echo view('partial/footer');
   
        }else{
        return redirect()->to('/Home');
        }
    }
      public function tambah_kelas()
    {
        if(session()->get('id')>0) {
        $model=new M_model();
        $diva['octa']=$model->tampil('kelas');

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        echo view('partial/header',$diva);
        echo view('partial/side_menu',$diva);
        echo view('tambah_kelas',$diva);
        echo view('partial/footer');
        }else{
        return redirect()->to('/Home');
        }
    }
      public function aksi_tambah_kelas()
    {
        $model=new M_model();
    $nama_kelas=$this->request->getPost('nama_kelas');
    $remark_kelas=$this->request->getPost('remark_kelas');
    $data=array(
       
        'nama_kelas'=>$nama_kelas,
        'remark_kelas'=>$remark_kelas,
    );
    $model->simpan('kelas',$data);
    return redirect()->to('/home/kelas');

    }
     public function edit_kelas($id)
    {
        $model=new M_model();
        $where=array('id_kelas'=>$id);
        $diva['jojo']=$model->getWhere('kelas', $where);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        echo view('partial/header');
        echo view('partial/side_menu');
        echo view('edit_kelas',$diva);
        echo view('partial/footer');
    
    }
     public function aksi_edit_kelas()
    {
        $model=new M_model();
    $id=$this->request->getPost('id');
    $nama_kelas=$this->request->getPost('nama_kelas');
    $remark_kelas=$this->request->getPost('remark_kelas');
    $data=array(
      
        'nama_kelas'=>$nama_kelas,
        'remark_kelas'=>$remark_kelas,
    );
    $where=array('id_kelas'=>$id);
    $model->qedit('kelas', $data, $where);
    return redirect()->to('/Home/kelas');
    }
     public function delete_kelas($id)
    {
        $model=new M_model();
        $where=array('kelas'=>$id);
        $where2=array('id_kelas'=>$id);
        $model->hapus('kelas',$where2);
         return redirect()->to('/Home/kelas');
     }
      public function pelajaran()
     {
        if(session()->get('id')>0) {
        $model = new M_model();
        $diva['octa'] = $model->tampil('pelajaran');

        $id = session()->get('id');
        $where = array('id' => $id);

        echo view('partial/header', $diva);
        echo view('partial/side_menu');
        echo view('pelajaran');
        echo view('partial/footer');
        }else{
        return redirect()->to('/Home');
        }
    }
     public function tambah_pelajaran()
    {
        if(session()->get('id')>0) {
        $model=new M_model();
        $diva['octa']=$model->tampil('pelajaran');

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        echo view('partial/header',$diva);
        echo view('partial/side_menu',$diva);
        echo view('tambah_pelajaran',$diva);
        echo view('partial/footer');
        }else{
        return redirect()->to('/Home');
        }
    }
      public function aksi_tambah_pelajaran()
    {
       $model=new M_model();
   
        $nama_pelajaran=$this->request->getPost('nama_pelajaran');
        $guru=$this->request->getPost('guru');
        $data=array(
       
        'nama_pelajaran'=>$nama_pelajaran,
        'guru'=>$guru,
        );
        $model->simpan('pelajaran',$data);
        return redirect()->to('/home/pelajaran');;

    }
     public function edit_pelajaran($id)
    {
        $model=new M_model();
        $where=array('id_pelajaran'=>$id);
        $diva['octa']=$model->getWhere('pelajaran', $where);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        // $where=array('id_user' => session()->get('id'));

        echo view('partial/header',$diva);
        echo view('partial/side_menu',$diva);
        echo view('edit_pelajaran',$diva);
        echo view('partial/footer');

    
    }
     public function aksi_edit_pelajaran()
    {
        $model=new M_model();
    $id=$this->request->getPost('id');
    $nama_pelajaran=$this->request->getPost('nama_pelajaran');
    $guru=$this->request->getPost('guru');
    $data=array(
       
        'nama_pelajaran'=>$nama_pelajaran,
        'guru'=>$guru,
    );
    $where=array('id_pelajaran'=>$id);
    $model->qedit('pelajaran',$data,$where);
    return redirect()->to('/home/pelajaran');

    }
      public function delete_pelajaran($id)
    {
        $model=new M_model();
        $where=array('id_pelajaran'=>$id);
        $model->hapus('pelajaran',$where);
        return redirect()->to('/home/pelajaran');
    }
      public function blok()
     {
          if(session()->get('id')>0) {
        $model = new M_model();
        $diva['octa'] = $model->tampil('blok');

        $id = session()->get('id');
        $where = array('id' => $id);

        echo view('partial/header', $diva);
        echo view('partial/side_menu');
        echo view('blok');
        echo view('partial/footer');
        }else{
        return redirect()->to('/Home');
        }
    }
     public function tambah_blok()
    {
        if(session()->get('id')>0) {
        $model=new M_model();
        $diva['octa']=$model->tampil('blok');

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        echo view('partial/header',$diva);
        echo view('partial/side_menu',$diva);
        echo view('tambah_blok',$diva);
        echo view('partial/footer');
        }else{
        return redirect()->to('/Home');
        }
    }
      public function aksi_tambah_blok()
    {
        $a=$this->request->getPost('nama_blok');
        $b=$this->request->getPost('remark_blok');
       
        $simpan=array(
        'nama_blok'=>$a,
        'remark_blok'=>$b
        );
        $model=new M_model();
        $model->simpan('blok',$simpan);
        return redirect()->to('/Home/blok');

    }
     public function edit_blok($id)
    {
         $model=new M_model();
        $where=array('id_blok'=>$id);
        $diva['octa']=$model->getWhere('blok', $where);

        $id=session()->get('id');
        $where=array('id_user'=>$id);

        // $where=array('id_user' => session()->get('id'));

        echo view('partial/header',$diva);
        echo view('partial/side_menu',$diva);
        echo view('edit_blok',$diva);
        echo view('partial/footer');
    
    }
     public function aksi_edit_blok()
    {
        $model=new M_model();
        $id=$this->request->getPost('id');
        $nama_blok=$this->request->getPost('nama_blok');
        $remark_blok=$this->request->getPost('remark_blok');
        $data=array(
        'nama_blok'=>$nama_blok,
        'remark_blok'=>$remark_blok,
        );
        $where=array('id_blok'=>$id);
        $model->qedit('blok',$data,$where);
        return redirect()->to('/home/blok');
    }

     public function delete_blok($id)
    {
         $model=new M_model();
        $where=array('id_blok'=>$id);
        $model->hapus('blok',$where);
        return redirect()->to('/home/blok');
    }
      public function laporan_jadwal()
     {
        if(session()->get('id')>0) {
        $model=new M_model();
        $diva['octa']='view_jadwal';

        $id=session()->get('id');
        $where=array('id_user'=>$id);
        // $kui['foto']=$model->getRow('user',$where);

        echo view('partial/header',$diva);
        echo view('partial/side_menu',$diva);
        echo view('filter',$diva);
        echo view('partial/footer');
        }else{
        return redirect()->to('/Home');
        }
    }
    public function cari_jadwal()
{
        // if(session()->get('level')== 2 ||session()->get('level')==4 ) {

        $model=new M_model();
        $awal= $this->request->getPost('awal');
        $akhir= $this->request->getPost('akhir');
        $diva['octa']=$model->filter_jadwal('jadwal',$awal,$akhir);
       
   echo view('c_jadwal',$diva);
        
        // $img = file_get_contents(
        //     'C:\xampp\htdocs\koperasi-simpan-pinjam\public\images\ksp.png');

        // $kui['foto'] = base64_encode($img);
}
public function pdf_jadwal()
{
        // if(session()->get('level')== 2 ||session()->get('level')==4 ) {

        $model=new M_model();
        $awal= $this->request->getPost('awal');
        $akhir= $this->request->getPost('akhir');
        $diva['octa']=$model->filter_jadwal('jadwal',$awal, $akhir);
        // $img = file_get_contents(
        //     'C:\xampp\htdocs\koperasi-simpan-pinjam\public\images\ksp.png');

        // $kui['foto'] = base64_encode($img);

        $dompdf = new\Dompdf\Dompdf();
        $dompdf->setPaper('A4','landscape');
        $dompdf->loadHtml(view('c_jadwal',$diva));
        $dompdf->render();
        $dompdf->stream('my.pdf', array('Attachment'=>0));
    //     }else{
    //     return redirect()->to('/home/dashboard');
    // }
}
    public function excel_jadwal()
{
        // if(session()->get('level')== 2 ||session()->get('level')==4 ) {

    $model=new M_model();
    $awal= $this->request->getPost('awal');
    $akhir= $this->request->getPost('akhir');
    $data=$model->filter_jadwal('jadwal',$awal,$akhir);

    $spreadsheet=new Spreadsheet();

    $spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A1', 'Nama Kelas')
    ->setCellValue('B1', 'Nama Laboratium')
    ->setCellValue('C1', 'Blok')
    ->setCellValue('D1', 'Nama Pelajaran')
    ->setCellValue('E1', 'Jam')
    ->setCellValue('F1', 'Sesi')
    ->setCellValue('G1', 'Tahun Ajaran')
    ->setCellValue('H1', 'Tanggal')
    ->setCellValue('I1', 'Tanggal Input');


    $column=2;

    foreach($data as $data){
        $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue('A'. $column, $data->nama_kelas)
        ->setCellValue('B'. $column, $data->nama_lab)
        ->setCellValue('C'. $column, $data->nama_blok)
        ->setCellValue('D'. $column, $data->nama_pelajaran)
        ->setCellValue('E'. $column, $data->jam)
        ->setCellValue('F'. $column, $data->sesi)
        ->setCellValue('G'. $column, $data->nama_tahun)
        ->setCellValue('H'. $column, $data->tanggal_jadwal)
        ->setCellValue('I'. $column, $data->tgl);
        $column++;
    }
    $writer = new XLsx($spreadsheet);
    $fileName = 'Laporan Jadwal';

    header('Content-type:vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition:attachment;filename='.$fileName.'.xls');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
    // }else{
    //     return redirect()->to('/home/dashboard');
    // }
}
    
    public function hadir()
     {
          if(session()->get('id')>0) {
        $model = new M_model();
        $diva['octa'] = $model->tampil('hadir');

        $id = session()->get('id');
        $where = array('id_hadir' => $id);

        echo view('partial/header', $diva);
        // echo view('partial/side_menu');
        echo view('hadir');
        echo view('partial/footer');
        }else{
        return redirect()->to('/Home');
        }
    }
     public function tambah_hadir()
    {
        if(session()->get('id')>0) {
        $model=new M_model();
        $diva['octa']=$model->tampil('hadir');

        $id=session()->get('id');
        $where=array('id_hadir'=>$id);

        echo view('partial/header',$diva);
        // echo view('partial/side_menu',$diva);
        echo view('tambah_hadir',$diva);
        echo view('partial/footer');
        }else{
        return redirect()->to('/Home');
        }
    }
      public function aksi_tambah_hadir()
    {
        $a=$this->request->getPost('nama');
         $n=$this->request->getPost('kelas');
        $b=$this->request->getPost('tanggal');
         $c=$this->request->getPost('keterangan');
       
    
        $simpan=array(
        'nama'=>$a,
        'kelas'=>$n,
        'tanggal'=>$b,
         'keterangan'=>$c
        );
        $model=new M_model();
        $model->simpan('hadir',$simpan);
        return redirect()->to('/Home/hadir');

    }
     public function edit_hadir($id)
    {
         $model=new M_model();
        $where=array('id_hadir'=>$id);
        $diva['octa']=$model->getWhere('hadir', $where);

        $id=session()->get('id');
        $where=array('id_hadir'=>$id);

        // $where=array('id_user' => session()->get('id'));

        echo view('partial/header',$diva);
        // echo view('partial/side_menu',$diva);
        echo view('edit_hadir',$diva);
        echo view('partial/footer');
    
    }
     public function aksi_edit_hadir()
    {
        $model=new M_model();
        $id=$this->request->getPost('id');
        $nama=$this->request->getPost('nama');
         $kelas=$this->request->getPost('kelas');
        $tanggal=$this->request->getPost('tanggal');
          $keterangan=$this->request->getPost('keterangan');
        $data=array(
        'nama'=>$nama,
        'kelas'=>$kelas,
        'tanggal'=>$tanggal,
        'keterangan'=>$keterangan,
        );
        $where=array('id_hadir'=>$id);
        $model->qedit('hadir',$data,$where);
        return redirect()->to('/home/hadir');
    }

     public function delete_hadir($id)
    {
         $model=new M_model();
        $where=array('id_hadir'=>$id);
        $model->hapus('hadir',$where);
        return redirect()->to('/home/hadir');
    }
      public function kembali()
    {
        // if(session()->get('id')>0) {

         return redirect()->to('stefany/coba');

    //  }else{
    //     return redirect()->to('/home/dashboard');
    // }
    }
    public function bek()
    {
       

         return redirect()->to('home/dashboard');

  
    }
    public function siswa()
     {
          if(session()->get('id')>0) {
        $model = new M_model();
        $diva['octa'] = $model->tampil('siswa');

        $id = session()->get('id');
        $where = array('id_siswa' => $id);

        echo view('partial/header', $diva);
        // echo view('partial/side_menu');
        echo view('siswa');
        echo view('partial/footer');
        }else{
        return redirect()->to('/Home');
        }
    }
     public function tambah_siswa()
    {
        if(session()->get('id')>0) {
        $model=new M_model();
        $diva['octa']=$model->tampil('siswa');

        $id=session()->get('id');
        $where=array('id_siswa'=>$id);

        echo view('partial/header',$diva);
        // echo view('partial/side_menu',$diva);
        echo view('tambah_siswa',$diva);
        echo view('partial/footer');
        }else{
        return redirect()->to('/Home');
        }
    }
      public function aksi_tambah_siswa()
    {
        $a=$this->request->getPost('nik');
         $n=$this->request->getPost('nama');
        $b=$this->request->getPost('kelas');
       
    
        $simpan=array(
        'nik'=>$a,
        'nama'=>$n,
        'kelas'=>$b,
        );
        $model=new M_model();
        $model->simpan('siswa',$simpan);
        return redirect()->to('/Home/siswa');

    }
     public function edit_siswa($id)
    {
         $model=new M_model();
        $where=array('id_siswa'=>$id);
        $diva['octa']=$model->getWhere('siswa', $where);

        $id=session()->get('id');
        $where=array('id_siswa'=>$id);

        // $where=array('id_user' => session()->get('id'));

        echo view('partial/header',$diva);
        // echo view('partial/side_menu',$diva);
        echo view('edit_siswa',$diva);
        echo view('partial/footer');
    
    }
     public function aksi_edit_siswa()
    {
        $model=new M_model();
        $id=$this->request->getPost('id');
        $nik=$this->request->getPost('nik');
         $nama=$this->request->getPost('nama');
        $kelas=$this->request->getPost('kelas');
        $data=array(
        'nik'=>$nik,
        'nama'=>$nama,
        'kelas'=>$kelas,
        );
        $where=array('id_siswa'=>$id);
        $model->qedit('siswa',$data,$where);
        return redirect()->to('/home/siswa');
    }

     public function delete_siswa($id)
    {
         $model=new M_model();
        $where=array('id_siswa'=>$id);
        $model->hapus('siswa',$where);
        return redirect()->to('/home/siswa');
    }
     public function mapel()
     {
          if(session()->get('id')>0) {
        $model = new M_model();
        $diva['octa'] = $model->tampil('mapel');

        $id = session()->get('id');
        $where = array('id_mapel' => $id);

        echo view('partial/header', $diva);
        // echo view('partial/side_menu');
        echo view('mapel');
        echo view('partial/footer');
        }else{
        return redirect()->to('/Home');
        }
    }
     public function tambah_mapel()
    {
        if(session()->get('id')>0) {
        $model=new M_model();
        $diva['octa']=$model->tampil('mapel');

        $id=session()->get('id');
        $where=array('id_mapel'=>$id);

        echo view('partial/header',$diva);
        // echo view('partial/side_menu',$diva);
        echo view('tambah_mapel',$diva);
        echo view('partial/footer');
        }else{
        return redirect()->to('/Home');
        }
    }
      public function aksi_tambah_mapel()
    {
        $a=$this->request->getPost('mapel');
         $n=$this->request->getPost('tanggal');
        $b=$this->request->getPost('sesi');
         $c=$this->request->getPost('hadir');
          $d=$this->request->getPost('keterangan');
       
    
        $simpan=array(
        'mapel'=>$a,
        'tanggal'=>$n,
        'sesi'=>$b,
        'hadir'=>$c,
        'keterangan'=>$d,
        );
        $model=new M_model();
        $model->simpan('mapel',$simpan);
        return redirect()->to('/Home/mapel');

    }
     public function edit_mapel($id)
    {
         $model=new M_model();
        $where=array('id_mapel'=>$id);
        $diva['octa']=$model->getWhere('mapel', $where);

        $id=session()->get('id');
        $where=array('id_mapel'=>$id);

        // $where=array('id_user' => session()->get('id'));

        echo view('partial/header',$diva);
        // echo view('partial/side_menu',$diva);
        echo view('edit_mapel',$diva);
        echo view('partial/footer');
    
    }
     public function aksi_edit_mapel()
    {
        $model=new M_model();
        $id=$this->request->getPost('id');
        $mapel=$this->request->getPost('mapel');
         $tanggal=$this->request->getPost('tanggal');
        $sesi=$this->request->getPost('sesi');
         $hadir=$this->request->getPost('hadir');
          $keterangan=$this->request->getPost('keterangan');
        $data=array(
        'mapel'=>$mapel,
        'tanggal'=>$tanggal,
        'sesi'=>$sesi,
         'hadir'=>$hadir,
          'keterangan'=>$keterangan,
        );
        $where=array('id_mapel'=>$id);
        $model->qedit('mapel',$data,$where);
        return redirect()->to('/home/mapel');
    }

     public function delete_mapel($id)
    {
         $model=new M_model();
        $where=array('id_mapel'=>$id);
        $model->hapus('mapel',$where);
        return redirect()->to('/home/mapel');
    }

    public function log_out()
    {
        // if(session()->get('id')>0) {

         session()->destroy();
         return redirect()->to('/');

    //  }else{
    //     return redirect()->to('/home/dashboard');
    // }
    }



}
