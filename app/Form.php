<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    public function getData()
    {
        $filetxt = public_path().'/form_data.json';
        $array_data = array();
        if(file_exists($filetxt)) {
            $jsondata = file_get_contents($filetxt);
            if(!empty($jsondata)) {
                $array_data = json_decode($jsondata, true);
                usort($array_data, function($a, $b) {
                    return $a['created_at'] - $b['created_at'];
                });
            }
        }
        return $array_data;
    }

    public function saveData($request)
    {
        $created_at = date('Y-m-d h:i:s');
        $data = array('product_name'=> $request->product_name, 'quantity'=> $request->quantity, 'price'=> $request->price, 'created_at' => $created_at);
        $filetxt = public_path().'/form_data.json';
        $arr_data = array();

        if(file_exists($filetxt)) {
            $jsondata = file_get_contents($filetxt);
            $arr_data = json_decode($jsondata, true);
        }

        $arr_data[] = $data;
        $jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);

        file_put_contents($filetxt, $jsondata);

        $res = array();
        $html = '<tr>';
        $html.= '<td>'.$request->product_name.'</td>';
        $html.= '<td>'.$request->quantity.'</td>';
        $html.= '<td>'.$request->price.'</td>';
        $html.= '<td>'.$created_at.'</td>';
        $html.= '<td>'.$request->price*$request->quantity.'</td>';
        $html.= '</tr>';
        $res['html'] = $html;
        $res['total'] = $request->price*$request->quantity;

        return $res;
    }
}
