<?php

namespace App\Controllers;

use App\Models\KecamatanModel;
use App\Models\UserModel;
use App\Models\DesaModel;

class AuthController extends BaseController
{
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
                session()->set('username', $user['username']);
                session()->set('password', $user['password']);
                session()->set('role', $user['role']);
                return redirect()->to(base_url('/dashboard'));
            } else {
                session()->setFlashdata('errors', 'Username & Password Salah !!!');
                return redirect()->back()->withInput();
            }
        }
        // Validate reCAPTCHA
        // $recaptcha = $this->request->getVar('g-recaptcha-response');
        // $recaptchaResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=" . config('Recaptcha')->secretKey . "&response=" . $recaptcha);
        // $recaptchaData = json_decode($recaptchaResponse);
        // if (!$recaptchaData->success) {
        //     // reCAPTCHA validation failed
        //     return redirect()->to('/')->with('error', 'reCAPTCHA validation failed. Please try again.');
        // }

        // Continue with the login process
    }

//    public function generateOTP()
//    {
////        $totp = new TOTP();
////        $totp->setLabel('MyApp');
////        $totp->setIssuer('MyCompany');
////
////        $otp = $totp->now();
//
//        // Kirim OTP ke pengguna, misalnya melalui SMS atau email
//    }
//    public function sendOTPViaSMS()
//    {
//        $accountSid = 'your_twilio_account_sid';
//        $authToken  = 'your_twilio_auth_token';
//        $twilio = new Client($accountSid, $authToken);
//
//        $twilio->messages
//            ->create(
//                '+6283263450720',
//                [
//                    'from' => '+', // Nomor Twilio Anda
//                    'body' => 'Your OTP code is 123456' // Isi pesan OTP
//                ]
//            );
//    }

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