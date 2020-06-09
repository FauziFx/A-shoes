<?php

class Email_model extends CI_Model
{

  private $username = 'email@gmail.com';  // Email gmail
  private $password = 'password'; // Password gmail

	public function send($to, $subject, $message){
      $config = [
          'mailtype'    => 'html',
          'charset'     => 'utf-8',
          'protocol'    => 'smtp',
          'smtp_host'   => 'smtp.gmail.com',
          'smtp_user'   => $this->username,
          'smtp_pass'   => $this->password,
          'smtp_crypto' => 'ssl',
          'smtp_port'   => 465,
          'crlf'        => "\r\n",
          'newline'     => "\r\n"
      ];

      // Load library email dan konfigurasinya
      $this->load->library('email', $config);

      // Email dan nama pengirim
      $this->email->from('no-reply@a-shoes.com','Toko A-Shoes');

      // Email penerima
      $this->email->to($to); // Ganti dengan email tujuan

      // Subject email
      $this->email->subject($subject);

      // Isi email
      $this->email->message($message);

      // Tampilkan pesan sukses atau error
      if ($this->email->send()) {
          return true;
      } else {
          return false;
      }
  }

}