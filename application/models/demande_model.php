<?php if(!defined('BASEPATH')) exit('Pas d\'accès direct');

class Demande_model extends CI_Model
{
 /**
     * This function used to delete demande information by id
     * @param number $demandeId : This is demande id
     * @return true/false
     */
    function deleteDemande($demandeId)
    {
		$this->db->where('TB.id', $demandeId);
		$this->db->limit(1);
		if (!$this->db->delete('demande')) {
         return false;
         }
        else
         print_r($this->db->affected_rows());            
    }
  

  /**
   * This function is used to add new user to system
   * @return number $insert_id : This is last inserted id
   */
    function addNewDemande($demandeInfo)
    {
        $demande = array('utilisateurid'=>$demandeInfo['userId'], 'dateorigine'=>date('Y-m-d H:i:s'), 'datemaj'=>date('Y-m-d H:i:s'),
                          'idEtat'=> 1, 'description'=> $demandeInfo['description'], 'titre'=>$demandeInfo['titre']);
        $this->db->trans_start();

        $this->db->insert('demande', $demande);

        $demandeid = $this->db->insert_id();

        $dossier = array('dateorigine'=>date('Y-m-d H:i:s'), 'datemaj'=>date('Y-m-d H:i:s'),
                            'nomfichier'=> $demandeInfo['filename'], 'cheminfichier'=>$demandeInfo['filepath']);
        $this->db->insert('dossier', $dossier);

        $dossierid = $this->db->insert_id();

        $demandedossier = array('idDemande'=>$demandeid, 'idDossier'=>$dossierid);

        $this->db->insert('demande_dossier', $demandedossier);

        $responsabilite = array('idDemande'=>$demandeid, 'idService'=>$demandeInfo['serviceId']);

        $this->db->insert('responsabilite', $responsabilite);

        $this->db->insert_id();

        $this->db->trans_complete();

        return $demandeid;
    }

    /**
     * This function used to get demande information by id
     * @param number $demandeId : This is demande id
     * @return array $result : This is demande information
     */
    function getDemandeInfo($demandeId)
    {
        $this->db->select('TB.id, TB.utilisateurid, U.idService, TB.dateorigine, TB.datemaj, TB.datefinprevue,TB.idEtat,TE.titre as Etat, TB.description,TB.titre');
        $this->db->from('demande as TB');
        $this->db->join('responsabilite as U', 'U.idDemande = TB.id','left');
        $this->db->join('etat as TE', 'TE.id = TB.idEtat','left');
        $this->db->where('TB.id', $demandeId);

        $query = $this->db->get();
        return $query->result();
    }

    /**
     * This function is used to get the user roles information
     * @return array $result : This is result of the query
     */
    function getEtat()
    {
        $this->db->select('id, titre');
        $this->db->from('etat');
        $query = $this->db->get();

        return $query->result();
    }


    /**
     * This function used to get dossier information by demande id
     * @param number $demandeId : This is demande id
     * @return array $result : This is demande dossier information
     */
    function getDossierInfo($demandeId)
    {
        $this->db->select('TD.id, TD.datemaj, TD.nomfichier,TD.cheminfichier');
        $this->db->from('dossier as TD');
        $this->db->join('demande_dossier as U', 'U.idDossier = TD.id','left');
        $this->db->where('U.idDemande', $demandeId);

        $query = $this->db->get();
        return $query->result();
    }
    /**
     * function nbDemandeparUser
	 * param $userid
     */
    function nbDemandeparService($serviceId, $searchText = '')
    {
        $this->db->select('TB.id, TB.dateorigine, TB.datemaj, TB.datefinprevue,TE.titre as Etat, TB.description,TB.titre');
        $this->db->from('demande as TB');
        $this->db->join('responsabilite as U', 'U.idDemande = TB.id','left');
        $this->db->join('etat as TE', 'TE.id = TB.idEtat','left');
        $this->db->where('U.idService', $serviceId);
        if(!empty($searchText)) {
            $likeCriteria = "(TB.id LIKE '%".$searchText."%'
                            OR  TB.dateorigine  LIKE '%".$searchText."%'
                            OR  TB.datemaj LIKE '%".$searchText."%'
                            OR  TB.datemaj LIKE '%".$searchText."%'
                            OR  TB.datefinprevue LIKE '%".$searchText."%'
                            OR  TE.titre LIKE '%".$searchText."%'
                            OR  TB.titre LIKE '%".$searchText."%'
                            OR  TB.description LIKE '%".$searchText."%'
                            OR  TB.datefinprevue LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }

        $query = $this->db->get();

        return count($query->result());
    }
	/**
     * function listeDemandeparUser
	 * param $userid
     */
    function listeDemandeparService($userId, $searchText = '', $page, $segment)
    {
      $this->db->select('TB.id, TB.dateorigine, TB.datemaj, TB.datefinprevue,TE.titre as Etat, TB.description,TB.titre');
      $this->db->from('demande as TB');
      $this->db->join('responsabilite as U', 'U.idDemande = TB.id','left');
      $this->db->join('etat as TE', 'TE.id = TB.idEtat','left');
      $this->db->where('U.idService', $serviceId);
      $this->db->where('U.isDeleted', 0);
      if(!empty($searchText)) {
          $likeCriteria = "(TB.id LIKE '%".$searchText."%'
                          OR  TB.dateorigine  LIKE '%".$searchText."%'
                          OR  TB.datemaj LIKE '%".$searchText."%'
                          OR  TB.datemaj LIKE '%".$searchText."%'
                          OR  TB.datefinprevue LIKE '%".$searchText."%'
                          OR  TE.titre LIKE '%".$searchText."%'
                          OR  TB.titre LIKE '%".$searchText."%'
                          OR  TB.description LIKE '%".$searchText."%'
                          OR  TB.datefinprevue LIKE '%".$searchText."%')";
          $this->db->where($likeCriteria);
      }

