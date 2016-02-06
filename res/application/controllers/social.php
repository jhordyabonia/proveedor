<?php
if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Social extends CI_Controller
{

/* Retorna un objeto con los tres contadores basicos*/
    public function get_social_count()
    {
        $link        = $this->input->get("url", false);
        $r           = (object) array();
        $r->facebook = $this->get_social_count_facebook($link);
        $r->linkedin = $this->get_social_count_linkedin($link);
        // $r->twitter = $this->get_social_count_twitter($link);
        $r->gplus = $this->get_social_count_gplus($link);
        header('Content-Type: application/json');
        echo json_encode($r);
    }
    /* Retorna el numero de veces que fue compartido en facebook*/
    public function get_social_count_facebook($link)
    {
        $link  = urlencode($link);
        $data  = file_get_contents("http://graph.facebook.com/?id=$link");
        $json  = json_decode($data, true);
        $count = 0;
        if (isset($json["shares"])) {
            $count = $json["shares"];
        }
        return $count;
    }
    /* Retorna el numero de veces que fue compartido en twitter*/
    public function get_social_count_twitter($link)
    {
        $link  = urlencode($link);
        $data  = file_get_contents("http://urls.api.twitter.com/1/urls/count.json?url={$link}");
        $json  = json_decode($data, true);
        $count = $json["count"];
        return $count ? $count : 0;
    }
    /* Retorna el numero de veces que fue compartido en gplus*/
    public function get_social_count_gplus($link = "http:www.proveedor.com.co")
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://clients6.google.com/rpc?key=AIzaSyCKSbrvQasunBoV16zDH9R33D88CeLr9gQ");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $link . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        $data = curl_exec($ch);
        curl_close($ch);
        $json  = json_decode($data, true);
        $count = $json[0]['result']['metadata']['globalCounts']['count'];
        return $count ? $count : 0;
    }

    public function get_social_count_linkedin($link)
    {

        $link  = urlencode($link);
        $data  = file_get_contents("https://www.linkedin.com/countserv/count/share?url=$link&format=json");
        $json  = json_decode($data, true);
        $count = 0;
        if (isset($json["count"])) {
            $count = $json["count"];
        }
        return $count;
    }
}