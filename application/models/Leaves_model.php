<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Leaves_model extends CI_Model
{
  function getType()
  {
      $this->db->select('id, name');
      $this->db->from('tbl_leavetypes');
      $query = $this->db->get();
      return $query->result();
  }
  function getStatus()
  {
      $this->db->select('id, names');
      $this->db->from('tbl_status as s');
      $this->db->where('s.names ="Requested " or s.names="Planed" ');
      $query = $this->db->get();
      return $query->result();
  }
 function addNewRequest($data)
  {
      $this->db->insert('tbl_leaves',$data);
       $this->db->set('id', NULL);
  }
  function ListallLeaveRequest(){
    $this->db->select('l.id , l.startdate , l.enddate , l.duration , l.comment , s.names , t.name');
    $this->db->from('tbl_leaves as l');
    $this->db->join('tbl_status as s','s.id = l.id ');
    $this->db->join('tbl_leavetypes as t','s.id = t.id');
    $query = $this->db->get();
    return $query->result();
  }

}
