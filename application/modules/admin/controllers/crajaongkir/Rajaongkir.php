<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rajaongkir extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //jika tidak ada session,lempar ke auth
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('admin/madmin/admin_model', 'adminModel');
    }

    private $api_key = '60b898720b91692d42d076d5596e727d';

    public function provinsi()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: $this->api_key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            // echo $response;
            $array_response = json_decode($response, true);

            /* cara melihat data array lewat print_r */
            // Start

            // echo '<pre>';
            // print_r($array_response['rajaongkir']['results']);
            // echo '</pre>';

            // End

            $data_provinsi = $array_response['rajaongkir']['results'];
            foreach ($data_provinsi as $dp) {
                echo "<option value='" . $dp['province'] . "' id_provinsi='" . $dp['province_id'] . "'>  " . $dp['province'] . " </option>";
            }
        }
    }

    public function kota()
    {
        $id_provinsi_terpilih = $this->input->post('id_provinsi');
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=" . $id_provinsi_terpilih,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "key: $this->api_key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $array_response = json_decode($response, true);
            $data_kota = $array_response['rajaongkir']['results'];
            foreach ($data_kota as $dk) {
                echo "<option value='" . $dk['city_name'] . "' id_kota='" . $dk['city_id'] . "'>  " . $dk['city_name'] . " </option>";
            }
        }
    }

    public function paket()
    {
        $setting = $this->adminModel->data_setting();
        $id_kota_asal = $setting['lokasi'];
        $ekspedisi = $this->input->post('ekspedisi');
        $id_kota = $this->input->post('id_kota');
        $berat = $this->input->post('berat');
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "origin=" . $id_kota_asal . "&destination=" . $id_kota . "&weight=" . $berat . "&courier=" . $ekspedisi,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
                "key: $this->api_key"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            $array_response = json_decode($response, true);
            // echo '<pre>';
            // print_r($array_response['rajaongkir']['results'][0]['costs']);
            // echo '</pre>';
            $data_paket = $array_response['rajaongkir']['results'][0]['costs'];
            echo "<option value=''>-Pilih Paket-</option>";
            foreach ($data_paket as $dp) {
                echo "<option value='" . $dp['service'] . "' ongkir='" . $dp['cost'][0]['value'] . "' estimasi='" . $dp['cost'][0]['etd'] . " Hari'> " . $dp['service'] . " | Rp." . $dp['cost'][0]['value'] . " | " . $dp['cost'][0]['etd'] . " Hari" . " </option>";
            }
        }
    }
}
