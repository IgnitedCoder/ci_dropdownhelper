<?php

class Dropdown extends CI_Controller
{

    public function __construct() {
        parent::__construct();
        $this->load->helper('dropdown');
    }


    /**
     * This code should be in your Model.
     * So make sure you move it, this is just for sample purposes.
     * @return array
     */
    public function getListOfItemsFromTable() {

        $sql = <<<SQL
		SELECT
			id, name
		FROM table
		ORDER BY name
SQL;

        $results = $this->db->query($sql)->result();

        $data = array();
        foreach ($results as $row) {
            $data[$row->id] = $row->name;
        }

        return ($data);
    }

    public function index() {

        $dropDownData = $this->getListOfItemsFromTable();

        $this->viewData['my_ddl'] = build_dropdown('clinic_dropdown', //the id of your dropdown list
                                    'form-control', //the style class for your dropdown list
                                    'clinic_dropdown', //the name of your dropdown list
                                    $dropDownData, // they key/value pair for your dropdown list.
                                    $this->uri->segment(2), //e.g. if you are using the URI to select a value from the dropdown www.mydomain.com/item/value
                                    'javaScriptFunctionName(this);');  //A javascript function to call when the selection changes.
        $this->load->view('myview',$this->viewData);
        //inside your view simply echo $my_ddl to produce the dropdown list.
        //thats it.
    }


}