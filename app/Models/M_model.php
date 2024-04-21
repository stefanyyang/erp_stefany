<?php 
namespace App\Models;
use CodeIgniter\Model;

class M_model extends Model
{
  public function tampil($table){
    return $this->db->table($table)->get()->getResult();
  }
  public function hapus($table, $where){
    return $this->db->table($table)->delete($where);
  }
  public function simpan($table, $data){
    return $this->db->table($table)->insert($data);
  }
    public function kembali($table, $data){
    return $this->db->table($table)->return($data);
  }
  public function getWhere($table, $where){
    return $this->db->table($table)->getWhere($where)->getRow();
  }
    public function getarray($table, $where)
  {
    return $this->db->table($table)->getWhere($where)->getRowArray();
  }
  public function qedit($table, $data, $where)
  {
    return $this->db->table($table)->update($data, $where);
  }
    public function ultraRow($table1, $table2, $table3, $on, $on2, $where)
    {
    return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->getWhere($where)->getRow();
  }
  public function join2($table1, $table2, $on)
  {
    return $this->db->table($table1)->join($table2, $on, 'left')->get()->getResult();
  }
  public function getWhere2($table, $where){
    return $this->db->table($table)->getWhere($where)->getRowArray();
  }
  public function join3($table1, $table2, $table3, $on1, $on2)
  {
    return $this->db->table($table1)
      ->join($table2, $on1, 'left')
      ->join($table3, $on2, 'left')
      ->get()->getResult();
  }
  public function monster($table1, $table2, $table3,  $table4,  $table5, $on, $on2, $on3, $on4 )
  {
    return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->join($table4, $on3)->join($table5, $on4)->get()->getResult();
  }

  public function monsterRows($table1, $table2, $table3, $table4, $table5, $on, $on2, $on3, $on4,  $where)
  {
    return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->join($table4, $on3)->join($table5, $on4)->getWhere($where)->getRow();
  }
  public function super($table1, $table2, $table3, $on, $on2)
  {
    return $this->db->table($table1)->join($table2, $on)->join($table3, $on2)->get()->getResult();
  }
  protected $table='nota';

  
  public function join4($table1, $table2, $table3, $on, $on2)
  {
    return $this->db->table($table1)->join($table2, $on, 'left')->join($table3, $on2, 'left')->get()->getResult();
  }
public function filter_jadwal($table, $awal, $akhir) {
    return $this->db->query(
        "SELECT *
        FROM ".$table."
        JOIN kelas ON ".$table.".id_kelas=kelas.id_kelas
        JOIN lab ON ".$table.".id_lab=lab.id_lab
        JOIN blok ON ".$table.".id_blok=blok.id_blok
        JOIN pelajaran ON ".$table.".id_pelajaran=pelajaran.id_pelajaran
        WHERE ".$table.".tgl
        BETWEEN '".$awal."'
        AND '".$akhir."'"
    )->getResult();
  }
 
  public function filter2 ($table,$awal,$akhir)
  {
    return $this->db->query("
      SELECT *
      FROM ".$table."
      WHERE ".$table.".tanggal
      BETWEEN '".$awal."'
      and '".$akhir."'"

        )->getResult();
  }
 
}