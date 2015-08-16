<?php


// First, delete old captchas
$expiration = time()-7200; // Two hour limit
$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);	

// Then see if a captcha exists:
$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
$binds = array(@$_POST['captcha'], $this->input->ip_address(), $expiration);
$query = $this->db->query($sql, $binds);
$row = $query->row();

if ($row->count == 0)
{
    echo "You must submit the word that appears in the image";
}


?>