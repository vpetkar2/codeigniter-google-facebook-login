<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->tableName = 'users';
    }

	function getRow($id, $field='id')
    {
        $this->db->select('*');
        $query = $this->db->get_where($this->tableName, array(
            $field => $id
        ));
        $data  = $query->result();
        if (!empty($data)) {
            return $data[0];
        } else {
            return new stdClass();
        }
    }

    function insert($data){
        $this->db->insert($this->tableName, $data);
        return $this->db->insert_id();
    }

    function updateData($data, $id, $field='id')
    {
        $this->db->where($field, $id);
        $this->db->update($this->tableName, $data);
    }

    function uploadData(&$data, $file_name, $file_path, $postfix='', $allowedTypes)
    {
        $config = NULL;
        $config['upload_path'] = $this->config->item($file_path);  
        $config['allowed_types'] = $allowedTypes;
        if (isset($_FILES[$file_name]['name']) && !empty($_FILES[$file_name]['name']))
        {
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            $exts = explode(".",$_FILES[$file_name]['name']);
            $_FILES[$file_name]['name'] = $exts[0].$postfix.".".end($exts);
            if ( ! $this->upload->do_upload($file_name))
            {
                $data[$file_name.'_err'] = array('error' => $this->upload->display_errors());
            }
            else
            {
                $uploadImg = $this->upload->data();
                if($uploadImg['file_name'] != '')
                {
                    if (isset($_POST['old_'.$file_name]) && !empty($_POST['old_'.$file_name]))
                    {
                        @unlink($this->config->item($file_path).$_POST['old_'.$file_name]);
                    }
                    $data[$file_name] = $uploadImg['file_name'];
                }
            }
        }
        elseif (isset($_POST['old_'.$file_name]) && !empty($_POST['old_'.$file_name]))
        {
            $data[$file_name] = $_POST['old_'.$file_name];
        }
    }

}
