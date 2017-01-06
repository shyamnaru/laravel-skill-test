<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Form;

class FormController extends Controller
{
    public function index()
    {
        $Form = new Form;
        $array_data = $Form->getData();
        return view('form.index', ['array_data' => $array_data]);
    }

    public function postCreate(Request $request)
    {
        $Form = new Form;
        $res = $Form->saveData($request);
        return json_encode($res);
    }
}