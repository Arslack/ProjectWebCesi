<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Demande extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('demande_model');
        $this->isLoggedIn();
    }

    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Demandes';

        $this->loadViews("demande", $this->global, NULL , NULL);
    }

    /**
     * This function is used to load the user list
     */
    function demandeListingparUser()
    {

            $this->load->model('demande_model');

            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;

            $this->load->library('pagination');

           // $userId = $this->session->userdata('userId');
		    $userId=$this->global ['vendorId'];
            $count = $this->demande_model->nbDemandeparUser($userId, $searchText);

			$returns = $this->paginationCompress ( "demande/", $count, 5 );

            $data['demandeRecords'] = $this->demande_model->listeDemandeparUser($userId, $searchText, $returns["page"], $returns["segment"]);

            $this->global['pageTitle'] = 'Liste des demandes';

            $this->loadViews("demande", $this->global, $data, NULL);

    }

    /**
     * This function is used to load the add new form
     */
    function addDemande()
    {

            $this->load->model('demande_model');

            $this->global['pageTitle'] = 'Nouvel Demande';

            $this->loadViews("addDemande", $this->global, NULL, NULL);

    }



    /**
     * This function is used to add new user to the system
     */
    function addNewDemande()
    {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]|xss_clean');
			      $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]|xss_clean');
            $this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean|max_length[128]');
            $this->form_validation->set_rules('password','Password','required|max_length[20]');
            $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
            $this->form_validation->set_rules('role','Role','trim|required|numeric');
            $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]|xss_clean');

            if($this->form_validation->run() == FALSE)
            {
                $this->addDemande();
            }
            else
            {
                $name = ucwords(strtolower($this->input->post('fname')));
                $email = $this->input->post('email');
                $password = $this->input->post('password');
                $roleId = $this->input->post('role');
                $mobile = $this->input->post('mobile');

                $userInfo = array('email'=>$email, 'password'=>getHashedPassword($password), 'roleId'=>$roleId, 'name'=> $name,
                                    'mobile'=>$mobile, 'createdBy'=>$this->vendorId, 'createdDtm'=>date('Y-m-d H:i:s'));

                $this->load->model('user_model');
                $result = $this->user_model->addNewUser($userInfo);

                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'Création de l\'utilisateur réussie');
                }
                else
                {
                    $this->session->set_flashdata('error', 'La création de l\'utilisateur a échouée');
                }

                redirect('addDemande');
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
    function editOld($userId = NULL)
    {
        if($this->isAdmin() == TRUE || $userId == 1)
        {
            $this->loadThis();
        }
        else
        {
            if($userId == null)
            {
                redirect('userListing');
            }

            $data['roles'] = $this->user_model->getUserRoles();
            $data['userInfo'] = $this->user_model->getUserInfo($userId);

            $this->global['pageTitle'] = 'Profil utilisateur';

            $this->loadViews("editOld", $this->global, $data, NULL);
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


    function pageNotFound()
    {
        $this->global['pageTitle'] = ' 404 - Page non trouvée';

        $this->loadViews("404", $this->global, NULL, NULL);
    }
}

?>
