<?php

class Tentang_kampus extends CI_Controller
{
    public function index()
    {
        $data['tentang'] = $this->tentang_model->tampil_data('tentang_kampus')->result();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/tentang_kampus', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update($id)
    {
        $where = array('id' => $id);

        $data['tentang'] = $this->tentang_model->edit_data($where, 'tentang_kampus')->result();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/tentang_update', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update_aksi()
    {
        $id               = $this->input->post('id');
        $sejarah          = $this->input->post('sejarah');
        $visi             = $this->input->post('visi');
        $misi             = $this->input->post('misi');

        $data = array(
            'sejarah' => $sejarah,
            'visi'    => $visi,
            'misi'    => $misi,
        );

        $where = array(
            'id' => $id
        );

        $this->tentang_model->update_data($where, $data, 'tentang_kampus');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
           Data Tentang Kampus berhasil diupdate!
       </div>');
        redirect('administrator/tentang_kampus');
    }
}
