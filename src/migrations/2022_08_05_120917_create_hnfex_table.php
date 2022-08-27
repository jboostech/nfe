<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHnfexTable extends Migration
{
    public function up()
    {
        Schema::create('boostech_nfe_hnfex', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ide_cuf', 2)->nullable(true);
            $table->string('ide_cnf', 8)->nullable(true);
            $table->string('ide_natop', 60)->nullable(true);
            $table->string('ide_mod', 2)->nullable(true);
            $table->string('ide_serie', 3)->nullable(true);
            $table->string('ide_nnf', 9)->nullable(true);
            $table->timestamp('ide_dhemi', $precision = 0)->nullable(true);
            $table->timestamp('ide_dhsaient', $precision = 0)->nullable(true);
            $table->string('ide_tpnf', 1)->nullable(true);
            $table->string('ide_iddest', 1)->nullable(true);
            $table->string('ide_cmunfg', 7)->nullable(true);
            $table->string('ide_tpimp', 1)->nullable(true);
            $table->string('ide_tpemis', 1)->nullable(true);
            $table->string('ide_cdv', 1)->nullable(true);
            $table->string('ide_tpamb', 1)->nullable(true);
            $table->string('ide_finnfe', 1)->nullable(true);
            $table->string('ide_indfinal', 1)->nullable(true);
            $table->string('ide_indpres', 1)->nullable(true);
            $table->string('ide_procemi', 1)->nullable(true);
            $table->string('ide_verproc', 20)->nullable(true);

            $table->string('emit_cnpj', 14)->nullable(true);
            $table->string('emit_cpf', 11)->nullable(true);
            $table->string('emit_xnome', 60)->nullable(true);
            $table->string('emit_xfant', 60)->nullable(true);
            $table->string('emit_ie', 14)->nullable(true);
            $table->string('emit_iest', 14)->nullable(true);
            $table->string('emit_im', 15)->nullable(true);
            $table->string('emit_crt', 1)->nullable(true);

            $table->string('enderemit_xlgr', 60)->nullable(true);
            $table->string('enderemit_nro', 60)->nullable(true);
            $table->string('enderemit_xcpl', 60)->nullable(true);
            $table->string('enderemit_xbairro', 60)->nullable(true);
            $table->string('enderemit_cmun', 7)->nullable(true);
            $table->string('enderemit_xmun', 60)->nullable(true);
            $table->string('enderemit_uf', 2)->nullable(true);
            $table->string('enderemit_cep', 8)->nullable(true);
            $table->string('enderemit_cpais', 4)->nullable(true);
            $table->string('enderemit_xpais', 60)->nullable(true);
            $table->string('enderemit_fone', 14)->nullable(true);

            $table->string('dest_cnpj', 14)->nullable(true);
            $table->string('dest_cpf', 11)->nullable(true);
            $table->string('dest_idestrangeiro', 20)->nullable(true);
            $table->string('dest_xnome', 60)->nullable(true);
            $table->string('dest_xfant', 60)->nullable(true);
            $table->string('dest_indiedest', 1)->nullable(true);
            $table->string('dest_ie', 14)->nullable(true);
            $table->string('dest_isuf', 9)->nullable(true);
            $table->string('dest_im', 15)->nullable(true);
            $table->string('dest_email', 60)->nullable(true);

            $table->string('enderdest_xlgr', 60)->nullable(true);
            $table->string('enderdest_nro', 60)->nullable(true);
            $table->string('enderdest_xcpl', 60)->nullable(true);
            $table->string('enderdest_xbairro', 60)->nullable(true);
            $table->string('enderdest_cmun', 7)->nullable(true);
            $table->string('enderdest_xmun', 60)->nullable(true);
            $table->string('enderdest_uf', 2)->nullable(true);
            $table->string('enderdest_cep', 8)->nullable(true);
            $table->string('enderdest_cpais', 4)->nullable(true);
            $table->string('enderdest_xpais', 60)->nullable(true);
            $table->string('enderdest_fone', 14)->nullable(true);

            $table->float('total_vprod', 15, 2)->nullable(true);

            $table->bigInteger('vol_qvol')->nullable(true);
            $table->string('vol_esp', 60)->nullable(true);
            $table->string('vol_marca', 60)->nullable(true);
            $table->string('vol_nvol', 60)->nullable(true);
            $table->float('vol_pesol', 15, 32)->nullable(true);
            $table->float('vol_pesob', 15, 32)->nullable(true);


            $table->string('infadic_infcpl', 5000)->nullable(true);
            $table->string('infprot_tpamb', 1)->nullable(true);
            $table->string('infprot_veraplic', 20)->nullable(true);
            $table->string('infprot_chnfe', 44)->nullable(true);
            $table->timestamp('infprot_dhrecbto', $precision = 0)->nullable(true);
            $table->string('infprot_nprot', 15)->nullable(true);
            $table->string('infprot_cstat', 3)->nullable(true);
            $table->string('infprot_xmotivo', 255)->nullable(true);

            $table->bigInteger('empresa_id');
            $table->bigInteger('usuario_id');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hnfex');
    }
}
