<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log_in extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        //$this->load->model('M_login');
    }
    public function index()
    {
        if ($this->session->userdata('email')) {
            $this->_login();
        }
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('login_baru', $data);
        } else {
            $this->_login();
        }
    }
    public function _login()
    {

        if ($this->session->userdata('email')) {
            $username = $this->session->userdata('email');
        } else {
            $username = $this->input->post('email');
        }

        //$username = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('pauser', ['email' => $username])->row_array();
        //$user = $this->M_login->SelectDataUser($username, $password);
        //var_dump($user['rf_email']);
        //die;
        //var_dump($password);
        //die;
        if ($user) {
            if ($user['statusUser'] == 1) {

                if (password_verify($password, $user['pass'])) {

                    $this->session->set_userdata(array('status' => 1));
                    $username = $this->session->userdata('email');
                    if ($user['type'] == 1) {
                        $this->_typeUser(1);
                    } else if ($user['type'] == 2) {
                        $this->_typeUser(2);
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Tipe user tidak terdaftar!</div>');
                        redirect('log_in');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Password salah!</div>');
                    redirect('log_in');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    User belum aktif atau password salah!</div>');
                redirect('log_in');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Kombinasi email dan password salah</div>');
            redirect('log_in');
        }
    }
    public function _typeUser($id)
    {
        if ($this->session->userdata('tipeuser') != "") {
            if ($this->session->userdata('tipeuser') == 'Pengajar') {
                redirect('pengajar');
            } else if ($this->session->userdata('tipeuser') == 'Siswa') {
                redirect('siswa');
            }
        } else {

            if ($id == 1) {
                /*
                $data_pengajar = $this->M_login->SelectPengajarByEmail($this->input->post('email'));

                $tipeuser = $this->session->set_userdata('tipeuser', 'Pengajar');
                $email = $this->session->set_userdata('email', $this->input->post('email'));
                $nama = $this->session->set_userdata('nama', $data_pengajar['rf_nama']);
                $id_pengajar = $this->session->set_userdata('id_pengajar', $data_pengajar['rf_idPengajar']);
                $id_institusi = $this->session->set_userdata('id_institusi', $data_pengajar['rf_idInstitusi']);
                $id_diinstitusi = $this->session->set_userdata('id_diinstitusi', $data_pengajar['rf_idDiInstitusi']);
                $nama_institusi = $this->session->set_userdata('nama_institusi', $data_pengajar['rf_namaInstitusi']);
                $issukses = $this->session->set_userdata('issukses', 1);
                $footer = $this->session->set_userdata('footer', 'Copyright Â© 2017 Manajemen Informatika D3 - UNDIKSHA. ');
                $title = $this->session->set_userdata('title', 'Halaman Pengajar');

                redirect('pengajar');
				*/
                //echo "Tipe User 1";die;
                $email = $this->session->set_userdata('email', $this->input->post('email'));
                $this->load->view('header');
                $this->load->view('sidebar');
                $this->load->view('blank');
                $this->load->view('footer');
            } else if ($id == 2) {
                /*
				$data_siswa = $this->M_login->SelectSiswaByEmail($this->input->post('email'));
                //var_dump($data_siswa);
                $tipeuser = $this->session->set_userdata('tipeuser', 'Siswa');
                $nama = $this->session->set_userdata('nama', $data_siswa['rf_nama']);
                $email = $this->session->set_userdata('email', $this->input->post('email'));
                $id_siswa = $this->session->set_userdata('id_siswa', $data_siswa['rf_idSiswa']);
                $id_institusi = $this->session->set_userdata('id_institusi', $data_siswa['rf_idInstitusi']);
                $id_diinstitusi = $this->session->set_userdata('id_diinstitusi', $data_siswa['rf_idDiInstitusi']);
                $nama_institusi = $this->session->set_userdata('nama_institusi', $data_siswa['rf_namaInstitusi']);
                $issukses = $this->session->set_userdata('issukses', 1);
                $footer = $this->session->set_userdata('footer', 'Copyright Â© 2017 Manajemen Informatika D3 - UNDIKSHA. ');
                redirect('siswa');
				*/
                echo "User Tipe 2";
                die;
            }
        }
    }
    public function logout()
    {
        /*unset(
        	$_SESSION['status']
		);
		
		redirect('Login');*/

        session_start();

        $this->session->sess_destroy();
        redirect('log_in');
    }
    public function daftar()
    {
        //if ($this->session->userdata('email')) {
        //    $this->_login();
        //}
        $this->form_validation->set_rules('nama', 'Nama lengkap', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pauser.email]', ['is_unique' => 'This email has already registered!']);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', ['matches' => 'Password dont match!', 'min_length' => 'Password too short!']);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {

            $data['title'] = "Form Pendaftaran";
            $data['institusi'] = $this->db->get('institusi')->result_array();
            $data['jenis'] = $this->db->get('jenisinstitusi')->result_array();
            $this->load->view('daftar', $data);
        } else {
            $idjenis = $this->input->post('jenis_id');
            $idinstitusi = $this->input->post('institusi_id');
            $email = $this->input->post('email');
            $nama = $this->input->post('nama');
            $password = $this->input->post('password1');
            $type = $this->input->post('type_user');
            $data_user = [
                'email' => $email,
                'pass' => password_hash($password, PASSWORD_DEFAULT),
                'type' => $type,
                'statusUser' => 0
            ];

            $data_status = [
                'idPadaInstitusi' => $idjenis,
                'nama' => $nama,
                'email' => $email,
                'id_institusi' => $idinstitusi
            ];
            //siapkan token
            $angka = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';

            $token = substr(str_shuffle($angka), 0, 60);


            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];
            //insert ke db
            $this->db->insert('pauser', $data_user);
            /*
			if ($type == 1) {
                $this->db->insert('pengajar', $data_status);
            } else {
                $this->db->insert('siswa', $data_status);
            }
			*/
            $this->db->insert('user_token', $user_token);
            $this->_sendEmail($token, 'verify');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat!. Akun sudah dibuat silahkan cek email untuk aktivasi!.</div>');
            redirect('log_in');
        }
    }
    private function _sendEmail($token, $type_email)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'setemenid@gmail.com',
            'smtp_pass' => 'setemen_ID76',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];
        $this->load->library('email', $config);
        $this->email->from('setemenid@gmail.com', 'Komang Setemen');
        $this->email->to($this->input->post('email'));
        if ($type_email == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this account to verify your account: <a href="' . base_url() . 'log_in/verify?email=' . $this->input->post('email') . '&token=' . $token . '">Activate</a>');
        } else if ($type_email == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password: <a href="' . base_url() . 'log_in/resetpassword?email=' . $this->input->post('email') . '&token=' . $token . '">Reset Password</a>');
        }
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user = $this->db->get_where('pauser', ['email' => $email])->row_array();
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                if ((time() - $user_token['date_created']) < (60 * 60 * 24)) {
                    $this->db->set('statusUser', 1);
                    $this->db->where('email', $email);
                    $this->db->update('pauser');
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    ' . $email . ' sudah diaktivasi. Silahkan login!.</div>');
                    redirect('log_in');
                } else {
                    $this->db->delete('pauser', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);
                    //$this->db->delete('siswa', ['email' => $email]);
                    //$this->db->delete('pengajar', ['email' => $email]);
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Aktivasi gagal. Waktu aktivasi habis!.</div>');
                    redirect('log_in');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Aktivasi gagal. Kode aktivasi tidak valid!.</div>');
                redirect('log_in');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Aktivasi gagal. Email tidak valid!.</div>');
            redirect('log_in');
        }
    }
    public function forgotpassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Lupa Password';
            $this->load->view('forgot-password', $data);
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('pauser', ['email' => $email, 'statusUser' => 1])->row_array();
            if ($user) {
                //siapkan token
                $angka = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                $token = substr(str_shuffle($angka), 0, 60);
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];
                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Silahkan cek email anda untuk reset password!.</div>');
                redirect('log_in');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email tidak terdaftar atau tidak aktif!.</div>');
                redirect('log_in/forgotpassword');
            }
        }
    }
    public function resetpassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user = $this->db->get_where('pauser', ['email' => $email]);
        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->db->delete('user_token', ['email' => $email]);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Ubah password gagal! Kode aktivasi tidak valid.</div>');
                redirect('log_in/forgotpassword');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Ubah password gagal! Email tidak valid.</div>');
            redirect('log_in/forgotpassword');
        }
    }
    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('log_in');
        }
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[6]|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $this->load->view('change-password');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');
            $this->db->set('pass', $password);
            $this->db->where('email', $email);
            $this->db->update('pauser');
            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Password telah diubah!. Silahkan login!.</div>');
            redirect('log_in');
        }
    }
    public function profile()
    {
        $data['isi'] = $this->db->get_where('pauser', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('header', $data);
        $this->load->view('sidebar', $data);
        $this->load->view('profile', $data);
        $this->load->view('footer', $data);
    }
    public function profile_update()
    {
        $email = $this->input->post('email');
        //cek jika ada gambar
        $upload_image = $_FILES['image']['name'];
        if ($upload_image) {
            $config['upload_path'] = './assets/AdminLTE2410/dist/img/profile/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '2048';

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $old_image = $data['pauser']['image'];
                if ($old_image != 'img.jpg') {
                    unlink(FCPATH . 'assets/AdminLTE2410/dist/img/profile/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
                $this->db->where('email', $email);
                $this->db->update('pauser');
            } else {
                echo $this->upload->display_errors();
            }
        }
        //$this->db->set('nama', $name);
        //$this->db->where('email', $email);
        //$this->db->update('pengajar');
        redirect('log_in/profile');
    }
}
