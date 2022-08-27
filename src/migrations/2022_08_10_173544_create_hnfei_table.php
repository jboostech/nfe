<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHnfeiTable extends Migration
{
    public function up()
    {
        Schema::create('boostech_nfe_hnfei', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('nf_id');
            $table->string('prod_cprod', 60)->nullable(true);
            $table->string('prod_cean', 14)->nullable(true);
            $table->string('prod_xprod', 120)->nullable(true);
            $table->string('prod_ncm', 8)->nullable(true);
            $table->string('prod_ex_tipi', 3)->nullable(true);
            $table->string('prod_cfop', 4)->nullable(true);
            $table->string('prod_ucom', 6)->nullable(true);
            $table->float('prod_qcom', 15, 4)->nullable(true);
            $table->float('prod_vuncom', 20, 10)->nullable(true);
            $table->float('prod_vprod', 15, 2)->nullable(true);
            $table->string('prod_ceantrib', 14)->nullable(true);
            $table->string('prod_utrib', 6)->nullable(true);
            $table->float('prod_qtrib', 11, 4)->nullable(true);
            $table->float('prod_vuntrib', 20, 10)->nullable(true);
            $table->float('prod_vfrete', 15, 2)->nullable();
            $table->float('prod_vseg', 15, 2)->nullable();
            $table->float('prod_vdesc', 15, 2)->nullable();
            $table->float('prod_voutro', 15, 2)->nullable();
            $table->string('prod_indtot', 1)->nullable(true);

            /*
            $table->float('imposto_vtottrib', 15, 2);

            $table->string('icms_cst', 2)->nullable();
            $table->string('icms_csosn', 3)->nullable();
            $table->string('icms_modbc', 1);
            $table->string('icms_orig', 1);
            $table->float('icms_picms', 15, 4);
            $table->float('icms_vbc', 15, 2);
            $table->float('icms_vicms', 15, 2);

            $table->string('ipi_cenq', 3);
            $table->string('ipi_clenq', 5);
            $table->string('ipi_cnpjprod', 14);
            $table->string('ipi_cselo', 60);
            $table->string('ipi_cst', 2);
            $table->float('ipi_pipi', 15, 4);
            $table->float('ipi_vbc', 15, 2);
            $table->float('ipi_vipi', 15, 2);

            $table->string('ii_cst', 2);
            $table->float('ii_vbc', 15, 2);
            $table->float('ii_vii', 15, 2);
            $table->float('ii_viof', 15, 2);

            $table->string('pis_cst', 2);
            $table->float('pis_ppis', 15, 4);
            $table->float('pis_vbc', 15, 2);
            $table->float('pis_vpis', 15, 2);

            $table->string('cofins_cst', 2);
            $table->float('cofins_vbc', 15, 2);
            $table->float('cofins_pcofins', 15, 4);
            $table->float('cofins_vcofins', 15, 2);
            */

            $table->bigInteger('empresa_id');
            $table->bigInteger('usuario_id');

            $table->timestamps();
            $table->foreign('nf_id')->references('id')->on('boostech_nfe_hnfex');
        });
    }

    public function down()
    {
        Schema::dropIfExists('hnfei');
    }
}
