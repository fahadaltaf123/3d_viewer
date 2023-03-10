<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

    public function view($id)
    {
        $this->load->database();
        $page = 'home';
        $title = '3D Viewer';
        $data['title'] = ucfirst($title); // Capitalize the first letter

        $this->load->model('home_model');
        $data['query'] = $this->home_model->get_entry_by_id($id);
		
		$patent_id = '';
		if( count(explode("patterned_",$data['query']->unique_tiles)) > 1 ){
			$patent = explode (',', $data['query']->unique_tiles ) [0];
			$patent_id =explode ('.',explode("patterned_",$patent)[1])[0];

			$data['patterned'] = $this->home_model->get_entry_by_pattend_id($patent_id);
			
		}

        $this->load->view('pages/' . $page, $data);
    }

	public function view_single($id)
    {
        $this->load->database();
        $page = 'home_single';
        $title = '3D Viewer';
        $data['title'] = ucfirst($title); // Capitalize the first letter

        $this->load->model('home_model');
        $data['query'] = $this->home_model->get_entry_by_id($id);

        $this->load->view('pages/' . $page, $data);
    }
}
