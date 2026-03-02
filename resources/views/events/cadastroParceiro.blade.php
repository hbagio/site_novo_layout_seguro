@section('title', 'Bagio Seguros | Parceiro')
@extends('layouts.main')
@section('content')
    <section class="galeria">
        <div class="container">
            <h1 class="titulo_grande cor_escuro_50">Cadastro de Parceiros</h1><br>
            <form class="card flex_col col_12" action="/events/incluirParceiro" method="POST" enctype="multipart/form-data">
                {{-- Diretiva necessário por segurança, senão não deixar fazer o request --}}
                @csrf
                <div class="container_campo col_10">
                    <label class="campo_label col_3">Nome</label>
                    <div class="campo">
                        <input type="text" class="form-control" name="nome" id="nome"
                            placeholder="Nome da Pessoa" required>
                    </div>
                </div>
                <br>
                <div class="container_campo col_10">
                    <label class="campo_label col_3">Tipo</label>
                    <div class="campo">
                        <select name="tipo" style="text-align: left" required>
                            <option value="0"> Fisica</option>
                            <option value="1"> Juridica</option>
                        </select>

                    </div>
                    <label class="campo_label col_3">Data de Nascimento</label>
                    <div class="campo">
                        <input type="date" class="form-control" name="data_nascimento" id="data_nascimento"
                            placeholder="Data de Nascimento" >
                    </div>


                </div>
                <br>
                <div class="container_campo col_10">
                    <label class="campo_label col_3">Cpf/Cnpj</label>
                    <div class="campo">
                        <input type="text" class="form-control"name="cpfcnpj" id="cpfcnpj"
                            placeholder="Cpf/Cnpj do Parceiro" required>
                    </div>
                    <label class="campo_label col_3">RG</label>
                    <div class="campo">
                        <input type="text" class="form-control"name="rg" id="rg"
                            placeholder="RG do Parceiro" >
                    </div>
                </div>
                <br>
                <div class="container_campo col_10">
                    <label class="campo_label col_3">Logradouro</label>
                    <div class="campo">
                        <input type="text" class="form-control"name="endereco" id="endereco" required
                            placeholder="Endereço da Parceiro">
                    </div>
                </div>
                <br>
                <div class="container_campo col_10">

                    <label class="campo_label col_3">Bairro</label>
                    <div class="campo">
                        <input type="text" class="form-control"name="bairro" id="bairro" required
                            placeholder="Bairro do Parceiro">
                    </div>

                    <label class="campo_label col_3">Cidade</label>
                    <div class="campo">
                        <input type="text" class="form-control"name="cidade" id="cidade" required
                            placeholder="Cidade do Parceiro">
                    </div>
                </div>
                <br>
                <div class="container_campo col_10">


                    <label class="campo_label col_3">Cep</label>
                    <div class="campo">
                        <input type="text" class="form-control"name="cep" id="cep" required
                            placeholder="Formato 99999-99" maxlength="9" minlength="9">
                    </div>

                    <label class="campo_label col_3">Estado</label>
                    <div class="campo">
                        <div class="campo">
                            <select name="estado" style="text-align: left" required>
                                <option value="SC - Santa Catarina">SC - Santa Catarina</option>
                                <option value="AC - Acre">AC - Acre</option>
                                <option value="AL - Alagoas">AL - Alagoas</option>
                                <option value="AP - Amapá">AP - Amapá</option>
                                <option value="AM - Amazonas">AM - Amazonas</option>
                                <option value="BA - Bahia">BA - Bahia</option>
                                <option value="CE - Ceará">CE - Ceará</option>
                                <option value="ES - pírito Santo">ES - pírito Santo</option>
                                <option value="GO - Goiás">GO - Goiás</option>
                                <option value="MA - Maranhão">MA - Maranhão</option>
                                <option value="MT - Mato Grosso">MT - Mato Grosso</option>
                                <option value="MS - Mato Grosso do Sul">MS - Mato Grosso do Sul</option>
                                <option value="MG - Minas GeraisG">MG - Minas Gerais</option>
                                <option value="PA - Pará">PA - Pará</option>
                                <option value="PB - Paraíba">PB - Paraíba</option>
                                <option value="PR - Paraná">PR - Paraná</option>
                                <option value="PE - Pernambuco">PE - Pernambuco</option>
                                <option value="PI - Piauí">PI - Piauí</option>
                                <option value="RJ - Rio de Janeiro">RJ - Rio de Janeiro</option>
                                <option value="RN - Rio Grande do Norte">RN - Rio Grande do Norte</option>
                                <option value="RS - Rio Grande do Sul">RS - Rio Grande do Sul</option>
                                <option value="RO - Rondônia">RO - Rondônia</option>
                                <option value="RR - Roraima">RR - Roraima</option>
                                <option value="SP - São Paulo">SP - São Paulo</option>
                                <option value="SE - Sergipe">SE - Sergipe</option>
                                <option value="TO - Tocantins">TO - Tocantins</option>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="container_campo col_10">
                    <label class="campo_label col_3">Telefone</label>
                    <div class="campo">
                        <input type="text" class="form-control"name="telefone" id="telefone" required
                            placeholder="Telefone do Parceiro">
                    </div>

                    <label class="campo_label col_3">Email</label>
                    <div class="campo">
                        <input type="email" class="form-control"name="email" id="email" 
                            placeholder="Email do Parceiro">
                    </div>
                </div>
                <br>
                <div class="container_campo col_10">
                    <label class="campo_label col_3">Banco</label>
                    <div class="campo">
                        <input type="text" class="form-control"name="banco" id="banco"
                            placeholder="Banco">
                    </div>
                    <label class="campo_label col_3">Agência</label>
                    <div class="campo">
                        <input type="text" class="form-control"name="agencia" id="agencia"
                            placeholder="Agência">
                    </div>
                </div>
                <br>
                <div class="container_campo col_10">
                    <label class="campo_label col_3">Conta</label>
                    <div class="campo">
                        <input type="text" class="form-control"name="conta" id="conta"
                            placeholder="Conta">
                    </div>
                    <label class="campo_label col_3">Chave Pix</label>
                    <div class="campo">
                        <input type="text" class="form-control"name="pix" id="pix"
                            placeholder="Chave Pix">
                    </div>
                </div>
                <br>
                <div class="container_campo col_10">
                    <label class="campo_label col_3">Parcentual Acordo</label>
                    <div class="campo">
                        <input type="number" step="0.01" min="0" max="100" lang="pt-BR"
                            placeholder="0,00" class="form-control"name="percentual" id="percentual" required>
                    </div>
                    <label class="campo_label col_3">Contrato</label>
                    <div class="campo">
                        <input type="file" accept= ".pdf" name="contrato" id="contrato">
                    </div>
                </div>
                <br>
                <div class="container_campo col_10">
                  <label class="campo_label col_3">Informações Adicionais</label>
                    <div class="campo">
                        <textarea  class="form-control"name="observacoes" id="observacoes"
                            rows="4" cols="50" placeholder="Informações Adicionais"></textarea>
                    </div>
                </div>
                <br>

                <input type="submit" class="card_acao col_5" value="Cadastrar Parceiro">
                <br>

                <a class="card_acao muted col_3" href="/events/consultaParceiros" style="margin-right:5px">Voltar</a>

            </form>
        </div>
    </section>
@endsection
