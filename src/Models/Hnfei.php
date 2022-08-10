<?php

namespace Boostech\Nfe\Models;

use Boostech\Nfe\Requests\HnfexRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Classe responsável por gerenciar os itens da NF-e
 */
class Hnfei extends Model
{
    protected $table = "boostech_nfe_hnfei";

    protected $fillable = [
        'id',
        'nf_id',

        'prod_cprod',
        'prod_cean',
        'prod_xprod',
        'prod_ncm',
        'prod_ex_tipi',
        'prod_cfop',
        'prod_ucom',
        'prod_qcom',
        'prod_vuncom',
        'prod_vprod',
        'prod_ceantrib',
        'prod_utrib',
        'prod_qtrib',
        'prod_vuntrib',
        'prod_vfrete',
        'prod_vseg',
        'prod_vdesc',
        'prod_voutro',
        'prod_indtot',

        'imposto_vtottrib',

        'icms_cst',
        'icms_modbc',
        'icms_orig',
        'icms_picms',
        'icms_vbc',
        'icms_vicms',

        'ipi_cenq',
        'ipi_clenq',
        'ipi_cnpjprod',
        'ipi_cselo',
        'ipi_cst',
        'ipi_pipi',
        'ipi_vbc',
        'ipi_vipi',

        'ii_cst',
        'ii_vbc',
        'ii_vii',
        'ii_viof',

        'pis_cst',
        'pis_ppis',
        'pis_vbc',
        'pis_vpis',

        'cofins_cst',
        'cofins_vbc',
        'cofins_pcofins',
        'cofins_vcofins',

        'empresa_id',
        'usuario_id',
    ];

    public function setProdVfreteAttribute($value)
    {
        if (strlen(trim($value)) > 0) {
            $this->attributes['prod_vfrete'] = $value;
        } else {
            $this->attributes['prod_vfrete'] = null;
        }
    }

    public function setProdVsegAttribute($value)
    {
        if (strlen(trim($value)) > 0) {
            $this->attributes['prod_vseg'] = $value;
        } else {
            $this->attributes['prod_vseg'] = null;
        }
    }

    public function setProdVdescAttribute($value)
    {
        if (strlen(trim($value)) > 0) {
            $this->attributes['prod_vdesc'] = $value;
        } else {
            $this->attributes['prod_vdesc'] = null;
        }
    }

    public function setProdVoutroAttribute($value)
    {
        if (strlen(trim($value)) > 0) {
            $this->attributes['prod_voutro'] = $value;
        } else {
            $this->attributes['prod_voutro'] = null;
        }
    }

    public function setImpostoVtottribAttribute($value)
    {
        if (strlen(trim($value)) > 0) {
            $this->attributes['imposto_vtottrib'] = $value;
        } else {
            $this->attributes['imposto_vtottrib'] = null;
        }
    }

    /**
     * Método responsável por persistir os dados do item da NF-e
     */
    public static function createHnfei(Hnfex $hnfex, Request $data)
    {
        $status = false;
        $excessao = null;
        $mensagem = null;
        $obj = null;

        try {
            DB::beginTransaction();

            $hnfei = Hnfei::create([
                'nf_id' => $hnfex->id,

                'prod_cprod' => $data['prod_cprod'],
                'prod_cean' => $data['prod_cean'],
                'prod_xprod' => $data['prod_xprod'],
                'prod_ncm' => $data['prod_ncm'],
                'prod_ex_tipi' => $data['prod_ex_tipi'],
                'prod_cfop' => $data['prod_cfop'],
                'prod_ucom' => $data['prod_ucom'],
                'prod_qcom' => $data['prod_qcom'],
                'prod_vuncom' => $data['prod_vuncom'],
                'prod_vprod' => $data['prod_vprod'],
                'prod_ceantrib' => $data['prod_ceantrib'],
                'prod_utrib' => $data['prod_utrib'],
                'prod_qtrib' => $data['prod_qtrib'],
                'prod_vuntrib' => $data['prod_vuntrib'],
                'prod_vfrete' => $data['prod_vfrete'],
                'prod_vseg' => $data['prod_vseg'],
                'prod_vdesc' => $data['prod_vdesc'],
                'prod_voutro' => $data['prod_voutro'],
                'prod_indtot' => $data['prod_indtot'],

                /*
                'imposto_vtottrib' => $data['imposto_vtottrib'],

                'icms_cst' => $data['icms_cst'],
                'icms_modbc' => $data['icms_modbc'],
                'icms_orig' => $data['icms_orig'],
                'icms_picms' => $data['icms_picms'],
                'icms_vbc' => $data['icms_vbc'],
                'icms_vicms' => $data['icms_vicms'],

                'ipi_cenq' => $data['ipi_cenq'],
                'ipi_clenq' => $data['ipi_clenq'],
                'ipi_cnpjprod' => $data['ipi_cnpjprod'],
                'ipi_cselo' => $data['ipi_cselo'],
                'ipi_cst' => $data['ipi_cst'],
                'ipi_pipi' => $data['ipi_pipi'],
                'ipi_vbc' => $data['ipi_vbc'],
                'ipi_vipi' => $data['ipi_vipi'],

                'ii_cst' => $data['ii_cst'],
                'ii_vbc' => $data['ii_vbc'],
                'ii_vii' => $data['ii_vii'],
                'ii_viof' => $data['ii_viof'],

                'pis_cst' => $data['pis_cst'],
                'pis_ppis' => $data['pis_ppis'],
                'pis_vbc' => $data['pis_vbc'],
                'pis_vpis' => $data['pis_vpis'],

                'cofins_cst' => $data['cofins_cst'],
                'cofins_vbc' => $data['cofins_vbc'],
                'cofins_pcofins' => $data['cofins_pcofins'],
                'cofins_vcofins' => $data['cofins_vcofins'],

                */
                'empresa_id' =>  $hnfex->empresa_id,
                'usuario_id' =>  $hnfex->usuario_id,
            ]);

            $status = true;
            $mensagem = "Registro criado com sucesso";
            $obj = $hnfei;

            DB::commit();
        } catch (\PDOException $e) {
            $status = false;
            $mensagem = sprintf("Ocorreu um erro inesperado Método: %s", __METHOD__);
            $excessao = $e;
            DB::rollBack();
        }

        return ["status" => $status, "excessao" => $excessao, "mensagem" => $mensagem, "obj" => $obj];
    }
}
