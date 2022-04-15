<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;


class tipoCambio extends Controller
{


    public function getCambio(Request $request)
    {

      $validator = $this->validateCantidad($request);

			if ($validator->fails()) {
					return response()->json(["status"=> 400, "errors"=>$validator->messages()]);

			} else {

					return response()->json(["status"=> 200,"data"=>$this->getData($request->get('cantidad'))]);
			}

    }

    protected function validateCantidad($request) {


    return Validator::make($request->all(), [
          'cantidad'=>'required',
          ],[
              'cantidad.required' => 'Igresa una cantidad!',
            ]);

      }

      public function getData($cantidad)
      {

        return [
          'cantidad'=>$cantidad,
          'DoF'=>$this->getDataDoF($cantidad),
          'Banxico'=>$this->getDataBanxico($cantidad),
          'Fixer'=>$this->getDataFixer($cantidad),

        ];

      }

      public function getDataFixer($cantidad)
      {

        $client = new \GuzzleHttp\Client(['verify'=>false]);
        $url='http://data.fixer.io/api/latest?';

        $post_vars = [

            'access_key' => '4207f80fc31f3d3d19001b7a1b115292',
            'from' => 'EUR',
            'symbols' => 'USD,MXN',

        ];

        $payw_vars = http_build_query($post_vars);
        $urlc=$url.$payw_vars;

        $res = $client->request('GET', $urlc);
        if ($res->getStatusCode()==200) {
          $a=json_decode($res->getBody()->getContents(), true);

//           $euro=$cantidad/$a['rates']['MXN'];
//
//
//
//
// dd($euro);
          $usd=$a['rates']['USD'];
          $mxn=$a['rates']['MXN'];
          $dll=$mxn/$usd;
          $resultado=['tipo_cambio'=>$dll,'cantidad'=>$cantidad,'cambio_dollar'=>$dll*$cantidad];
          return $resultado;

        }else {
          return 'Sin servicio !';
        }

      }

      public function getDataDoF($cantidad)
      {
        $client = new \GuzzleHttp\Client(['verify'=>false]);
        // $url="https://sidof.segob.gob.mx/historicoIndicadores/indicadores/158/13-04-2022/13-04-2022";
        $url="https://sidof.segob.gob.mx/historicoIndicadores/indicadores/158/";

        $fechas=date('d-m-Y',strtotime("-2 days")).'/'.date('d-m-Y',strtotime("-2 days"));
        $urlc=$url.$fechas;

        $res = $client->request('GET', $urlc);
        if ($res->getStatusCode()==200) {
          $a=json_decode($res->getBody()->getContents(), true);

          if (empty($a['return'][0])) {
            return 'Sin servicio !';
          }

          $c=$a['return'][0];
          $resultado=['tipo_cambio'=>$c['valor'],'cantidad'=>$cantidad,'cambio_dollar'=>(float)$c['valor']*$cantidad];

          return $resultado;

        }else {
          return 'Sin servicio !';
        }
      }

      public function getDataBanxico($cantidad)
      {

        $client = new \GuzzleHttp\Client(['verify'=>false]);
        $url='https://www.banxico.org.mx/SieAPIRest/service/v1/series/';
        $serie='SF63528';
        $fechas=date('Y-m-d',strtotime("-2 days")).'/'.date('Y-m-d',strtotime("-2 days"));
        $urlc=$url.$serie.'/datos/'.$fechas;
        $headers=['headers' => ['Bmx-Token' => '9b3861c91d78311c26c74dd0a7cd23e0a6967436570541401f4f6687c18cfdab']];
        $res = $client->request('GET', $urlc,$headers);
        if ($res->getStatusCode()==200) {
          $a=json_decode($res->getBody()->getContents(), true);

          if (empty($a['bmx']['series'][0]['datos'][0]['dato'])) {
            return 'Sin servicio !';
          }

          $c=$a['bmx']['series'][0]['datos'][0]['dato'];
          $resultado=['tipo_cambio'=>$c,'cantidad'=>$cantidad,'cambio_dollar'=>(float)$c*$cantidad];
          return $resultado;
        }else {
          return 'Sin servicio !';
        }

      }



}
