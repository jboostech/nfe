<?php

namespace Boostech\Nfe\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class HnfexRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ide_indpag' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'ide_indpag' => 'ide_indpag',
        ];
    }

    public function before()
    {
        $this->merge([
            'revisao' => true,
            'revisao_em' => null,
            'revisao_user_id' => null,
        ]);

        parent::before();
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $id = null;

            if ($this->route()->parameter('hnfex')) {
                $id = $this->route()->parameter('hnfex')->id;
            }

            $obj = DB::select("select * from hnfex where upper(trim(nome)) = ?;", [strtoupper($this->request->get("nome"))]);

            // Valida se o nome já existe
            if (count($obj) > 0 && $id != $obj[0]->id) {
                $validator->errors()->add('nome', sprintf("O nome %s já existe na base de dados", $this->input('nome')));
            }
        });
    }
}
