<script>
const caminho = "adm_atas/atas.control.php";
$(function(){
    $("#btn_novoBarraInferior").click(() => carregar_segundo_layout("btn_novo"));
    $("#btn_voltarBarraInferior").click(() => carregar_primeiro_layout());

    $("#dg_atas").datagrid({
        url:caminho,
        queryParams: {
            op:"load_datagrid",
            element:"dg_atas"
        }
    });
    
    $('#cbx_ata_tipo').combobox({
        onSelect: function(data){
            $('#cbx_ata_tipo').combobox('clear');
            $('#cbx_ata_tipo').combobox('reload', caminho + '?op=load_combobox&element=cbx_ata_tipo&ata_id='+data.id);
        }
    });

    
    configurando_fomulario_blablabla();
    configurando_click_abas();
    $("#btn_voltarBarraInferior").click();
});

const configurando_fomulario_blablabla = () => {
    $("#frm_cad_atas").form({
        url: caminho,
        ajax: 'true',
        iframe: false,
        onSubmit: function(param) {
            param.op = 'submit_form';
            param.element = "frm_cad_atas";
            //param.id_produto = $("#id_produto").val();
            
            let valida =  $("#frm_cad_atas").form('enableValidation').form('validate');
            if(!valida){
                msgNoty("Preencha os campos obrigatórios", "warning", "", 8000); 
            }
            return valida;
        },
        success: function(retorno) {
            let data = JSON.parse(retorno);
            if(data["retorno"] == "insert"){
                msgNoty("Salvo com sucesso!!!", "success", "", 8000);
                $("#frm_cad_atas").form("reset");
            }else{
                msgNoty("Erro ao sallet!!!", "warning", "", 8000);
            }
        }
    });
}
const configurando_click_abas = () => {
    $("#licoes_aprendidas").tabs({
        onSelect:function(title){
            if(title === "Ocorrência"){
                $("#id_combobox").combobox('reload', '${caminho}?op=load_form&element=id_fomulario');
                $("#id_fomulario").form('load', '${caminho}?op=load_form&element=id_fomulario&id_atas=${$("#id_atas").val()}'); 
            }
        }
    });
}
function carregar_primeiro_layout(origem){
    $("#textoBarrainferior").html("Registro de Ata de Reunião");
        $("#principal").show();
        $("#secundaria").hide();
        $("#barraInferior").show();
        $("#btn_novoBarraInferior").show();
        $("#btn_voltarBarraInferior").hide();
}
function carregar_segundo_layout(origem){
    $("#textoBarrainferior").html("Tipo da Ata");
    $("#principal").hide();
    $("#secundaria").show();
    $("#btn_novoBarraInferior").hide();
    $("#btn_voltarBarraInferior").show();
    $('#licoes_aprendidas').tabs('unselect', 'Ocorrência');
    $('#licoes_aprendidas').tabs('select', 'Ocorrência');
}




function onSelectDG(index, row) {}

function dg_ata_acoes(value, row, index) {
    //-Padrões sem ação de clique
    let btn_ver = '<a class="btn-datagrid" id_datagrid="#dg_atas" onclick="alert(\'em desenvolvimento\')"><i class="fas fa-eye"></i></a>';
    let btn_editar = '<a class="btn-datagrid" id_datagrid="#dg_atas" onclick="dg_ata_lapis(this)"><i class="fas fa-pencil-alt"></i></a>';
    // let btn_editar = '<a class="btn-datagrid" ><i style="color:#999;cursor:default;" class="fas fa-pencil-alt"></i></a>';
    let btn_remover_habilitado = '<a class="btn-datagrid" id_datagrid="#dg_atas" onclick="alert(\'Sem Função\')"><i class="fas fa-trash"></i></i></a>';
    let btn_remover_desabilitado = '<a class="btn-datagrid" ><i style="color:#999;cursor:default;" class="fas fa-trash"></i></i></a>';
    let btn_remover = (row.desc_status == '-') ? btn_remover_habilitado : btn_remover_desabilitado;
    return (row.num != '') ? btn_editar + '  ' + btn_ver + '  ' + btn_remover : value;
}
function dg_ata_lapis(target) {
    let dg = $(target).attr('id_datagrid');
    let index = getRowIndex(target);
    let row = $(dg).datagrid('getRows')[index];
    
    carregar_segundo_layout("btn_editar");
}

$('#tabs_atas').tabs({
    onBeforeClose: function(title){
        return confirm('Você tem certeza que quer fechar?' + title, function(r){
            var opts = $('tabs_atas').tabs('opts');
            var bc = onBeforeClose().clean();
            $('#dg_atas_tipo').tabs('close', index);
            opts.onBeforeClose = bc; 
        });
    }
});

function remover_pessoas_usuario(){
    $('tabs_atas').tabs(){
        onSelect().clear();
        $('#principal').hide();
        $('#secundaria').show();
        $('#btn_novoBarraInferior').hide();
        $('#licoes_aprendidas').tabs('unselect', 'Ocorrência');
        $('#licoes_aprendidas').tabs('select', 'Ocorrência');
    }
}

function clique_btn_remover_usuario (){
    $('tabs_atas').tabs(){
        onSelect().reload();
        $('#tabs_atas').tabs(){
            onclick().reload();
            $('#btn_novoBarraInferior').onSelect(remover_pessoas_usuario);
        }
    }
}

