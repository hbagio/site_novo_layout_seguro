@section('title', 'Fazendo Festa | Produto')
@extends('layouts.main')
@section('content')
    <section class="galeria">
        <div class="container">
            <h1 class="titulo_grande cor_escuro_50">Alterar Contrato</h1><br>
            <form class="card flex_col col_12" action="/events/updateContrato/" method="POST" enctype="multipart/form-data">
                {{-- Diretiva necessário por segurança, senão não deixar fazer o request --}}
                @csrf
                <div class="container_campo col_10">
                    <label class="campo_label col_3">Código Contrato</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="id" id="id"
                            value="{{ $contrato->id }}" readonly required>
                    </div>
                    <label class="campo_label col_3">Código Cliente</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="idpessoa" id="idpessoa"
                            value="{{ $contrato->idpessoa }}" readonly required>
                    </div>
                    <label class="campo_label col_5">Situação</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="situacao" id="situacao"
                            @if ($contrato->situacao == 1) value="Ativo"
                    @else
                       value = "Inativo" @endif
                            readonly required>

                    </div>
                </div>
                <br>

                <div class="container_campo col_10">
                    <label class="campo_label col_3">Nome Cliente</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="pessoa_nome" id="pessoa_nome"
                            value="{{ $contrato->pessoa_nome }}" readonly required>
                    </div>

                    <label class="campo_label col_3">Cpf/Cnpj </label>
                    <div class="campo">
                        <input type="text" class="form-control" name="pessoa_cpfcnpj" id="pessoa_cpfcnpj"
                            value="{{ $contrato->pessoa_cpfcnpj }}" readonly required>
                    </div>
                </div>
                <br>
                <div class="container_campo col_10 ">
                   <input type="hidden" name="parceiro_id" value="{{ $contrato->parceiro_id }}">
                    <label class="campo_label col_5">Nome Parceiro</label>
                    <div class="campo">
                        <input type="text" name="parceiro_nome" id="parceiro_nome"
                            value="{{  $contrato->parceiro_nome }}" readonly required>
                    </div>

                    <label class="campo_label col_5">Cpf/Cnpj Parceiro</label>
                    <div class="campo">
                        <input type="text" name="parceiro_cpfcnpj" name="parceiro_cpfcnpj"
                            value="{{ $contrato->parceiro_cpfcnpj }}" readonly required>
                    </div>


                </div>
                <br>

                <div class="container_campo col_10 ">
                    <label class="campo_label col_5">% Parceiro</label>
                    <div class="campo">
                        <input type="text" name="percentualparceiro" name="percentualparceiro"
                            value="{{ $contrato->percentualparceiro }}" readonly required>
                    </div>

                    <label class="campo_label col_5">Valor a Pagar Parceiro</label>
                    <div class="campo">
                        <input type="text" name="valorapagarparceiro" name="valorapagarparceiro"
                            value="{{ $contrato->valorapagarparceiro }}" required>
                    </div>


                </div>
                <br>
                <br>
                <div class="container_campo col_10">


                    <label class="campo_label col_5">Seguradora</label>
                    <div class="campo">
                        <select name="seguradora" id="seguradora" class="form-control" required style="width: 100%;">
                            <option value="{{ $contrato->seguradora }}">{{ $contrato->seguradora }}</option>
                            <option value="AIG">AIG</option>
                            <option value="Akad Seguros">Akad Seguros</option>
                            <option value="Allianz">Allianz</option>
                            <option value="Allseg seguros">Allseg seguros</option>
                            <option value="Amil">Amil</option>
                            <option value="Avla">Avla</option>
                            <option value="AXA">AXA</option>
                            <option value="AZOS">AZOS</option>
                            <option value="Azul Seguros">Azul Seguros</option>
                            <option value="Berklee">Berklee</option>
                            <option value="Bradesco Seguros">Bradesco Seguros</option>
                            <option value="CENTAURO">CENTAURO</option>
                            <option value="CHUBB">CHUBB</option>
                            <option value="EZZE">EZZE</option>
                            <option value="HDI Seguros">HDI Seguros</option>
                            <option value="catu Seguros">Icatu Seguros</option>
                            <option value="Itaú Seguros">Itaú Seguros</option>
                            <option value="Junto Seguros">Junto Seguros</option>
                            <option value="Justos Seguros">Justos Seguros</option>
                            <option value="kovr seguradora">kovr seguradora</option>
                            <option value="MAG Seguros">MAG Seguros</option>
                            <option value="Mapfre Seguros">Mapfre Seguros</option>
                            <option value="MetLife">MetLife</option>
                            <option value="Mitsui">Mitsui</option>
                            <option value="Omint Saúde">Omint Saúde</option>
                            <option value="Porto Seguro">Porto Seguro</option>
                            <option value="Pottencial">Pottencial</option>
                            <option value="Prudential">Prudential</option>
                            <option value="SOMPO Seguro">SOMPO Seguros</option>
                            <option value="Sancor Seguros">Sancor Seguros</option>
                            <option value="SulAmérica">SulAmérica</option>
                            <option value="Sura">Sura</option>
                            <option value="Swiss Re">Swiss Re</option>
                            <option value="Tokio Marine">Tokio Marine</option>
                            <option value="Seguros Unimed">Seguros Unimed</option>
                            <option value="Usebens Seguradora">Usebens Seguradora</option>
                            <option value="Yelum">Yelum</option>
                            <option value="ZURICH Seguros">ZURICH Seguros</option>
                        </select>
                    </div>

                    <label class="campo_label col_5">Ramo</label>
                    <div class="campo">
                        <select name="ramo" id="ramo" class="form-control" required style="width: 100%;">
                            <option value="{{ $contrato->ramo }}">{{ $contrato->ramo }}</option>
                            <option value="Seguro Automóvel"> Seguro de Automóvel</option>
                            <option value="Seguro Automóvel"> Seguro de Frota/Caminhão</option>
                            <option value="Seguro de Vida">Seguro de Vida</option>
                            <option value="Seguro Saúde (Planos de Saúde)">Seguro Saúde (Planos de Saúde)</option>
                            <option value="Seguro Residencial">Seguro Residencial</option>
                            <option value="Seguro de Transportes e Cargas">Seguro de Transportes e Cargas</option>
                            <option value="Seguro Agrícola (Rural)">Seguro Agrícola (Rural)</option>
                            <option value="Seguro Habitacional">Seguro Habitacional</option>
                            <option value="Seguro de Responsabilidade Civil">Seguro de Responsabilidade Civil</option>
                            <option value="Seguro Garantia">Seguro Garantia</option>
                            <option value="Seguro Empresarial (Multirrisco)">Seguro Empresarial (Multirrisco)</option>
                            <option value="Seguro de Equipamentos Portáteis (Celulares)">Seguro de Equipamentos Portáteis
                                (Celulares)</option>
                            <option value="Seguro Viagem">Seguro Viagem</option>
                            <option value="Seguro Pet">Seguro Pet</option>
                            <option value="Seguro Cibernético">Seguro Cibernético</option>
                            <option value="Seguro de Eventos">Seguro de Eventos</option>
                            <option value="Previdência Privada (VGBL/PGBL)">Previdência Privada (VGBL/PGBL)</option>
                            <option value="Outros">Outros</option>
                        </select>
                    </div>
                    <label class="campo_label col_5">Apólice</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="numeroapolice" id="numeroapolice"
                            value="{{ $contrato->numeroapolice }}" required>
                    </div>
                </div>
                <br>

                <div class="container_campo col_10">
                    <label class="campo_label col_5">Valor Bruto R$</label>
                    <div class="campo">
                        <input type="number" step="0.01" min="0.01" class="form-control"name="valor"
                            id="valor" value="{{ $contrato->valor }}" required>
                    </div>

                    <label class="campo_label col_5">Valor Liquido R$</label>
                    <div class="campo">
                        <input type="number" step="0.01" min="0.01" class="form-control"name="valorliquido"
                            id="valorliquido" value="{{ $contrato->valorliquido }}" required>
                    </div>
                    <label class="campo_label col_5">% Repasse ADM</label>
                    <div class="campo">
                        <input type="number" step="0.01" min="0.01" class="form-control"name="percentual_admin"
                            id="percentual_admin" value="{{ $contrato->percentual_admin }}" required>
                    </div>


                </div>
                <br>

                <div class="container_campo col_10">

                    <label class="campo_label col_5">% Comissão</label>
                    <div class="campo">
                        <input type="number" step="0.01" min="0.01" class="form-control"name="percentualcomissao"
                            id="percentualcomissao" value="{{ $contrato->percentualcomissao  }}" required>
                    </div>

                    <label class="campo_label col_5">Comissão R$</label>
                    <div class="campo">
                        <input type="number" step="0.01" min="0.01" class="form-control"name="comissao"
                            id="comissao" value="{{ $contrato->comissao }}" required>
                    </div>

                    <label class="campo_label col_5">Parcelas</label>
                    <div class="campo">
                        <input type="number" step="0.01" min="0.01" class="form-control"name="parcelas"
                            id="parcelas" value="{{ $contrato->parcelas }}" required>
                    </div>



                </div>
                <br>



                <div class="container_campo col_10 ">
                     <label class="campo_label col_5">Forma Pagamento</label>
                    <div class="campo">
                            <select name="forma_pagamento" id="forma_pagamento" class="form-control" required>
                            <option value="{{ $contrato->forma_pagamento }}">{{ $contrato->forma_pagamento }}</option>
                            <option value="PIX">PIX</option>
                            <option value="Cartão de Crédito">Cartão de Crédito</option>
                            <option value="Cartão de Débito">Cartão de Débito</option>
                            <option value="Boleto Bancário">Boleto Bancário</option>
                            <option value="Transferência Bancária">Transferência Bancária</option>
                            <option value="Dinheiro">Dinheiro</option>
                            <option value="PayPal">PayPal</option>
                            <option value="PicPay">PicPay</option>
                            <option value="Mercado Pago">Mercado Pago</option>
                            <option value="Cheque">Cheque</option>
                        </select>
                    </div>

                    <label class="campo_label col_5">Data Inicio</label>
                    <div class="campo">
                        <input type="date" name="datainicio" name="datainicio" placeholder="Data Inicio Apolice"
                            value="{{ $contrato->datainicio }}" required>
                    </div>

                    <label class="campo_label col_5">Data Fim</label>
                    <div class="campo">
                        <input type="date" name="datafim" name="datafim" placeholder="Data Vencimento Apolice"
                            value="{{ $contrato->datafim }}" required>
                    </div>

                </div>

                <br>
                <div class="container_campo col_10 ">
                    <label class="campo_label col_3">Apólice Atual</label>
                    <div class="campo">
                        @if (isset($contrato->apolice) && !empty($contrato->apolice))
                            <a href="/img/apolice/{{ $contrato->apolice }}" target="_blank" class="btn-link">
                                Ver Contrato
                            </a>
                        @else
                            <span style="color: #999; font-style: italic;">Não possui contrato</span>
                        @endif
                    </div>
                    <label class="campo_label col_4">Nova Apólice</label>
                    <div class="campo">
                        <input type="file" accept= ".pdf" name="apolice" id="apolice">
                    </div>
                </div>
                <br>
                <div class="flex_row col_10">
                    <input type="submit" class="card_acao" value="Alterar" style="margin-right:30px">
                    <a class="card_acao muted " href="/events/consultaContratos" style="margin-right:5px">Voltar</a>
                </div>
            </form>
        </div>
    </section>
@endsection
