<?php if(!defined('BASEPATH')) exit('Pas d\'accès direct');

class Demande_model extends CI_Model
{
    /**
     * function nbDemandeparUser
	 * param $userid
     */
    function nbDemandeparUser($userid)
    {
        $this->db->select('TB.Id, TB.dateorigine, TB.datemaj, TB.datefinprevue,TB.idEtat, TB.description,TB.titre');
        $this->db->from('Demande as TB');
        $this->db->join('User as U', 'U.userId = TB.Id','left');
        $this->db->where('TB.utilisateurid', $userid);
        $this->db->where('U.isDeleted', 0);
      
        $query = $this->db->get();
        
        return count($query->result());
    }
	/**
     * function listeDemandeparUser
	 * param $userid
     */
    function listeDemandeparUser($userid)
    {
        $this->db->select('TB.Id, TB.dateorigine, TB.datemaj, TB.datefinprevue,TB.idEtat, TB.description,TB.titre');
        $this->db->from('Demande as TB');
        $this->db->join('User as U', 'U.userId = TB.Id','left');
        $this->db->where('TB.utilisateurid', $userid);
        $this->db->where('U.isDeleted', 0);
      
        $query = $this->db->get();
        
        return ($query->result());
    }
     /**
     * function listeDemandeparidEtat
	 * param $userid
     */
    function listeDemandeparEtat($etatid)
    {
        $this->db->select('TB.Id, TB.dateorigine, TB.datemaj, TB.datefinprevue,TB.idEtat, TB.description,TB.titre');
        $this->db->from('Demande as TB');
        $this->db->join('User as U', 'U.userId = TB.Id','left');
        $this->db->where('TB.idEtat', $etatid);
        $this->db->where('U.isDeleted', 0);
      
        $query = $this->db->get();
        
        return ($query->result());
    }
    
   
    
    
}

  