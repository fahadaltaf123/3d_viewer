<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_model extends CI_Model {

    function __construct() {
        parent::__construct();
    } 

    public function get_entry_by_id($id){
        $this->load->database();
        return $i = $this->db->select('*')->from('video_history')->where('id',$id)->get()->row();
    }
}

?>
