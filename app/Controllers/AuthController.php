<?php

namespace App\Controllers;

use App\Models\KecamatanModel;
use App\Models\PendudukModel;
use App\Models\UserModel;
use App\Models\DesaModel;
//use ReCaptcha\ReCaptcha;

class AuthController extends BaseController
{
    public function __construct()
    {
        $this->penduduk = new PendudukModel();
    }
    public function index(): string
    {
        return view('authPage/auth-login');
    }

    public function otp(): string
    {
        return view('authPage/otp');
    }

    public function set_password(): string
    {
        return view('authPage/set-new-password');
    }


    public function register()
    {        
        $kecamatanModel = new KecamatanModel();
        $data['kecamatan'] = $kecamatanModel->findAll();
        return view('authPage/auth-register', $data);
        
    }
    public function getDesa()
    {
        $request = $this->request;
        $kecamatanId = $request->getPost('id_kecamatan');
        $desaModel = new DesaModel();
        $desaList = $desaModel->where('id_kecamatan', $kecamatanId)->findAll();
        return view('component/opsiDesa', ['desaList' => $desaList]);
    }

    public function PendudukLogin()
    {
        return view(    'authPage/PendudukAuth');
    }

    public function lupaPassword()
    {
        return view('authPage/LupaPassword');
    }

    public function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $userModel = new UserModel();
        $user = $userModel->getUser($username);
        $recaptchaResponse = $this->request->getPost('g-recaptcha-response');
//
//        $recaptcha = new Recaptcha('6LespSApAAAAAM2OPYhvVgy_yszkXbrFEa-4Oi--');
//        $result = $recaptcha->verify($recaptchaResponse);
//
//        if (!$result->isSuccess()) {
//            session()->setFlashdata('pesan', 'Validasi reCAPTCHA gagal. Harap coba lagi.');
//            return redirect()->to(base_url('/'))->withInput();
//        }
        $validate = $this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong.',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak Boleh Kosong.'
                ]
            ]
        ]);
        if ($validate) {
            $password = hash('sha256', $password);
            if ($user && $password === $user['password']) {
                // Login berhasil
//                $session->set('user_id', $user['id']);
                session()->set('isLogin', true);
                session()->set('user_id', $user['id']);
                session()->set('username', $user['username']);
                session()->set('password', $user['password']);
                session()->set('role', $user['role']);
                return redirect()->to(base_url('/dashboard'));
            } else {
                session()->setFlashdata('errors', 'Username & Password Salah !!!');
                return redirect()->back()->withInput();
            }
        }
    }

    public function login_penduduk()
    {
        $NIK = $this->request->getPost('nik');
        $dataPenduduk = $this->penduduk->getByNIK($NIK);

        if ($dataPenduduk) {
            $otp = rand(100000, 999999);
            $OTP_TOKEN = $otp;
            $token = 'H!jJva36Td+5d2o1oC1B';
            $target = $dataPenduduk['nomor_hp'];

            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://api.fonnte.com/send',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                    'target' => $target,
                    'message' => "Kode OTP anda: $OTP_TOKEN",
                    'url' => 'https://www.google.com',
                    'filename' => 'filename',
                    'schedule' => '0',
                    'typing' => false,
                    'delay' => '2',
                    'countryCode' => '62'
                ),
                CURLOPT_HTTPHEADER => array(
                    "Authorization: $token"
                ),
            ));

            $response = curl_exec($curl);
            if (curl_errno($curl)) {
                $error_msg = curl_error($curl);
            }
            curl_close($curl);

            if (isset($error_msg)) {
                echo $error_msg;
            }

            // Simpan data penduduk di session
            session()->set('islogin', true);
            session()->set('penduduk_data', $dataPenduduk);
            session()->set('id_desa', $dataPenduduk['id_desa']);

            // Simpan OTP di session beserta timestamp
            session()->set('OTP_DATA', ['otp' => $OTP_TOKEN, 'timestamp' => time()]);

            return redirect()->to('otp-verification');
        } else {
            session()->setFlashdata('notFoundNIK', 'NIK anda Tidak Terdaftar di dalam sistem !!!');
            return redirect()->back()->withInput();
        }
    }

    public function verify()
    {
        if (!session()->get('islogin')) {
            // Jika belum login, kembalikan ke halaman login atau sesuai kebutuhan
            return redirect()->to('login-penduduk')->with('errors', 'Silakan login terlebih dahulu.');
        }

        $otpInput = $this->request->getPost('otp_code');

        // Ambil data OTP dan timestamp dari session
        $otpData = session()->get('OTP_DATA');

        if ($otpData && $otpInput == $otpData['otp']) {
            // Verifikasi waktu kadaluarsa (contoh: 5 menit)
            $expirationTime = 5 * 60; // 5 menit dalam detik

            if (time() - $otpData['timestamp'] <= $expirationTime) {
                // OTP valid dan belum kadaluarsa, lanjutkan proses sesuai kebutuhan

                // Clear session OTP setelah digunakan
                session()->remove('OTP_DATA');

                // Tambahkan log atau update status verifikasi di database jika diperlukan

                return redirect()->to('surat-online'); // Ganti 'surat-online' dengan halaman setelah verifikasi berhasil
            } else {
                // Waktu kadaluarsa, berikan pesan kesalahan
                session()->setFlashdata('invalid_otp', 'Kode OTP sudah kadaluarsa.');
                return redirect()->back()->withInput();
            }
        } else {
            // OTP tidak valid, berikan pesan kesalahan
            session()->setFlashdata('invalid_otp', 'Kode OTP tidak valid.');
            return redirect()->back()->withInput();
        }
    }



    public function logout()
    {
        session()->remove('isLogin');
        session()->remove('username');
        session()->remove('password');
        session()->remove('role');

        session()->setFlashdata('logout', 'Anda Telah Logout !!!');
        return redirect()->to(base_url('/'));
    }

}