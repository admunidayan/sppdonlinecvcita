<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Honorer extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('admin/Admin_m');
        $this->load->model('admin/honorer_m');
    }
    public function index($offset=0){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->get();
                $data['title'] = $this->Admin_m->info_pt(1)->nama_info_pt;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['page'] = 'admin/honorer-v';
                $jumlah = $this->honorer_m->jumlah_data(@$post['string'],@$post['skpd']);
                $config['base_url'] = base_url().'/index.php/admin/honorer/index/';
                $config['total_rows'] = $jumlah;
                $config['per_page'] = '10';
                $config['first_page'] = 'Awal';
                $config['last_page'] = 'Akhir';
                $config['next_page'] = '&laquo;';
                $config['prev_page'] = '&raquo;';
                // bootstap style
                $config['first_link']       = 'Pertama';
                $config['last_link']        = 'Terakhir';
                $config['next_link']        = 'Selanjutnya';
                $config['prev_link']        = 'Sebelumnya';
                $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
                $config['full_tag_close']   = '</ul></nav></div>';
                $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
                $config['num_tag_close']    = '</span></li>';
                $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
                $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
                $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
                $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['prev_tagl_close']  = '</span>Next</li>';
                $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
                $config['first_tagl_close'] = '</span></li>';
                $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
                $config['last_tagl_close']  = '</span></li>';
                //inisialisasi config
                $this->pagination->initialize($config);
                $data['skpd'] = $this->honorer_m->select_data('master_lokasi_kerja');
                $data['status'] = $this->honorer_m->select_data('master_status_pegawai');
                $data['agama'] = $this->honorer_m->select_data('master_agama');
                $data['golongan'] = $this->honorer_m->select_data('master_golongan');
                $data['eselon'] = $this->honorer_m->select_data('master_eselon');
                $data['sjabatan'] = $this->honorer_m->select_data('master_status_jabatan');

                // pengaturan searching
                $data['jmldata'] = $jumlah;
                $data['nmr'] = $offset;
                $data['hasil'] = $this->honorer_m->searcing_data($config['per_page'],$offset,@$post['string'],@$post['skpd']);
                $data['pagging'] = $this->pagination->create_links();
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    
    public function create(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'nama' => $post['nama'],
                    'alamat'=>$post['alamat'],
                    'nomor_sk'=>$post['nomor_sk'],
                    'id_lokasi_kerja'=>$post['id_lokasi_kerja'],
                    'tmt'=>$post['tmt_thn'].'-'.$post['tmt_bln'].'-'.$post['tmt_hr'],
                    'no_hp'=>$post['no_hp'],
                );
                $this->honorer_m->insert_data('honorer',$datainput);
                $pesan = 'Data Honorer baru berhasil di tambahkan';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/honorer'));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    public function edit_honorer($id){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $result = $this->honorer_m->detail_data('honorer','id_honorer',$id);
                // echo "<pre>";print_r($result);echo "<pre/>";exit();
                $data['title'] = $result->nama;
                $data['infopt'] = $this->Admin_m->info_pt(1);
                $data['brand'] = 'asset/img/lembaga/'.$this->Admin_m->info_pt(1)->logo_pt;
                $data['users'] = $this->ion_auth->user()->row();
                $data['aside'] = 'nav/nav';
                $data['detail'] = $result;
                $data['skpd'] = $this->honorer_m->select_data('master_lokasi_kerja');
                $data['page'] = 'admin/edit-honorer-v';
                // pagging setting
                $this->load->view('admin/dashboard-v',$data);
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
public function update_honorer(){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $post = $this->input->post();
                $datainput = array(
                    'nama' => $post['nama'],
                    'alamat'=>$post['alamat'],
                    'nomor_sk'=>$post['nomor_sk'],
                    'id_lokasi_kerja'=>$post['id_lokasi_kerja'],
                    'tmt'=> $post['tmt_thn'].'-'.$post['tmt_bln'].'-'.$post['tmt_hr'],
                    'no_hp'=>$post['no_hp'],
                );
                // echo "<pre>";print_r($datainput);echo "<pre/>";exit();

                $this->honorer_m->update_data('honorer','id_honorer',$post['id_honorer'],$datainput);
                $pesan = 'Data Honorer golongan baru berhasil di diubah';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/honorer/'));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/login'));
        }
    }
    
    public function delete_honorer($id_honorer){
        if ($this->ion_auth->logged_in()) {
            $level = array('admin','members');
            if (!$this->ion_auth->in_group($level)) {
                $pesan = 'Anda tidak memiliki Hak untuk Mengakses halaman ini';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/dashboard'));
            }else{
                $this->honorer_m->delete_data('honorer','id_honorer',$id_honorer);
                $pesan = 'Data Honorer berhasil di diubah dihapus';
                $this->session->set_flashdata('message', $pesan );
                redirect(base_url('index.php/admin/honorer/'));
            }
        }else{
            $pesan = 'Login terlebih dahulu';
            $this->session->set_flashdata('message', $pesan );
            redirect(base_url('index.php/admin//login'));
        }
    }
    

}
?>