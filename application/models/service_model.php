<?php if(!defined('BASEPATH')) exit('Pas d\'accès direct');

class Service_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function serviceListingCount($searchText = '')
    {
        $this->db->select('BaseTbl.id, BaseTbl.nom, BaseTbl.description');
        $this->db->from('service as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.nom  LIKE '%".$searchText."%'
                            OR  BaseTbl.description  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }

        $query = $this->db->get();

        return count($query->result());
    }

    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function serviceListing($searchText = '', $page, $segment)
    {
        $this->db->select('BaseTbl.id, BaseTbl.nom, BaseTbl.description');
        $this->db->from('service as BaseTbl');
        if(!empty($searchText)) {
            $likeCriteria = "(BaseTbl.nom  LIKE '%".$searchText."%'
                            OR  BaseTbl.description  LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }
        $this->db->limit($page, $segment);

        $query = $this->db->get();

        $result = $query->result();
        return $result;
    }


    /**
     * This function is used to get the user add Service listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function userAddListingCount($searchText = '')
    {
        $this->db->select('TU.userId, TU.name, TU.email, TU.mobile');
        $this->db->from('tbl_users as TU');
        $this->db->join('tbl_roles as TR', 'TU.roleId = TR.roleId', 'left');
        $this->db->where('TU.roleId', 3);
        $this->db->where('TU.idService', NULL);
        if(!empty($searchText)) {
            $likeCriteria = "(TU.name  LIKE '%".$searchText."%'
                            OR  TU.email  LIKE '%".$searchText."%'
                            OR  TU.mobile LIKE '%".$searchText."%')";
            $this->db->where($likeCriteria);
        }

        $query = $this->db->get();

        return count($query->result());
    }

    /**
     * This function is used to get the user possible to into Services
     * @param string $searchText : This is optional search text
     * @param number $page : This is pagination offset
     * @param number $segment : This is pagination limit
     * @return array $result : This is result
     */
    function userAddListing($searchText = '', $page, $segment)
    {
      $this->db->select('TU.userId, TU.name, TU.email, TU.mobile');
      $this->db->from('tbl_users as TU');
      $this->db->join('tbl_roles as TR', 'TU.roleId = TR.roleId', 'left');
      $this->db->where('TU.roleId', 3);
      $this->db->where('TU.idService', NULL);
      if(!empty($searchText)) {
          $likeCriteria = "(TU.name  LIKE '%".$searchText."%'
                          OR  TU.email  LIKE '%".$searchText."%'
                          OR  TU.mobile LIKE '%".$searchText."%')";
          $this->db->where($likeCriteria);
      }

      $this->db->limit($page, $segment);
      $query = $this->db->get();

        $result = $query->result();
        return $result;
    }


    /**
     * This function is used to get the user roles information
     * @return array $result : This is result of the query
     */
    function getService()
    {
        $this->db->select('id, nom');
        $this->db->from('service');
        $query = $this->db->get();

        return $query->result();
    }


    /**
     * This function is used to add new user to system
     * @return number $insert_id : This is last inserted id
     */
    function addNewService($serviceInfo)
    {
        $this->db->trans_start();
        $this->db->insert('service', $serviceInfo);

        $insert_id = $this->db->insert_id();

        $this->db->trans_complete();

        return $insert_id;
    }

    /**
     * This function used to get service information by id
     * @param number $serviceId : This is service id
     * @return array $result : This is service information
     */
    function getServiceInfo($serviceId)
    {
        $this->db->select('id, nom, description');
        $this->db->from('service');
        $this->db->where('id', $serviceId);
        $query = $this->db->get();

        return $query->result();
    }


    /**
     * This function used to get UserMemberService information by id
     * @param number $serviceId : This is service id
     * @return array $result : This is user list of service
     */
    function getServiceUserInfo($serviceId)
    {
        $this->db->select('BaseTbl.userId, BaseTbl.email, BaseTbl.name, BaseTbl.mobile');
        $this->db->from('tbl_users as BaseTbl');
        $this->db->where('idService', $serviceId);
        $query = $this->db->get();

        return $query->result();
    }



    /**
     * This function is used to update the user information
     * @param array $userInfo : This is users updated information
     * @param number $userId : This is user id
     */
    function editService($serviceInfo, $serviceId)
    {
        $this->db->where('id', $serviceId);
        $this->db->update('service', $serviceInfo);

        return TRUE;
    }



    /**
     * This function is used to delete the user service information
     * @param number $userId : This is user id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUserService($userId)
    {
        $idService = array('idService' => NULL);
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $idService);

        return $this->db->affected_rows();
    }

    /**
     * This function is used to add the user service information
     * @param number $userId : This is user id
     * @return boolean $result : TRUE / FALSE
     */
    function addUserService($userId, $serviceId)
    {
        $idService = array('idService' => $serviceId);
        $this->db->where('userId', $userId);
        $this->db->update('tbl_users', $idService);

        return $this->db->affected_rows();
    }



     /**
      * This function is used to delete the user information
      * @param number $userId : This is user id
      * @return boolean $result : TRUE / FALSE
      */
    function deleteService($serviceId)
    {
        $this->db->where('id', $serviceId);
        $this->db->delete('service');
        return $this->db->affected_rows();
    }


}
