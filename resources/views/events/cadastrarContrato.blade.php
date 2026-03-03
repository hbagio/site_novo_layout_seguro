@section('title', 'Fazendo Festa | Venda')
@extends('layouts.main')
@section('content')
    <section class="galeria">
        <div class="container">

            <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

            <h1 class="titulo_grande cor_escuro_50">Nova Venda</h1><br>
            <form class="card flex_col col_12" action="/events/storeContrato/" method="POST" enctype="multipart/form-data">
                @csrf



                <div class="container_campo col_10">

                    <label class="campo_label col_4">Nome Cliente</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="nome_cliente" id="nome_cliente"
                            value="{{ $pessoa->nome }}" readonly required>
                    </div>
                </div>
                <br>

                <div class="container_campo col_10">
                    <label class="campo_label col_4">Código Cliente</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="idpessoa" id="idpessoa"
                            value="{{ $pessoa->id }}" readonly required>
                    </div>

                    <label class="campo_label col_4">Cpf/Cnpj Cliente</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="cpfcnpj_cliente" id="cpfcnpj_cliente"
                            value="{{ $pessoa->cpfcnpj }}" readonly required>
                    </div>



                </div>
                <br>

                <div class="container_campo col_10">
                    <label class="campo_label col_4">Seguradora</label>

                    <script>
                        $(document).ready(function() {
                            // Inicialização dos Select2
                            $('#seguradora-select2').select2({
                                placeholder: "Digite para buscar uma seguradora",
                                allowClear: true
                            });

                            $('#ramo-select2').select2({
                                placeholder: "Digite para buscar um Ramo de Seguro",
                                allowClear: true
                            });

                            $('#parceiro-select2').select2({
                                placeholder: "Digite para buscar um Parceiro",
                                allowClear: true
                            });

                            // Mapeamento de todos os campos para o JS
                            const campos = {
                                valorLiquido: document.getElementById('valorliquido'),
                                percentualComissao: document.getElementById('percentualcomissao'),
                                percentualAdmin: document.getElementById('percentual_admin'),
                                comissao: document.getElementById('comissao'),
                                valorApagarParceiro: document.getElementById('valorapagarparceiro'),
                                percentualParceiro: document.getElementById('percentualparceiro'),
                                parceiroSelect: $('#parceiro-select2')
                            };

                            // Função principal que calcula tudo
                            function calcularTodos() {
                                const vl = parseFloat(campos.valorLiquido?.value) || 0;
                                const pc = (parseFloat(campos.percentualComissao?.value) || 0) / 100;
                                const pa = (parseFloat(campos.percentualAdmin?.value) || 0) / 100;
                                const pp = (parseFloat(campos.percentualParceiro?.value) || 0) / 100;

                                // Cálculo da comissão total (Líquido - taxa ADM * % Comissão)
                                const comissaoTotal = (vl - (vl * pa)) * pc;
                                campos.comissao.value = comissaoTotal.toFixed(2);

                                // Cálculo do valor do parceiro
                                const valorParceiro = comissaoTotal * pp;
                                campos.valorApagarParceiro.value = valorParceiro.toFixed(2);
                            }

                            // EVENTO DE SELEÇÃO DO PARCEIRO (SELECT2)
                            campos.parceiroSelect.on('select2:select', function(e) {
                                const data = e.params.data;
                                const element = $(data.element);
                                // Puxa o valor do atributo data-percentual que adicionamos no HTML
                                const percentual = parseFloat(element.data('percentual')) || 0;

                                if (campos.percentualParceiro) {
                                    campos.percentualParceiro.value = percentual.toFixed(2);
                                }
                                calcularTodos();
                            });

                            // Caso limpe a seleção do parceiro
                            campos.parceiroSelect.on('select2:unselect', function() {
                                campos.percentualParceiro.value = "0.00";
                                calcularTodos();
                            });

                            // Eventos de saída de campo (blur) para os demais inputs
                            $('#valorliquido, #percentualcomissao, #percentual_admin, #percentualparceiro').on('blur', function() {
                                let valor = parseFloat($(this).val()) || 0;
                                if ($(this).attr('id') !== 'valorliquido') {
                                    if (valor < 0) $(this).val(0);
                                    if (valor > 100) $(this).val(100);
                                }
                                calcularTodos();
                            });

                            // Cálculo inicial
                            calcularTodos();
                        });
                    </script>

                    <div class="campo">
                        <select name="seguradora" id="seguradora-select2" class="form-control" required
                            style="width: 100%;">
                            <option value="">Selecione uma seguradora</option>
                            <option value="AIG">AIG</option>
                            <option value="Akad">Akad Seguros</option>
                            <option value="Allianz">Allianz</option>
                            <option value="Allseg">Allseg seguros</option>
                            <option value="Amil">Amil</option>
                            <option value="Avla">aVLa</option>
                            <option value="AXA">AXA</option>
                            <option value="AZOS">AZOS</option>
                            <option value="Azul Seguros">Azul Seguros</option>
                            <option value="Berklee">Berklee</option>
                            <option value="Bradesco Seguros">Bradesco Seguros</option>
                            <option value="CENTAURO">CENTAURO</option>
                            <option value="CHUBB">CHUBB</option>
                            <option value="EZZE">EZZE</option>
                            <option value="HDI">HDI Seguros</option>
                            <option value="Icatu">Icatu Seguros</option>
                            <option value="Itaú Seguros">Itaú Seguros</option>
                            <option value="Junto">Junto Seguros</option>
                            <option value="Justos">Justos Seguros</option>
                            <option value="kovr">kovr seguradora</option>
                            <option value="MAG">MAG Seguros</option>
                            <option value="Mapfre">Mapfre Seguros</option>
                            <option value="MetLife">MetLife</option>
                            <option value="Mitsui">Mitsui</option>
                            <option value="Omint">Omint Saúde</option>
                            <option value="Porto Seguro">Porto Seguro</option>
                            <option value="Pottencial">Pottencial</option>
                            <option value="Prudential">Prudential</option>
                            <option value="SOMPO">SOMPO Seguros</option>
                            <option value="Sancor">Sancor Seguros</option>
                            <option value="SulAmérica">SulAmérica</option>
                            <option value="Sura">Sura</option>
                            <option value="Swiss Re">Swiss Re</option>
                            <option value="Tokio Marine">Tokio Marine</option>
                            <option value="Unimed">Seguros Unimed</option>
                            <option value="Usebens">usebens Seguradora</option>
                            <option value="Yelum">Yelum</option>
                            <option value="ZURICH">ZURICH Seguros</option>
                        </select>
                    </div>

                    <label class="campo_label col_4">Ramo</label>
                    <div class="campo">
                        <select name="ramo" id="ramo-select2" class="form-control" required style="width: 100%;">
                            <option value="">Selecione uma Ramo</option>
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
                </div>
                <br>

                <div class="container_campo col_10">
                    <label class="campo_label col_4">Apólice</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="numeroapolice" id="numeroapolice" required>
                    </div>

                    <label class="campo_label col_4">Valor Bruto R$</label>
                    <div class="campo">
                        <input type="number" step="0.01" min="0.01" class="form-control" name="valor"
                            id="valor" required>
                    </div>
                </div>
                <br>

                <div class="container_campo col_10">
                    <label class="campo_label col_4">Valor Liquido R$</label>
                    <div class="campo">
                        <input type="number" step="0.01" min="0.01" class="form-control" name="valorliquido"
                            id="valorliquido" required>
                    </div>

                    <label class="campo_label col_4">% Comissão Corretora</label>
                    <div class="campo">
                        <input type="number" step="0.01" min="0.01" class="form-control"
                            name="percentualcomissao" id="percentualcomissao" required>
                    </div>
                </div>
                <br>

                <div class="container_campo col_10">
                    <label class="campo_label col_4">% Repasse ADM</label>
                    <div class="campo">
                        <input type="number" step="0.00" min="0.00" class="form-control"
                            name="percentual_admin" id="percentual_admin" required>
                    </div>

                    <label class="campo_label col_4">Valor da Comissão R$</label>
                    <div class="campo">
                        <input type="number" step="0.00" min="0.00" class="form-control" name="comissao"
                            id="comissao" required>
                    </div>
                </div>
                <br>

                <div class="container_campo col_10">
                    <label class="campo_label col_4">Quantidade Parcelas</label>
                    <div class="campo">
                        <input type="numeric" step="0" min="1" class="form-control" name="parcelas"
                            id="parcelas" required>
                    </div>

                    <label class="campo_label col_4">Forma Pagamento</label>
                    <div class="campo">
                        <select name="forma_pagamento" id="forma_pagamento" class="form-control" required>
                            <option value="">Selecione uma forma de pagamento</option>
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
                </div>
                <br>

                <div class="container_campo col_10">
                    <label class="campo_label col_4">Parceiro</label>
                    <div class="campo">
                        <select name="parceiro_id" id="parceiro-select2" class="form-control" required
                            style="width: 100%;">
                            <option value="">Selecione um Parceiro</option>
                            @foreach ($parceiros as $parceiro)
                                <option value="{{ $parceiro->id }}" data-percentual="{{ $parceiro->percentual }}">
                                    {{ ' - ' . $parceiro->nome . ' - %' . $parceiro->percentual }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <label class="campo_label col_4">% Acordo Parceiro</label>
                    <div class="campo">
                        <input type="number" step="0.01" min="0.01" class="form-control"
                            name="percentualparceiro" id="percentualparceiro" value="0.00" readonly required>
                    </div>
                </div>
                <br>

                <div class="container_campo col_10">
                    <label class="campo_label col_4">Valor A Pagar</label>
                    <div class="campo">
                        <input type="number" step="0.01" min="0.01" class="form-control"
                            name="valorapagarparceiro" id="valorapagarparceiro" readonly required>
                    </div>

                    <label class="campo_label col_4">Documento Apólice</label>
                    <div class="campo">
                        <input type="file" name="apolice" id="apolice" required>
                    </div>
                </div>
                <br>

                <div class="container_campo col_10 ">
                    <label class="campo_label col_4">Data Inicio Vigência</label>
                    <div class="campo">
                        <input type="date" name="datainicio" required>
                    </div>

                    <label class="campo_label col_4">Data Fim Vigência</label>
                    <div class="campo">
                        <input type="date" name="datafim" required>
                    </div>
                </div>
                <br>

                <div class="container_campo col_10">
                    <label class="campo_label col_4">Observações</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="observacoes" id="observacoes">
                    </div>
                </div>

                <br>
                <input type="submit" class="card_acao col_10" value="Cadastrar"><br>
                <a href="/events/consultaPessoas" class="card_acao muted col_5">Voltar</a>
            </form>
        </div>
    </section>
@endsection
