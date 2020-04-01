<?php
// use Restserver\libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require(APPPATH . 'libraries/REST_Controller.php');
require(APPPATH . 'libraries/Format.php');

class Operator extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Operator_model', 'operator');
        // $this->methods['index_get']['limit'] = 100;
    }

    public function index_get()
    {

        $id = $this->get('id');
        if ($id === null) {
            $operator = $this->operator->getOperator();
        } else {
            $operator = $this->operator->getOperator($id);
        }


        if ($operator) {

            $this->response([
                'status' => true,
                'data' => $operator
            ], REST_Controller::HTTP_OK);
        } else {

            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }


    public function index_delete()
    {
        $id = $this->delete('id');

        if ($id === null) {

            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->mahasiswa->deleteOperator($id) > 0) {

                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'delete'
                ], REST_Controller::HTTP_NO_CONTENT);
            } else {

                $this->response([
                    'status' => false,
                    'message' => 'id not found'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'codename' => $this->post('nrp'),
            'nama' => $this->post('nama'),
            'primarywepon' => $this->post('primarywepon'),
            'secondry' => $this->post('secondry'),
            'skill' => $this->post('skill'),
            'country' => $this->post('country')

        ];

        if ($this->operator->createOperator($data) > 0) {

            $this->response([
                'status' => true,
                'message' => 'operator has been creaated'
            ], REST_Controller::HTTP_CREATED);
        } else {

            $this->response([
                'status' => false,
                'message' => 'failed create data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');

        $data = [
            'codename' => $this->post('nrp'),
            'nama' => $this->post('nama'),
            'primarywepon' => $this->post('primarywepon'),
            'secondry' => $this->post('secondry'),
            'skill' => $this->post('skill'),
            'country' => $this->post('country')

        ];

        if ($this->mahasiswa->updateMahasiswa($data, $id) > 0) {

            $this->response([
                'status' => true,
                'message' => 'operator has been updated'
            ], REST_Controller::HTTP_NO_CONTENT);
        } else {

            $this->response([
                'status' => false,
                'message' => 'failed update data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}
