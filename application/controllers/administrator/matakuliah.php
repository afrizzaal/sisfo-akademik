<?php

class Matakuliah extends CI_Controller
{
    public function index()
    {
        $data['matakuliah'] = $this->matakuliah_model->tampil_data('matakuliah')->result();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/matakuliah', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_matakuliah()
    {
        $data['prodi'] = $this->matakuliah_model->tampil_data('prodi')->result();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/matakuliah_form', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function tambah_matakuliah_aksi()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambah_matakuliah();
        } else {
            $kode_matakuliah = $this->input->post('kode_matakuliah');
            $nama_matakuliah = $this->input->post('nama_matakuliah');
            $sks             = $this->input->post('sks');
            $semester        = $this->input->post('semester');
            $nama_prodi      = $this->input->post('nama_prodi');


            $data = array(
                'kode_matakuliah' => $kode_matakuliah,
                'nama_matakuliah' => $nama_matakuliah,
                'sks'             => $sks,
                'semester'        => $semester,
                'nama_prodi'      => $nama_prodi
            );

            $this->matakuliah_model->insert_data($data, 'matakuliah');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Data Mata Kuliah berhasil ditambahkan!
            </div>');
            redirect('administrator/matakuliah');
        }
    }
    public function _rules()
    {
        $this->form_validation->set_rules('kode_matakuliah', 'kode_matakuliah', 'required', [
            'required' => 'Kode Mata Kuliah wajib diisi!'
        ]);
        $this->form_validation->set_rules('nama_matakuliah', 'nama_matakuliah', 'required', [
            'required' => 'Nama Mata kuliah wajib diisi!'
        ]);
        $this->form_validation->set_rules('sks', 'sks', 'required', [
            'required' => 'Kode SKS wajib diisi!'
        ]);
        $this->form_validation->set_rules('semester', 'semester', 'required', [
            'required' => 'Kode Semester wajib diisi!'
        ]);
        $this->form_validation->set_rules('nama_prodi', 'nama_prodi', 'required', [
            'required' => 'Kode Nama Prodi wajib diisi!'
        ]);
    }

    public function detail($kode)
    {
        $data['detail'] = $this->matakuliah_model->ambil_kode_matakuliah($kode);

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/matakuliah_detail', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update($id)
    {
        $where = array('kode_matakuliah' => $id);
        $data['matakuliah'] = $this->db->query("select * from matakuliah mk, prodi prd where mk.nama_prodi = prd.nama_prodi and mk.kode_matakuliah='$id'")->result();
        $data['prodi'] = $this->matakuliah_model->tampil_data('prodi')->result();

        $this->load->view('templates_administrator/header');
        $this->load->view('templates_administrator/sidebar');
        $this->load->view('administrator/matakuliah_update', $data);
        $this->load->view('templates_administrator/footer');
    }

    public function update_aksi()
    {
        $id = $this->input->post('kode_matakuliah');
        $kode_matakuliah = $this->input->post('kode_matakuliah');
        $nama_matakuliah = $this->input->post('nama_matakuliah');
        $sks             = $this->input->post('sks');
        $semester        = $this->input->post('semester');
        $nama_prodi      = $this->input->post('nama_prodi');

        $data = array(
            'kode_matakuliah' => $kode_matakuliah,
            'nama_matakuliah' => $nama_matakuliah,
            'sks'             => $sks,
            'semester'        => $semester,
            'nama_prodi'      => $nama_prodi,
        );

        $where = array(
            'kode_matakuliah' => $id
        );

        $this->matakuliah_model->update_data($where, $data, 'matakuliah');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Data Mata Kuliah berhasil di update!
      </div>');
        redirect('administrator/matakuliah');
    }

    public function delete($id)
    {
        $where = array('kode_matakuliah' => $id);
        $this->matakuliah_model->hapus_data($where, 'matakuliah');

        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        Data Mata Kuliah berhasil di hapus!
      </div>');
        redirect('administrator/matakuliah');
    }
}