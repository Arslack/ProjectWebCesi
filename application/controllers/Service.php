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
        $this->global['pageTitle'] = 'Liste des Service';

        $this->loadViews("service", $this->global, NULL , NULL);
    }

    /**
     * This function is used to load the user list
     */
    function ServiceListing()
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
     * This function is used to check whether email already exist or not
     */
    function checkEmailExists()
    {
        $userId = $this->input->post("userId");
        $email = $this->input->post("email");

        if(empty($userId)){
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }

        if(empty($result)){ echo("true"); }
        else { echo("false"); }
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
     * This function is used to load the add new form
     */
    function addProfil()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('user_model');
            $data['roles'] = $this->user_model->getUserRoles();

            $this->global['pageTitle'] = 'Nouveau Profil';

            $this->loadViews("addProfil", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to add new user profil to the system
     */
    function addNewProfil()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('fname','First Name','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('lname','Last Name','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|max_length[128]');
            $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]|xss_clean');
            $this->form_validation->set_rules('fixe','Mobile Number','required|min_length[10]|xss_clean');
            $this->form_validation->set_rules('cpostal','Code Postal','required|min_length[5]|xss_clean');
            $this->form_validation->set_rules('adresse','Adresse','trim|required|max_length[256]|xss_clean');
            $this->form_validation->set_rules('city','Ville','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('country','Pay','trim|required|max_length[128]|xss_clean');


            if($this->form_validation->run() == FALSE)
            {
                $this->addProfil();
            }
            else
            {
              /*
                $name = ucwords(strtolower($this->input->post('fname')));
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $mobile = $this->input->post('mobile');

                $userInfo = array('email'=>$email, 'password'=>getHashedPassword($password), 'roleId'=>$roleId, 'name'=> $name,
                                    'mobile'=>$mobile, 'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'));

                $this->load->model('user_model');
                */
                $result = 1;//$this->user_model->addNewUser($userInfo);


                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Création du profil réussie');
                }
                else
                {
                    $this->session->set_flashdata('error', 'La création du profil a échouée');
                }

                redirect('addProfil');
            }
        }
    }


    /**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function editServiceOld($userId = NULL)
    {
        if($this->isAdmin() == TRUE || $userId == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('serviceListing');
            }

            $data['service'] = $this->service_model->getService();
          //  $data['userInfo'] = $this->user_model->getUserInfo($userId);

            $this->global['pageTitle'] = 'Profil Service';

            $this->loadViews("editService", $this->global, $data, NULL);
        }
    }


    /**
     * This function is used to edit the user information
     */
    function editUser()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');

            $userId = $this->input->post('userId');

            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|max_length[128]');
            $this->form_validation->set_rules('password','Password','matches[cpassword]|max_length[20]');
            $this->form_validation->set_rules('cpassword','Confirm Password','matches[password]|max_length[20]');
            $this->form_validation->set_rules('role','Role','trim|required|numeric');
            $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]|xss_clean');

            if($this->form_validation->run() == FALSE)
            {
                $this->editOld($userId);
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('fname')));
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $mobile = $this->input->post('mobile');

                $userInfo = array();

                if(empty($password))
                {
                    $userInfo = array('email'=>$email, 'roleId'=>$roleId, 'name'=>$name,
                                    'mobile'=>$mobile, 'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));
                }
                else
                {
                    $userInfo = array('email'=>$email, 'password'=>getHashedPassword($password), 'roleId'=>$roleId,
                        'name'=>ucwords($name), 'mobile'=>$mobile, 'updatedBy'=>$this->vendorId,
                        'updatedDtm'=>date('Y-m-d H:i:s'));
                }

                $result = $this->user_model->editUser($userInfo, $userId);

                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Mise à jour effectuée');
                }
                else
                {
                    $this->session->set_flashdata('error', 'La mise à jour a échoué');
                }

                redirect('userListing');
            }
        }
    }


    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser()
    {
        if($this->isAdmin() == TRUE)
        {
            echo(json_encode(array('status'=>'access')));
        }
        else
        {
            $userId = $this->input->post('userId');
            $userInfo = array('isDeleted'=>1,'updatedBy'=>$this->vendorId, 'updatedDtm'=>date('Y-m-d H:i:s'));

            $result = $this->user_model->deleteUser($userId, $userInfo);

            if ($result > 0) { echo(json_encode(array('status'=>TRUE))); }
            else { echo(json_encode(array('status'=>FALSE))); }
        }
    }

    /**
     * This function is used to load the change password screen
     */
    function loadChangePass()
    {
        $this->global['pageTitle'] = 'Changer de mot de passe';

        $this->loadViews("changePassword", $this->global, NULL, NULL);
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
