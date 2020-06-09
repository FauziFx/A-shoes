<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Checkout_model extends CI_Model
{
	private $api_key = 'your_api_key'; // Api Rajaongkir
	
	public function get_data($data){
		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL            => "https://api.rajaongkir.com/starter/$data",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING       => "",
			CURLOPT_MAXREDIRS      => 10,
			CURLOPT_TIMEOUT        => 30,
			CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST  => "GET",
			CURLOPT_HTTPHEADER     => array(
		    "key: $this->api_key"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  return $err;
		} else {
		  return $response;
		}
	}

	public function get_cost($dest,$weight,$cour){
		$curl = curl_init();

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL            => "https://api.rajaongkir.com/starter/cost",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING       => "",
			CURLOPT_MAXREDIRS      => 10,
			CURLOPT_TIMEOUT        => 30,
			CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST  => "POST",
			CURLOPT_POSTFIELDS     => "origin=108&destination=$dest&weight=$weight&courier=$cour",
			CURLOPT_HTTPHEADER     => array(
		    "content-type: application/x-www-form-urlencoded",
		    "key: $this->api_key"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  return $err;
		} else {
		  return $response;
		}

	}

}
