<?php

class Identitas extends CI_Controller
{
    public function index()
    {
        $data['identitas'] = $this->identitas_model->tampil_data('identitas')->result();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/identitas', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update($id)
    {
        $where = array('id_identitas' => $id);

        $data['identitas'] = $this->identitas_model->edit_data($where, 'identitas')->result();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/identitas_update', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update_aksi()
    {
        $id               = $this->input->post('id_identitas');
        $judul_website    = $this->input->post('judul_website');
        $alamat               = $this->input->post('alamat');
        $email               = $this->input->post('email');
        $telp               = $this->input->post('telp');

        $data = array(
            'judul_website' => $judul_website,
            'alamat' => $alamat,
            'email' => $email,
            'telp' => $telp,
        );

        $where = array(
            'id_identitas' => $id
        );

        $this->identitas_model->update_data($where, $data, 'identitas');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
           Data Identitas berhasil diupdate!
       </div>');
        redirect('administrator/identitas');
    }
}
