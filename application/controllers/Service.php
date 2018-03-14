<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : Service
 * Fonction liée aux Services
 * @author :
 */
class Service extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('service_model');
        $this->isLoggedIn();
    }

    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Liste des Services';

        $this->loadViews("service", $this->global, NULL , NULL);
    }

    /**
     * This function is used to load the Service list
     */
     function serviceListing()
     {
         if($this->isAdmin() == TRUE)
         {
             $this->loadThis();
         }
         else
         {
             $this->load->model('service_model');

             $searchText = $this->input->post('searchText');
             $data['searchText'] = $searchText;

             $this->load->library('pagination');

             $count = $this->service_model->serviceListingCount($searchText);

 			$returns = $this->paginationCompress ( "serviceListing/", $count, 5 );

             $data['serviceRecords'] = $this->service_model->serviceListing($searchText, $returns["page"], $returns["segment"]);

             $this->global['pageTitle'] = 'Liste des Services';

             $this->loadViews("service", $this->global, $data, NULL);
         }
     }

    /**
     * This function is used to load the add new form
     */
    function addService()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('service_model');

            $this->global['pageTitle'] = 'Nouveau Service';

            $this->loadViews("addService", $this->global, NULL, NULL);
        }
    }

    /**
     * This function is used to load the add user to a service
     */
    function addUserService()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {

            $this->load->model('service_model');


            $searchText = $this->input->post('searchText');

            $data['searchText'] = $searchText;

            $this->load->library('pagination');

            $count = $this->service_model->userAddListingCount($searchText);

     $returns = $this->paginationCompress ( "addUserService/", $count, 5 );

            $data['userRecords'] = $this->service_model->userAddListing($searchText, $returns["page"], $returns["segment"]);
            $data['serviceId'] =  $this->input->post('serviceId');
            $this->global['pageTitle'] = 'Ajouter Utilisateur au Service';

            $this->loadViews("addUserService", $this->global, $data, NULL);
        }
    }


    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function addNewUserService()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $serviceId = $this->input->post('serviceId');
            $userId = $this->input->post('userId');

            $result = $this->service_model->addUserService($userId, $serviceId);
            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }

        }
    }




    /**
     * This function is used to add new user to the system
     */
    function addNewService()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('name','Nom du service','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('desc','Description du service','trim|required|max_length[256]|xss_clean');

            if($this->form_validation->run() == FALSE)
            {
                $this->addService();
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('name')));
                $desc = ucwords(strtolower($this->input->post('desc')));

                $serviceInfo = array('nom'=>$name, 'description'=> $desc);

                $this->load->model('service_model');
                $result = $this->service_model->addNewService($serviceInfo);

                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Création du Service réussie');
                }
                else
                {
                    $this->session->set_flashdata('error', 'La création du Service a échouée');
                }

                redirect('addService');
            }
        }
    }

    /**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function editServiceOld($serviceId = NULL)
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            if($serviceId == null)
            {
                redirect('serviceListing');
            }

            $data['serviceInfo'] = $this->service_model->getServiceInfo($serviceId);
            $data['userRecords'] = $this->service_model->getServiceUserInfo($serviceId);

            $this->global['pageTitle'] = 'Profil Service';

            $this->loadViews("editService", $this->global, $data, NULL);
        }
    }


    /**
     * This function is used to edit the user information
     */
    function editService()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');

            $serviceId = $this->input->post('serviceId');

            $this->form_validation->set_rules('name','Nom du Service','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('desc','Description du Service','trim|required|max_length[256]|xss_clean');

            if($this->form_validation->run() == FALSE)
            {
                $this->editServiceOld($serviceId);
            }
            else
            {
                $name = ucwords($this->input->post('name'));
                $desc = ucwords($this->input->post('desc'));

                $serviceInfo = array('nom'=>$name, 'description'=>$desc);


                $result = $this->service_model->editService($serviceInfo, $serviceId);

                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Mise à jour effectuée');
                }
                else
                {
                    $this->session->set_flashdata('error', 'La mise à jour a échoué');
                }

                redirect('serviceListing');
            }
        }
    }


    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteService()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $serviceId = $this->input->post('serviceId');

            $result = $this->service_model->deleteService($serviceId);

            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }

    function deleteUserService()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $userId = $this->input->post('userId');

            $result = $this->service_model->deleteUserService($userId);

            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }

    /**
     * This function is used to change the password of the user
     */
    function changePassword()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('oldPassword','Ancien mot de passe','required|max_length[20]');
        $this->form_validation->set_rules('newPassword','Nouveau mot de passe','required|max_length[20]');
        $this->form_validation->set_rules('cNewPassword','Confirmez votre mot de passe','required|matches[newPassword]|max_length[20]');

        if($this->form_validation->run() == FALSE)
        {
            $this->loadChangePass();
        }
        else
        {
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');

            $resultPas = $this->user_model->matchOldPassword($this->vendorId, $oldPassword);

            if(empty($resultPas))
            {
                $this->session->set_flashdata('nomatch', 'Votre ancien mot de passe n\'est pas correct');
                redirect('loadChangePass');
            }
            else
            {
                $usersData = array('password'=>getHashedPassword($newPassword), 'updatedBy'=>$this->vendorId,
                                'updatedDtm'=>date('Y-m-d H:i:s'));

                $result = $this->user_model->changePassword($this->vendorId, $usersData);

                if($result > 0) { $this->session->set_flashdata('success', 'Mise à jour du mot de passe effectuée'); }
                else { $this->session->set_flashdata('error', 'La mise à jour du mot de passe a échouée'); }

                redirect('loadChangePass');
            }
        }
    }

    function pageNotFound()
    {
        $this->global['pageTitle'] = ' 404 - Page non trouvée';

        $this->loadViews("404", $this->global, NULL, NULL);
    }
}

?>
