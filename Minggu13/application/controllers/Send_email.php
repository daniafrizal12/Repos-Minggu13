<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Send_email extends CI_Controller
{

    /**
     * Kirim email dengan SMTP Gmail.
     *
     */
    public function index()
    {
        // Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'daniafrizal43@gmail.com',  // Email gmail
            'smtp_pass'   => 'kopites123',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('no-reply@ReinzKrieger.net', 'ReinzKrieger.net');

        // Email penerima
        $this->email->to('daniafrizal43@gmail.com'); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        //$this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

        // Subject email
        $this->email->subject('Kirim Email dengan SMTP Gmail CodeIgniter | Dani Afrizal');

        // Isi email
        $this->email->message("Ini adalah contoh email yang dikirim menggunakan SMTP Gmail pada CodeIgniter.<br><br> Klik <strong><a href='https://github.com/daniafizal12/Repos-Minggu13' target='_blank' rel='noopener'>disini</a></strong> untuk melihat tutorialnya.");

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses! email telah berhasil dikirim.';
        } else {
            echo 'Error! email tidak dapat dikirim.';
        }
    }
}
