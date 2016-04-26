<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Producto_tienda_model extends CI_Model {

    public function construct() 
    {
        parent::__construct();
    }
    
  private function tienda_db()
  {
        $tienda['hostname'] = 'localhost';
        $tienda['username'] = 'root';
        $tienda['password'] = 'root';
        $tienda['database'] = 'iguana_tienda1';
        $tienda['dbdriver'] = 'mysql';
        $tienda['dbprefix'] = ''; 
        $tienda['pconnect'] = TRUE; 
        $tienda['db_debug'] = FALSE; 
        $tienda['cache_on'] = FALSE; 
        $tienda['cachedir'] = ''; 
        $tienda['char_set'] = 'utf8'; 
        $tienda['dbcollat'] = 'utf8_general_ci'; 
        $tienda['swap_pre'] = ''; 
        $tienda['autoinit'] = TRUE; 
        $tienda['stricton'] = FALSE;
        /*
        $tienda['hostname'] = 'localhost';
        $tienda['username'] = 'iguana_iguana';
        $tienda['password'] = 'scriptmedia2014';
        $tienda['database'] = 'iguana_tienda1';
        $tienda['dbdriver'] = 'mysql';
        $tienda['dbprefix'] = ''; 
        $tienda['pconnect'] = TRUE; 
        $tienda['db_debug'] = FALSE; 
        $tienda['cache_on'] = FALSE; 
        $tienda['cachedir'] = ''; 
        $tienda['char_set'] = 'utf8'; 
        $tienda['dbcollat'] = 'utf8_general_ci'; 
        $tienda['swap_pre'] = ''; 
        $tienda['autoinit'] = TRUE; 
        $tienda['stricton'] = FALSE;
        */
        return $this->load->database($tienda,TRUE);
    }    
    public function get_all($where = NULL,$select="*", $table="wp_posts",$key="ID") 
    {
            $tienda_db = $this->tienda_db();
            $tienda_db->select($select);
            $tienda_db->from($table);
            if ($where !== NULL) {
                if (is_array($where)) {
                    foreach ($where as $field=>$value) {
                        $tienda_db->where($field, $value);
                    }
                } else {
                    $tienda_db->where($key, $where);
                }
            }
            $result = $tienda_db->get()->result();
            if ($result)
            {   return($result); }
            else 
            {   return(false);   }
     }
        
    public function get($where = NULL,$table="wp_posts",$key="ID") 
    {
        $tienda_db = $this->tienda_db();
        $tienda_db->select('*');
        $tienda_db->from($table);
        if ($where !== NULL) {
            if (is_array($where)) {
                foreach ($where as $field=>$value) {
                    $tienda_db->where($field, $value);
                }
            } else {
                $tienda_db->where($key, $where);
            }
        }
        $result = $tienda_db->get()->result();
        if ($result) {
            if ($where !== NULL) {
                return(array_shift($result));
            } else {
                return($result);
            }
        } else {
            return(false);
        }
    }

    public function load($id,$table="wp_postmeta",$key="post_id")
    {        
        $tienda_db=$this->tienda_db();
        $tienda_db->select('*');
        $tienda_db->from($table);
        $tienda_db->where($key, $id);
        
        $result = $tienda_db->get()->result();
        
        if ($result)
        {   return($result); }
        else 
        {   return(false);   }        
    }
    
    public function connect($db='default')
    {
        $this->db->close();
        $this->db=$this->load->database($db,TRUE);
        $this->db->reconnect();
    }
    
}
        