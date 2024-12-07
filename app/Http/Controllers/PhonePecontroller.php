<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Ixudra\Curl\Facades\Curl;
use App\Models\Phonepe;
use App\Models\Phonepereturn;

class PhonePecontroller extends Controller
{
    public function phonePe($id,$amount)
    {
      $abc=$id;
    //   Session::regenerate();
      // Session::put('abc', $abc);
    //   Session::save();
    // $this->response($userid);
      $amt=($amount*100);
        $data = array (
          'merchantId' => 'MANPOWERPGONLINE',
          'merchantTransactionId' => uniqid(),
          'merchantUserId' => 'MUID123',
          'amount' => $amt,
          'redirectUrl' => route('response'),
          'redirectMode' => 'POST',
          'callbackUrl' => route('response'),
          'mobileNumber' => '8250901098',
          // 'userid' => $userid,
          'paymentInstrument' => 
          
          array (
            'type' => 'PAY_PAGE',
          ),
        );
        $encode = base64_encode(json_encode($data));

        $saltKey = 'f2e43d42-58d5-4b4b-91fc-fb6c8eb5f006';
        $saltIndex = 1;

        $string = $encode.'/pg/v1/pay'.$saltKey;
        $sha256 = hash('sha256',$string);

        $finalXHeader = $sha256.'###'.$saltIndex;

        $response = Curl::to('https://api.phonepe.com/apis/hermes/pg/v1/pay')
                ->withHeader('Content-Type:application/json')
                ->withHeader('X-VERIFY:'.$finalXHeader)
                ->withData(json_encode(['request' => $encode]))
                ->post();

        $rData = json_decode($response);
        // dd($rData);
        return redirect()->to($rData->data->instrumentResponse->redirectInfo->url);

    }

    public function response(Request $request)
    {
        $input = $request->all();

        $saltKey = 'f2e43d42-58d5-4b4b-91fc-fb6c8eb5f006';
        $saltIndex = 1;

        $finalXHeader = hash('sha256','/pg/v1/status/'.$input['merchantId'].'/'.$input['transactionId'].$saltKey).'###'.$saltIndex;

        $response = Curl::to('https://api.phonepe.com/apis/hermes/pg/v1/status/'.$input['merchantId'].'/'.$input['transactionId'])
                ->withHeader('Content-Type:application/json')
                ->withHeader('accept:application/json')
                ->withHeader('X-VERIFY:'.$finalXHeader)
                ->withHeader('X-MERCHANT-ID:'.$input['transactionId'])
                ->get();
        $all_data=json_decode($response);
        // $ccc=Session::get('abc');
        // $ccc=$request->session()->put('abc');
        // $id=$userid;
        dd($all_data);
        $amt=(($all_data->data->amount)/100);
        $date=date('Y-m-d H:i:s');
        $ob=new Phonepe;
        // $ob->user_id=$id;
        $ob->amount=$amt;
        $ob->trans_id=$all_data->data->transactionId;
        $ob->m_trns_id=$all_data->data->merchantTransactionId;
        $ob->status=$all_data->data->responseCode;
        $ob->date=$date;
        $ob->save();
        // echo ($all_data->message);
      
    }


    public function refundProcess($tra_id)
    {
        $payload = [
           'merchantId' => 'MANPOWERPGONLINE',
           'merchantUserId' => 'MUID123',
           'merchantTransactionId' => ($tra_id),
           'originalTransactionId' => strrev($tra_id),
           'amount' => 5000,
           'callbackUrl' => route('response'),
        ];

        $encode = base64_encode(json_encode($payload));

        $saltKey = 'f2e43d42-58d5-4b4b-91fc-fb6c8eb5f006';
        $saltIndex = 1;

        $string = $encode.'/pg/v1/refund'.$saltKey;
        $sha256 = hash('sha256',$string);

        $finalXHeader = $sha256.'###'.$saltIndex;

        $response = Curl::to('https://api.phonepe.com/apis/hermes/pg/v1/refund')
                ->withHeader('Content-Type:application/json')
                ->withHeader('X-VERIFY:'.$finalXHeader)
                ->withData(json_encode(['request' => $encode]))
                ->post();

        $rData = json_decode($response);



        $finalXHeader1 = hash('sha256','/pg/v1/status/'.'MANPOWERPGONLINE'.'/'.$tra_id.$saltKey).'###'.$saltIndex;

        $responsestatus = Curl::to('https://api.phonepe.com/apis/hermes/pg/v1/status/'.'MANPOWERPGONLINE'.'/'.$tra_id)
                ->withHeader('Content-Type:application/json')
                ->withHeader('accept:application/json')
                ->withHeader('X-VERIFY:'.$finalXHeader1)
                ->withHeader('X-MERCHANT-ID:'.$tra_id)
                ->get();
        $all_data=json_decode($responsestatus);
        $amt=(($all_data->data->amount)/100);
        $date=date('Y-m-d H:i:s');
        $ob=new Phonepereturn;
        $ob->amount=$amt;
        $ob->trans_id=$all_data->data->transactionId;
        $ob->m_trns_id=$all_data->data->merchantTransactionId;
        $ob->status=$all_data->data->responseCode;
        $ob->date=$date;
        $ob->save();
        echo ($all_data->message);
        // dd(json_decode($response),json_decode($responsestatus));
        // dd($rData);
    }
}