      $query = $this->db->get();

      return count($query->result());
    }

    /**
     * function nbDemandeparUser
	 * param $userid
     */
    function nbDemandeparUser($userId, $searchText = '')
    {
        $this->db->select('TB.id, TB.dateorigine, TB.datemaj, TB.datefinprevue,TE.titre as Etat, TB.description,TB.titre');
        $this->db->from('demande as TB');
        $this->db->join('tbl_users as U', 'U.userId = TB.id','left');
        $this->db->join('etat as TE', 'TE.id = TB.idEtat','left');
        $this->db->where('TB.utilisateurid', $userId);
        if(!empty($searchText)) {
            $likeCriteria = "(TB.id LIKE '%".$searchText."%'
                            OR  TB.dateorigine  LIKE '%".$searchText."%'
                            OR  TB.datemaj LIKE '%".$searchText."%'
                            OR  TB.datemaj LIKE '%".$searchText."%'
                            OR  TB.datefinprevue LIKE '%".$searchText."%'
                            OR  TE.titre LIKE '%".$searchText."%'
                            OR  TB.titre LIKE '%".$searchText."%'
                            OR  TB.description LIKE '%".$searchText."%'
                            OR  TB.datefinprevue LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }

        $query = $this->db->get();

        return count($query->result());
    }
	/**
     * function listeDemandeparUser
	 * param $userid
     */
    function listeDemandeparUser($userId, $searchText = '', $page, $segment)
    {
        $this->db->select('TB.Id, TB.dateorigine, TB.datemaj, TB.datefinprevue, TE.titre as Etat, TB.description,TB.titre');
        $this->db->from('demande as TB');
        $this->db->join('tbl_users as U', 'U.userId = TB.id','left');
        $this->db->join('etat as TE', 'TE.id = TB.idEtat','left');
        $this->db->where('TB.utilisateurid', $userId);
        if(!empty($searchText)) {
            $likeCriteria = "(TB.id LIKE '%".$searchText."%'
                            OR  TB.dateorigine  LIKE '%".$searchText."%'
                            OR  TB.datemaj LIKE '%".$searchText."%'
                            OR  TB.datemaj LIKE '%".$searchText."%'
                            OR  TB.datefinprevue LIKE '%".$searchText."%'
                            OR  TE.titre LIKE '%".$searchText."%'
                            OR  TB.titre LIKE '%".$searchText."%'
                            OR  TB.description LIKE '%".$searchText."%'
                            OR  TB.datefinprevue LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }

        $this->db->limit($page, $segment);
        $query = $this->db->get();

        return ($query->result());
    }
	/**
     * function nbDemandeTous
	 * param $userid
     */
    function nbDemandeTous($searchText = '')
    {
        $this->db->select('TB.Id, TB.dateorigine, TB.datemaj, TB.datefinprevue, TE.titre as Etat, TB.description,TB.titre');
        $this->db->from('demande as TB');
        $this->db->join('etat as TE', 'TE.id = TB.idEtat','left');
        if(!empty($searchText)) {
            $likeCriteria = "(TB.id LIKE '%".$searchText."%'
                            OR  TB.dateorigine  LIKE '%".$searchText."%'
                            OR  TB.datemaj LIKE '%".$searchText."%'
                            OR  TB.datemaj LIKE '%".$searchText."%'
                            OR  TB.datefinprevue LIKE '%".$searchText."%'
                            OR  TE.titre LIKE '%".$searchText."%'
                            OR  TB.titre LIKE '%".$searchText."%'
                            OR  TB.description LIKE '%".$searchText."%'
                            OR  TB.datefinprevue LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }

        $query = $this->db->get();

        return count($query->result());
    }
	/**
     * function listeDemandeTous
	 * param $userid
     */
    function listeDemandeparTous($searchText = '', $page, $segment)
    {
        $this->db->select('TB.id, TB.dateorigine, TB.datemaj, TB.datefinprevue,TE.titre as Etat, TB.description,TB.titre');
        $this->db->from('demande as TB');
        $this->db->join('etat as TE', 'TE.id = TB.idEtat','left');
        if(!empty($searchText)) {
            $likeCriteria = "(TB.id LIKE '%".$searchText."%'
                            OR  TB.dateorigine  LIKE '%".$searchText."%'
                            OR  TB.datemaj LIKE '%".$searchText."%'
                            OR  TB.datemaj LIKE '%".$searchText."%'
                            OR  TB.datefinprevue LIKE '%".$searchText."%'
                            OR  TE.titre LIKE '%".$searchText."%'
                            OR  TB.titre LIKE '%".$searchText."%'
                            OR  TB.description LIKE '%".$searchText."%'
                            OR  TB.datefinprevue LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }

        $this->db->limit($page, $segment);
        $query = $this->db->get();

        return ($query->result());
    }

    /**
    * function listeDemandeparidEtat
  * param $userid
    */
   function nbDemandeparEtatService($etatid, $serviceId, $searchText = '')
   {
       $this->db->select('TB.id, TB.dateorigine, TB.datemaj, TB.datefinprevue,TE.titre as Etat, TB.description,TB.titre');
       $this->db->from('demande as TB');
       $this->db->join('responsabilite as U', 'U.idDemande = TB.id','left');
       $this->db->join('etat as TE', 'TE.id = TB.idEtat','left');
       $this->db->where('U.idService', $serviceId);
       $this->db->where('TB.idEtat', $etatid);

       if(!empty($searchText)) {
           $likeCriteria = "(TB.id LIKE '%".$searchText."%'
                           OR  TB.dateorigine  LIKE '%".$searchText."%'
                           OR  TB.datemaj LIKE '%".$searchText."%'
                           OR  TB.datemaj LIKE '%".$searchText."%'
                           OR  TB.datefinprevue LIKE '%".$searchText."%'
                           OR  TE.titre LIKE '%".$searchText."%'
                           OR  TB.titre LIKE '%".$searchText."%'
                           OR  TB.description LIKE '%".$searchText."%'
                           OR  TB.datefinprevue LIKE '%".$searchText."%')";
           $this->db->where($likeCriteria);
       }

       $query = $this->db->get();

       return count($query->result());
   }

     /**
     * function listeDemandeparidEtat
	 * param $userid
     */
    function listeDemandeparEtatService($etatid, $serviceId,  $searchText = '', $page, $segment)
    {
        $this->db->select('TB.id, TB.dateorigine, TB.datemaj, TB.datefinprevue,TB.idEtat,TE.titre as Etat, TB.description,TB.titre');
        $this->db->from('demande as TB');
        $this->db->join('responsabilite as U', 'U.idDemande = TB.id','left');
        $this->db->join('etat as TE', 'TE.id = TB.idEtat','left');
        $this->db->where('U.idService', $serviceId);
        $this->db->where('TB.idEtat', $etatid);
        if(!empty($searchText)) {
            $likeCriteria = "(TB.id LIKE '%".$searchText."%'
                            OR  TB.dateorigine  LIKE '%".$searchText."%'
                            OR  TB.datemaj LIKE '%".$searchText."%'
                            OR  TB.datemaj LIKE '%".$searchText."%'
                            OR  TB.datefinprevue LIKE '%".$searchText."%'
                            OR  TE.titre LIKE '%".$searchText."%'
                            OR  TB.titre LIKE '%".$searchText."%'
                            OR  TB.description LIKE '%".$searchText."%'
                            OR  TB.datefinprevue LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }

        $this->db->limit($page, $segment);
        $query = $this->db->get();


        return ($query->result());
    }

    /**
     * This function is used to update the etat demande
     * @param number $idDemande : This is demande id
     * @param number $idEtat : This is etat id
     * @return boolean $result : TRUE / FALSE
     */
    function editEtatDemande($idDemande,$idEtat)
    {
        $idEtat = array('idEtat' => $idEtat);
        $this->db->where('id', $idDemande);
        $this->db->update('demande', $idEtat);

        return $this->db->affected_rows();
    }



}
