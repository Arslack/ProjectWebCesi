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
    function newDemande()
    {

            $this->load->model('demande_model');
            $this->load->model('user_model');

            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;

            $this->load->library('pagination');

           // $userId = $this->session->userdata('userId');
		         $userId=$this->global ['vendorId'];
             $userInfo = $this->user_model->getUserInfo($userId);
             if(empty($userInfo->idService)) {
               $serviceId = 0;
             } else {
               $serviceId = $userInfo->idService;
             }

            $count = $this->demande_model->nbDemandeparEtatService(1,$serviceId, $searchText);

			$returns = $this->paginationCompress ( "demande/", $count, 5 );

            $data['demandeRecords'] = $this->demande_model->listeDemandeparEtatService(1, $serviceId, $searchText, $returns["page"], $returns["segment"]);

            $this->global['pageTitle'] = 'Liste des demandes';

            $this->loadViews("demandeService", $this->global, $data, NULL);

    }
    function actualDemande()
    {

            $this->load->model('demande_model');
            $this->load->model('user_model');

            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;

            $this->load->library('pagination');

           // $userId = $this->session->userdata('userId');
             $userId=$this->global ['vendorId'];
             $userInfo = $this->user_model->getUserInfo($userId);
             if(empty($userInfo->idService)) {
               $serviceId = -1;
             } else {
               $serviceId = $userInfo->idService;
             }


            $count = $this->demande_model->nbDemandeparEtatService(2,$serviceId, $searchText);

      $returns = $this->paginationCompress ( "demande/", $count, 5 );

            $data['demandeRecords'] = $this->demande_model->listeDemandeparEtatService(2, $serviceId, $searchText, $returns["page"], $returns["segment"]);

            $this->global['pageTitle'] = 'Liste des demandes';

            $this->loadViews("demandeService", $this->global, $data, NULL);

    }
    function validDemande()
    {

            $this->load->model('demande_model');
            $this->load->model('user_model');

            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;

            $this->load->library('pagination');

           // $userId = $this->session->userdata('userId');
             $userId=$this->global ['vendorId'];
             $userInfo = $this->user_model->getUserInfo($userId);
             if(empty($userInfo->idService)) {
               $serviceId = -1;
             } else {
               $serviceId = $userInfo->idService;
             }

            $count = $this->demande_model->nbDemandeparEtatService(3,$serviceId, $searchText);

      $returns = $this->paginationCompress ( "demande/", $count, 5 );

            $data['demandeRecords'] = $this->demande_model->listeDemandeparEtatService(3, $serviceId, $searchText, $returns["page"], $returns["segment"]);

            $this->global['pageTitle'] = 'Liste des demandes';

            $this->loadViews("demandeService", $this->global, $data, NULL);

    }
    function refusDemande()
    {

            $this->load->model('demande_model');
            $this->load->model('user_model');

            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;

            $this->load->library('pagination');

            if(empty($userInfo->idService)) {
              $serviceId = -1;
            } else {
              $serviceId = $userInfo->idService;
            }

           // $userId = $this->session->userdata('userId');
             $userId=$this->global ['vendorId'];
             $userInfo = $this->user_model->getUserInfo($userId);

            $count = $this->demande_model->nbDemandeparEtatService(4,$serviceId, $searchText);

      $returns = $this->paginationCompress ( "demande/", $count, 5 );

            $data['demandeRecords'] = $this->demande_model->listeDemandeparEtatService(4,$serviceId, $searchText, $returns["page"], $returns["segment"]);

            $this->global['pageTitle'] = 'Liste des demandes';

            $this->loadViews("demandeService", $this->global, $data, NULL);

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

            $this->loadViews("demandeview", $this->global, $data, NULL);

    }



    /**
     * This function is used to load the user list
     */
    function demandeListing()
    {
      if($this->isAdmin() == TRUE)
      {
          $this->loadThis();
      }
      else
      {
            $this->load->model('demande_model');

            $searchText = $this->input->post('searchText');
            $data['searchText'] = $searchText;

            $this->load->library('pagination');

            $count = $this->demande_model->nbDemandeTous($searchText);

      $returns = $this->paginationCompress ( "demande/", $count, 5 );

            $data['demandeRecords'] = $this->demande_model->listeDemandeparTous( $searchText, $returns["page"], $returns["segment"]);

            $this->global['pageTitle'] = 'Liste des demandes';

            $this->loadViews("demande", $this->global, $data, NULL);
      }

    }

    /**
     * This function is used to load the add new form
     */
    function addDemande()
    {

            $this->load->model('service_model');
            $data['services'] = $this->service_model->getService();

            $this->global['pageTitle'] = 'Nouvel Demande';

            $this->loadViews("addDemande", $this->global, $data, NULL);

    }



    /**
     * This function is used to add new user to the system
     */
    function addNewDemande()
    {

            $this->load->library('form_validation');

            $this->form_validation->set_rules('title','Sujet de la demande','trim|required|max_length[128]|xss_clean');
			      $this->form_validation->set_rules('desc','Description de la demande','max_length[256]|xss_clean');
            $this->form_validation->set_rules('service','Service','trim|required|numeric');


            $config['upload_path'] = './files/';
            $config['allowed_types'] = 'pdf|zip';


            $this->load->library('upload', $config);

            if($this->form_validation->run() == FALSE || !$this->upload->do_upload())
            {
              if(!$this->upload->do_upload()) {
                  $this->session->set_flashdata('error', $this->upload->display_errors());
              }
                $this->addDemande();
            }
            else
            {
                $nom = $this->input->post('title');
                $description = $this->input->post('description');
                $service = $this->input->post('service');

                $data = $this->upload->data();

                $demandeInfo = array('serviceId'=>$service,'userId'=>$this->global['vendorId'],'titre'=>$nom, 'description'=>$description, 'service'=>$service, 'filename'=> $data['file_name'], 'filepath'=> $data['file_path']);

                $this->load->model('demande_model');
                $result = $this->demande_model->addNewDemande($demandeInfo);

                if($result > 0)
                {
                    $this->session->set_flashdata('success', 'La création de la demande a réussie');
                }
                else
                {
                    $this->session->set_flashdata('error', 'La création de la demande a échouée');
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
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function editDemandeOld($userId = NULL)
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
