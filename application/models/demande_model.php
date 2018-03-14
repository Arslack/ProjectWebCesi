<?php if(!defined('BASEPATH')) exit('Pas d\'accès direct');

class Demande_model extends CI_Model
{


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

       return ($query->result());
   }

     /**
     * function listeDemandeparidEtat
	 * param $userid
     */
    function listeDemandeparEtatService($etatid, $serviceId,  $searchText = '', $page, $segment)
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

        $this->db->limit($page, $segment);
        $query = $this->db->get();

        return ($query->result());

        return ($query->result());
    }




}
