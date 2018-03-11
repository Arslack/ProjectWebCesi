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
     * This function is used to get the user roles information
     * @return array $result : This is result of the query
     */
    function getUserRoles()
    {
        $this->db->select('roleId, role');
        $this->db->from('tbl_roles');
        $this->db->where('roleId !=', 1);
        $query = $this->db->get();

        return $query->result();
    }

    /**
     * This function is used to check whether email id is already exist or not
     * @param {string} $email : This is email id
     * @param {number} $userId : This is user id
     * @return {mixed} $result : This is searched result
     */
    function checkEmailExists($email, $userId = 0)
    {
        $this->db->select("email");
        $this->db->from("tbl_users");
        $this->db->where("email", $email);
        $this->db->where("isDeleted", 0);
        if($userId != 0){
            $this->db->where("userId !=", $userId);
        }
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
     * This function is used to delete the user information
     * @param number $userId : This is user id
     * @return boolean $result : TRUE / FALSE
     */
    function deleteService($serviceId)
    {
        $this->db->where('id', $serviceId);
        $this->db->delete('service');
        return TRUE;
    }


    /**
     * This function is used to match users password for change password
     * @param number $userId : This is user id
     */
    function matchOldPassword($userId, $oldPassword)
    {
        $this->db->select('userId, password');
        $this->db->where('userId', $userId);
        $this->db->where('isDeleted', 0);
        $query = $this->db->get('tbl_users');

        $user = $query->result();

        if(!empty($user)){
            if(verifyHashedPassword($oldPassword, $user[0]->password)){
                return $user;
            } else {
                return array();
            }
        } else {
            return array();
        }
    }

    /**
     * This function is used to change users password
     * @param number $userId : This is user id
     * @param array $userInfo : This is user updation info
     */
    function changePassword($userId, $userInfo)
    {
        $this->db->where('userId', $userId);
        $this->db->where('isDeleted', 0);
        $this->db->update('tbl_users', $userInfo);

        return $this->db->affected_rows();
    }
}
