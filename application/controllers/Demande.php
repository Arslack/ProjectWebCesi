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

             $userId = $this->session->userdata('userId');
             $data['userInfo'] = $this->user_model->getUserInfo($userId);
             $serviceId = $data['userInfo'][0]->idService;

             if(empty($serviceId)) {
               $serviceId = -1;
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

             $userId = $this->session->userdata('userId');
             $data['userInfo'] = $this->user_model->getUserInfo($userId);
             $serviceId = $data['userInfo'][0]->idService;

             if(empty($serviceId)) {
               $serviceId = -1;
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

             $userId = $this->session->userdata('userId');
             $data['userInfo'] = $this->user_model->getUserInfo($userId);
             $serviceId = $data['userInfo'][0]->idService;

             if(empty($serviceId)) {
               $serviceId = -1;
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

            $userId = $this->session->userdata('userId');
            $data['userInfo'] = $this->user_model->getUserInfo($userId);
            $serviceId = $data['userInfo'][0]->idService;

            if(empty($serviceId)) {
              $serviceId = -1;
            }

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

            $userId = $this->session->userdata('userId');
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

            if($this->form_validation->run() == FALSE || !$this->upload->do_upload('file'))
            {
              if(!$this->upload->do_upload()) {
                  $this->session->set_flashdata('error', $this->upload->display_errors());
              }
                $this->addDemande();
            }
            else
            {
                $nom = $this->input->post('title');
                $description = $this->input->post('desc');
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
    function editDemandeOld($demandeId = NULL)
    {
        if($this->isAdmin() == TRUE && $this->session->userdata('role') != 3)
        {
            $this->loadThis();
        }
        else
        {
            if($demandeId == null)
            {
                redirect('dashboard');
            }

            $data['demande'] = $this->demande_model->getDemandeInfo($demandeId);
            $data['dossier'] = $this->demande_model->getDossierInfo($demandeId);
            $data['etat'] = $this->demande_model->getEtat();
            $this->load->model('service_model');
            $data['service'] = $this->service_model->getService();
            $this->load->model('user_model');
            $data['user'] = $this->user_model->getUserInfo($data['demande'][0]->utilisateurid);

            $this->global['pageTitle'] = 'Edit demande';

            $this->loadViews("editDemande", $this->global, $data, NULL);
        }
    }


    /**
     * This function is used to edit the user information
     */
    function editDemande()
    {
        if($this->isAdmin() == TRUE && $this->session->userdata('role') != 3)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->library('form_validation');

            $this->form_validation->set_rules('demandeId','numero de la demande','trim|required|numeric');
            $this->form_validation->set_rules('demandeId','numero de la demande','trim|required|numeric');
            if($this->form_validation->run() == FALSE)
            {
                $this->editDemandeOld($this->input->post('demandeId'));
            }
            else
            {
                $idDemande = $this->input->post('demandeId');
                $idEtat = $this->input->post('etat');

                $result = $this->demande_model->editEtatDemande($idDemande, $idEtat);

                if($result == true)
                {
                    $this->session->set_flashdata('success', 'Mise à jour effectuée');
                }
                else
                {
                    $this->session->set_flashdata('error', 'La mise à jour a échoué');
                }
                if ($this->session->userdata('role') == 3) {
                  redirect('dashboard');
                }
                redirect('demande');
            }
        }
    }


    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteDemande()
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
