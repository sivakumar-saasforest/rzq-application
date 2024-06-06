<?php

namespace RzqApplication\Plugin\Store;

use Exception;

class Coupon
{
    public function all()
    {
        try {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => rzq_api_site_url() . '/coupon.rzq',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Accept: application/json',
                    'Authorization:RZQ ' . env('RZQ_CLIENT_ID') . ':' . env('RZQ_CLIENT_SECRET')
                ),
            ));

            $response = curl_exec($curl);
            curl_close($curl);

            return $response;
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function create($data, $type)
    {
        try {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => rzq_api_site_url() . '/' . $type . '-coupon.rzq',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => json_encode($data),
                CURLOPT_HTTPHEADER => array(
                    'Accept: application/json',
                    'Content-Type: application/json',
                    'Authorization:RZQ ' . env('RZQ_CLIENT_ID') . ':' . env('RZQ_CLIENT_SECRET')
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            return $response;
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function show($couponId)
    {
        try {
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => rzq_api_site_url() . '/coupon/' . $couponId . '.rzq',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'GET',
                CURLOPT_HTTPHEADER => array(
                    'Authorization:RZQ ' . env('RZQ_CLIENT_ID') . ':' . env('RZQ_CLIENT_SECRET')
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);

            return $response;
        } catch (Exception $exception) {
            return $exception->getMessage();
        }
    }
}
