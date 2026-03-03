/**
 * Funções Básicas necessárias no sistema.
 */
 const Principal = function() {

    /**
     * Busca no documento o elemnto HTML conforme ID.
     *
     * @param {string} sId Identificador do Elemento HTML
     * @returns {HTMLElement}
     */
    this.getElementoHtmlById = (sId) => {
        return document.getElementById(sId);
    }
    

    /**
     * Retorna o Modal de Produto se encontrado.
     *
     * @returns {HTMLDialogElement}
     */
    const modalProduto = () => {
        let oModal = this.getElementoHtmlById('modal_produto');
        return oModal || alert('Modal de Produto não encontrado!');
    };

    /**
     * Controla o Menu, habilitando/desabilitando o mesmo.
     *
     * @param {string} sIdMenu
     */
    const controlaMenuMobile = sIdMenu => {
        let oMenuMobile = this.getElementoHtmlById(sIdMenu);
        if (oMenuMobile) {
            if (oMenuMobile.classList.contains('menu_aberto')) {
                oMenuMobile.classList.replace('menu_aberto','menu_fechado');
            } else {
                oMenuMobile.classList.replace('menu_fechado','menu_aberto');
            }
        } else {
            alert('Menu não encontrado!');
        }
    }

    const carregaDadosProdutoNoModal = oDadosProduto => {
        let oModal = modalProduto();
        oModal.querySelector('img'                                            ).src       = oDadosProduto.imagem;
        oModal.querySelector('img'                                            ).alt       = oDadosProduto.nome;
        oModal.querySelector('.modal_produto_info .modal_produto_categoria'   ).innerText = oDadosProduto.categoria
        oModal.querySelector('.modal_produto_info .modal_produto_nome'        ).innerText = oDadosProduto.nome;
        oModal.querySelector('.modal_produto_info .modal_produto_descricao'   ).innerText = oDadosProduto.descricao;
        oModal.querySelector('.modal_produto_info .modal_produto_valor'       ).innerText = oDadosProduto.valor;
        oModal.querySelector('.modal_produto_info .modal_produto_acao_contato').href      = oDadosProduto.urlContato;
    }

    const limpaDadosProdutoDoModal = () => {
        let oModal = modalProduto();

        oModal.querySelector('img'                                            ).src       = "";
        oModal.querySelector('img'                                            ).alt       = "";
        oModal.querySelector('.modal_produto_info .modal_produto_categoria'   ).innerText = "";
        oModal.querySelector('.modal_produto_info .modal_produto_nome'        ).innerText = "";
        oModal.querySelector('.modal_produto_info .modal_produto_descricao'   ).innerText = "";
        oModal.querySelector('.modal_produto_info .modal_produto_valor'       ).innerText = "";
        oModal.querySelector('.modal_produto_info .modal_produto_acao_contato').href      = "";
    }

    return {

        /**
         * Abre o modal de produto, conforme id para busca das informações do mesmo.
         */
        abreModalProduto: (idProduto) => {
            $.get('/getDadosProduto/' + idProduto, (res) => {
                carregaDadosProdutoNoModal(res);
                modalProduto().showModal();
            });
        },

        /**
         * Fecha o modal de produto.
         */
        fechaModalProduto: () => {
            limpaDadosProdutoDoModal();
            modalProduto().close();
        },

        /**
         * Habilita/Desabilita (Controle) do menu de filtro Mobile.
         */
        controlaMenuFiltroMobile: () => {
            controlaMenuMobile('menu_filtro_mobile');
        },

        /**
         * Habilita/Desabilita (Controle) do menu de navegação Mobile.
         */
        controlaMenuNavegacaoMobile: () => {
            controlaMenuMobile('menu_navegacao_mobile');
        },

        /**
         * Evento de submit  do Formulario de recuperação de senha.
         * > Valida o Email do Usuário.
         *
         * @param {SubmitEvent} event
         */
        onSubmitFormularioRecuperacaoSenha: (event) => {
            //config ajax segurança CSRF
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //Evita o evento padrão que é default
            event.preventDefault();
            //recebe o campo do tipo email
            $.post(
                '/events/validaEmailUsuario',
                $(this).serialize(),
                (res, stat) => {
                    //Recebe a resposta e transforma o json em objeto
                    let oRes = JSON.parse(res);
                    // if (!oRes.emailValido) {
                        $('.mensagem').fadeIn('fast').html(oRes.mensagem);
                    // }
                }
            );
        },

        fechaMensagem : () => {
            $('.mensagem').toggleClass('esconde');
            $('.mensagem').fadeOut('slow');
        }

    }
}();