function clique_btn_novo(){
    $('tabs_atas').tabs({
        onSelect(=>{
            $('tabs_atas')=>{
                onSelect: function(rec){
            var url = 'get_data2.php?id='+rec.id;
            $('#cc2').combobox('reload', url);
                }}
        })
    })
}

function mode_user(){
    $('tabs_atas').tabs({
        onSelecct()=>({
            $('tabs_Atas').select('#botao_novo')
            ('#aba_inferior').close();
            ('#aba_superior').close();
            ('#botao_fechar').show();
            ('#botao_inferior').show();
            ('#botao_superior').show();
        })
    })
}

let botaoInferior = querySelector('#botao_inferior');
function(event){
    botaoInferior.eventDefault();

    botaoInferior.show();
    botaoSuperior.hide();
    $('barra_inferior').show();
    $('barra_superior').hide();
    $('barra_lateral').onClick('click', ()=>{
        $('#barra_lateral').show();
        $('#ata_tabs').tabs(){
            onSelect()=>(){
                tabs_ata('click', function(){
                    $('#botao_superior').show();
                    $('#botao_inferior').show();
                    $('#aba_lateral').hide();
                    $('#aba_inferior').show();
                    $('#aba_superior').hide();
                    $botaoSuperior('click', function(){
                        select(this)->botaoSuperior.hide();
                        select(this)->botaoInferior.show();
                        select(this)->botaoAbaEsquerda.hide();
                        select(this)->botaoAbaDireita.hide();
                        select(this)->abaInferior.show();
                        select(this)->abaSuperior.hide();
                    })
                })
            }
        }
    });
}

this->onSelect(event){
    this.eventDefault();
    this.errorMenssagem("Você clicou no link de adicionar! Especifique todas as informações necessãrias")
    event.e.load({
        afterLoad("click", principalFunction());
        load('click',('Avaliação') => {
            ajax(),
            id_usuario,
            id_venda,
            id_produto,
            valor_gasto,
            valor_parcial_porc,
            valor_negociado,
            dt_pagamento,
            dt_negociacao,
            dt_conc
            ajax{
                e.menssagem(),
                e.req_erro(event){
                    error_multi(event_compra) {
                    error_multi.preventDefault();
                };
                e.requisicao_erros("Errro ao preencher os campos, defina as caracteristicas do produto corretamente!")
                e.botao_enviar('noClick'()=>{
                    e.menssagem("Certeza que deseja descartar está ata, ao confirmar você apagara todos os dados desta ata preenchidos");
                    e.log_on("Você está logado em uma conta que não possui autorização para gerar este tipo de ata");
                    e.remendo.log("Se seu usuário estiver estiver errado, peça autorização a um que possui este tipo de acesso");  
                    e.compra_on("Data da compra não foi confirmada pelo caminho! verificar no campo de negociação")             
                })
                }
            }, 
            tipo_de_pauta(event){
                tipo_de_pauta.preventDefault();
                erro(event){
                    e.menssagem("A requisição desta pauta não está disponivel para este usuário");                  
                }
                onSelect('load', <a>load$msgforcaminhoLink==${id}.atas_tipo_pautas_tipo_link_comercial_empresas</a>){
                    ajax{
                        e.menssagem(prevent.menssagem);
                        e.log_on("Esteja logado para realizar a função corretamente");
                        e.remendo.log("não identificamos os seus direitos para está requisição");
                    }
                    let ajax_requisicoes;
                    afterLoad(event){
                        ajax_requisicoes.preventDefault();
                        ajax_requisicoes.undefined();
                        ajax.requisicoes = forms {
                            guerrer.ajax{
                                dados.doPaciente();
                                dados.doIniciante();
                                dados.doRequisitor();
                                dados.atas_id_uduario();
                                dados.atas_id_usuario_fk();
                                dados.atas_status_id();
                                dados.ata_tipo();
                                dados.ata_local();
                                dados.ata_data();
                                dados.ata_status();
                                dados.ata_id_usuario_fk();
                                dados.id_tipo();
                                dados.ata_id();
                                dados.ata_status();
                                dados.ata_id_usuario_cordena_fk();
                                dados.ata_id();
                                dados.ata_status();
                            };
                        };
                    }
                };

            }
        })
        })
}
function carregado_usuario()=>{
    afterLoad(){
        bota_barra_inferior.show();
        batao_barra_superior.show();
  };
};

?php{
    e.connect(event, e)

    function getConn(e){
        e.connect = 118.765.442-18
    }
}

e.requisicoes_de_mensagem("Erro de mensagem sem condições de pedido")
                e.botao_enviar('onClick'()=>{
                    e.menssagem("Todas as requisições não estao preenchidas corretamente");
                    e.log_on("pode haver uma ou mais mensagens com erro de preenchimento");
                    e.remendo.log("Se seu usuário estiver estiver errado, peça autorização a um que possui este tipo de acesso");
</script>

    <collection id='ordersDc' class='com.company'


    function seletar_outra_mensagem(onClick) {
        e.log('Erro de mensagem onde o campo preenchido não está autorizado!!')
        dados.ata_escolhida(e.log("Erro foi selecionado errado"));
    }

    id="dataGrid"
          width="100%"
          height="100%"
          dataContainer="customersDc">
    <columns includeAll="true"/>

    id="dataGrid"
        width="100%"
        height="100%"
        dataContainer="customersDc"
    <columns includeAll="true"/>

    function onSelectTreeGredd(){
        $('onClick').selectAll(const_seletor_de_atas){
            onClick.attAttas.upload(const_seletor_de_atas){
                onSelect(define.att);
            }
        }
    }

