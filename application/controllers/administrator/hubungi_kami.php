<?php

class Hubungi_kami extends CI_Controller
{
    public function index()
    {
        $data['hubungi'] = $this->hubungi_model->tampil_data('hubungi')->result();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/hubungi_kami', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function kirim_email($id)
    {
        $where = array('id_hubungi' => $id);
        $data['hubungi'] = $this->hubungi_model->kirim_data($where, 'hubungi')->result();
        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/form_kirim_email', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function kirim_email_aksi()
    {
        $to_email = $this->input->post('email');
        $subject = $this->input->post('subject');
        $message = $this->input->post('message');
        $config = [
            'mailtype'      => 'html',
            'charset'       => 'utf-8',
            'protocol'      => 'smtp',
            'smtp_host'     => 'ssl://smtp.gmail.com',
            'smtp_user'     => 'afrizzaalm@gmail.com',
            'smtp_pass'     => 'afrijal99',
            'smtp_port'     => 465,
            'crlf'          => "\r\n",
            'newline'       => "\r\n"
        ];

        $this->load->library('email', $config);

        $this->email->from("Institut Teknologi Bandung");

        $this->email->to($to_email);

        $this->email->subject($subject);

        $this->email->message($message);

        if ($this->email->send()) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Pesan berhasil dikirim!
            </div>');
            redirect('administrator/hubungi_kami');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Pesan tidak terkirim!
            </div>');
            redirect('administrator/hubungi_kami');
        }
    }

    public function delete($id)
    {
        $where = array('id_hubungi' => $id);
        $this->hubungi_model->hapus_data($where, 'hubungi');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        Pesan User berhasil dihapus!
      </div>');
        redirect('administrator/hubungi_kami');
    }
}
