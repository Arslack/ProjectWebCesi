<?php if(!defined('BASEPATH')) exit('Pas d\'accès direct');

class Demande_model extends CI_Model
{
    /**
     * function nbDemandeparUser
	 * param $userid
     */
    function nbDemandeparUser($userId, $searchText = '')
    {
        $this->db->select('TB.id, TB.dateorigine, TB.datemaj, TB.datefinprevue,TB.idEtat, TB.description,TB.titre');
        $this->db->from('demande as TB');
        $this->db->join('tbl_users as U', 'U.userId = TB.id','left');
        $this->db->where('TB.utilisateurid', $userId);
        $this->db->where('U.isDeleted', 0);

        $query = $this->db->get();

        return count($query->result());
    }
	/**
     * function listeDemandeparUser
	 * param $userid
     */
    function listeDemandeparUser($userId, $searchText = '')
    {
        $this->db->select('TB.id, TB.dateorigine, TB.datemaj, TB.datefinprevue,TB.idEtat, TB.description,TB.titre');
        $this->db->from('demande as TB');
        $this->db->join('tbl_users as U', 'U.userId = TB.Id','left');
        $this->db->where('TB.utilisateurid', $userId);
        $this->db->where('U.isDeleted', 0);

        $query = $this->db->get();

        return ($query->result());
    }
	/**
     * function nbDemandeTous
	 * param $userid
     */
    function nbDemandeTous()
    {
        $this->db->select('TB.id, TB.dateorigine, TB.datemaj, TB.datefinprevue,TB.idEtat, TB.description,TB.titre');
        $this->db->from('demande as TB');
        $this->db->join('tbl_users as U', 'U.userId = TB.id','left');
        $this->db->where('U.isDeleted', 0);

        $query = $this->db->get();

        return count($query->result());
    }
	/**
     * function listeDemandeTous
	 * param $userid
     */
    function listeDemandeparTous()
    {
        $this->db->select('TB.id, TB.dateorigine, TB.datemaj, TB.datefinprevue,TB.idEtat, TB.description,TB.titre');
        $this->db->from('demande as TB');
        $this->db->join('tbl_users as U', 'U.userId = TB.Id','left');
        $this->db->where('U.isDeleted', 0);

        $query = $this->db->get();

        return ($query->result());
    }
	/**
     * function nbDemandeValide
	 * param $userid
     */
    function nbDemandeValide()
    {
        $this->db->select('TB.id, TB.dateorigine, TB.datemaj, TB.datefinprevue,TB.idEtat, TB.description,TB.titre');
        $this->db->from('demande as TB');
        $this->db->join('tbl_users as U', 'U.userId = TB.id','left');
        $this->db->where('U.isDeleted', 0);
        $this->db->where('TB.idEtat', 2);
        $query = $this->db->get();

        return count($query->result());
    }
	/**
     * function listeDemandeValide
	 * param $userid
     */
    function listeDemandeValide()
    {
        $this->db->select('TB.id, TB.dateorigine, TB.datemaj, TB.datefinprevue,TB.idEtat, TB.description,TB.titre');
        $this->db->from('demande as TB');
        $this->db->join('tbl_users as U', 'U.userId = TB.Id','left');
		$this->db->where('TB.idEtat', 2);
        $this->db->where('U.isDeleted', 0);

        $query = $this->db->get();

        return ($query->result());
    }
	/**
     * function nbDemandeValide
	 * param $userid
     */
    function nbDemandenonValide()
    {
        $this->db->select('TB.id, TB.dateorigine, TB.datemaj, TB.datefinprevue,TB.idEtat, TB.description,TB.titre');
        $this->db->from('demande as TB');
        $this->db->join('tbl_users as U', 'U.userId = TB.id','left');
        $this->db->where('U.isDeleted', 0);
        $this->db->where('TB.idEtat!=', 2);
        $query = $this->db->get();

        return count($query->result());
    }
	/**
     * function listeDemandeValide
	 * param $userid
     */
    function listeDemandeValide()
    {
        $this->db->select('TB.id, TB.dateorigine, TB.datemaj, TB.datefinprevue,TB.idEtat, TB.description,TB.titre');
        $this->db->from('demande as TB');
        $this->db->join('tbl_users as U', 'U.userId = TB.Id','left');
		$this->db->where('TB.idEtat!=', 2);
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
        $this->db->from('demande as TB');
        $this->db->join('tbl_users as U', 'U.userId = TB.Id','left');
        $this->db->where('TB.idEtat', $etatid);
        $this->db->where('U.isDeleted', 0);

        $query = $this->db->get();

        return ($query->result());
    }




}
