<link href="js/jquery-easyui-1.8.1/themes/material-teal/easyui.css" rel="stylesheet" type="text/css"/>
<link href="js/jquery-easyui-1.8.1/themes/icon.css" rel="stylesheet" type="text/css"/>
<link href="js/jquery-easyui-1.8.1/themes/color.css" rel="stylesheet" type="text/css"/>
<link href="adm_atas/css/atas.css" rel="stylesheet" type="text/css"/>


<meta charset="utf-8">


<h1 class="verde">Atas de Reunião</h1>
<input type="hidden" id="id_atas" value="0"/>


<!-- GRID DE ATAS -->


<div id="principal" style="width:100%; height:calc(100% - 127px);">

    <div style="display:flex; padding: 15px 10px 10px 10px;">
        <div style="flex: 1; height: 500px;">

            <table 
                class="easyui-datagrid" 
                id="dg_atas" 
                style="width:100%; height:100%;" >
                <thead>
					<tr>
						<th data-options="field:'data',align: 'center', width: '10%',sortable:true">Data</th>
						<th data-options="field:'tipo',align: 'center', width: '15%',sortable:true">Tipo</th>
						<th data-options="field:'pauta',align: 'center', width: '55%',sortable:true">compras</th>
						<th data-options="field:'status',align: 'center', width: '10%',sortable:true">Status</th>
						<th data-options="field: 'actions', align: 'center', width: '10%', formatter: dg_ata_acoes">Opções</th>
					</tr>
				</thead>
            </table>
        </div>
    </div>
</div>




<div id="secundaria">

	<div class="easyui-layout" id="layout_cadastro">
		<div class="easyui-tabs" id="tabs_atas" selected="0" style="width:100%;height:100%">				

					<div title="Pauta">
						<div style="display: flex;">
							<div style="flex: 1; padding: 15px 10px 10px 10px;">
								<legend style="color:coral;font-weight: bold;padding-bottom: 5px !important;" >Cadastro da Ata</legend>


								<form class="a-form" id="frm_cad_atas" method="post" enctype="multipart/form-data" novalidate>
									<div style="flex: 1; padding: 0px 0px 0px 0px;">
										<select class="easyui-combobox" name="cbx_ata_tipo" id="cbx_ata_tipo" style="width:100%;" data-options="label:'Tipo',labelPosition:'top'">
											<option selected="true" value="0">Defina o tipo</option>
											<option value="1">Compras | Geral</option>
											<option value="2">Compras | ACD</option>
											<option value="3">Compras | R&O</option>
											<option value="4">Compras | Desempenho</option>
											<option value="5">Cliente</option>
											<option value="6">Fornecedor</option>
											<option value="7">Outros</option>
										</select>
									</div>
									<div style="flex: 1; padding: 10px 10px 0px 0px;">
										<input class="easyui-combobox" name="cbx_local_interno" id="cbx_local_interno" data-options="label:'Local',labelPosition:'top',panelHeight:'auto',panelMinHeight:'5px',panelMaxHeight:'150px',valueField:'id',textField:'text'" style="width:100%" required>
									</div>
									<div style="display: flex;">
										<div style="flex: 2; padding: 10px 10px 0px 0px;">
											<input class="easyui-datebox" required name="date_ata_data" id="date_ata_data" style="width:100%" data-options="label:'Data de Abertura',labelPosition:'top'">
										</div>
										<div style="flex: 1; padding: 10px 0px 0px 10px;">
											<input class="easyui-textbox" name="txt_ata_pessoas" id="txt_ata_pessoas" data-options="label:'Pessoas',labelPosition:'top'" style="width:100%" >
										</div>
									</div>
									<div style="flex: 1; padding: 10px 0px 0px 0px;">
										<input class="easyui-combobox" name="cbx_ata_coord" id="cbx_ata_coord" data-options="label:'Coordenador',labelPosition:'top',panelHeight:'auto',panelMinHeight:'5px',panelMaxHeight:'150px',valueField:'id',textField:'text'" style="width:100%;">
									</div>
									
									<div style="display: flex;">
										<div style="flex: 2; padding: 10px 0px 0px 0px;">
											<input class="easyui-textbox" name="txt_ata_status" id="txt_ata_status" data-options="label:'Status',labelPosition:'top'" style="width:100%" >						
										</div>
										<div style="flex: 1; padding: 10px 0px 10px 10px;">
											<a id="btn_ata_pauta_inclui" class="btn btn-success" style="width:100%; margin-top:30px;" onclick="$('#frm_cad_atas').form('submit');">Salvar</a>
										</div>
									</div>
								</form>


								
							<script>
								// Obtenha a referência para o elemento select pelo ID
								const selectElement = document.getElementById('cbx_compras_tipo');

							
								selectElement.addEventListener('change', function() {
									// Obtenha o texto da opção selecionada
									const opcaoSelecionada = selectElement.options[selectElement.selectedIndex].text;
									
									// Exiba um alerta com o texto da opção selecionada
									alert('Opção selecionada: ' + opcaoSelecionada);
								});
						

					
							</script>


							</div>

							<div style="flex: 2; padding: 15px 10px 10px 10px;">
								<legend style="color:red;font-weight: bold;padding-bottom: 5px !important;" >Assunto</legend>

								<form id="frm_assu_cad_atas" method="post" enctype="multipart/form-data" novalidate>
									<div style="display: flex;">
										<div style="flex: 4; padding: 0px 10px 0px 0px;">
											<input class="easyui-textbox" name="txt_ata_pauta" id="txt_ata_pauta" data-options="label:'Pauta / Tema',labelPosition:'top'" style="width:100%" >
										</div>
										<div style="flex: 1; padding: 10px 0px 10px 10px;">
											<a id="btn_ata_pauta_inclui" class="btn btn-success" style="width:100%; margin-top:30px;" onclick="$('#frm_assu_cad_atas').form('submit');">Incluir</a>
										</div>
									</div>
								</form>
								<table   class="easyui-datagrid" id="dg_pauta_ata"
								data-options="nowrap:false, showFooter:true, striped:true, singleSelect:true, fitColumns:true,remoteSort:false,multiSort:true,loadMsg:'Carregando ...',emptyMsg:'Dados não encontrados!',rowStyler:rowStyler,onBeforeEdit:onBeforeEdit,onAfterEdit:onAfterEdit" style="width:100%; height:320px;">
									<thead><tr>
										<th data-options="field:'nome1',align: 'center', title: 'Item',width: '5%'"></th>
										<th data-options="field:'nome2',align: 'left', title: 'Pauta',width: '60%'"></th>
										<th data-options="field:'nome3',align: 'center', title: 'Status',width: '20%'"></th>
										<th data-options="field:'nome4',align: 'center', title: 'Opções',width: '15%'"></th>
									</tr></thead>
									<tbody>
										<tr>
											<td>01</td>
											<td>Compra um</td>
											<td>Ausente</td>
											<td>Lap | olho | Lix</td>
										</tr>
										<tr>
											<td>02</td>
											<td>Compra dois</td>
											<td>Confirmadas</td>
											<td>Lap | olho | Lix</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>

					</div>

					<div title="Equipe">
		
						<!-- <div style="display: flex;">
							<div style="flex: 1; padding: 10px 0px 0px 10px;">
								<legend style="color:red;font-weight: bold;padding-bottom: 5px !important;" >Internos</legend>
								<form class="a-form" id="frm_colab_eq_cadastro_proj_new" method="post" enctype="multipart/form-data" novalidate>
									<div style="display: flex;">
										<div style="flex: 4; flex-grow: 4; padding: 0px 0px 0px 0px;">
											<input type="hidden" id="id_eq" name="id_eq" value="-1" />
											<input class="easyui-combobox" required name="cbx_cad_eq_colab" id="cbx_cad_eq_colab" data-options="label:'Colaborador',labelPosition:'top',panelHeight:'auto',panelMinHeight:'5px',panelMaxHeight:'150px',valueField:'id',textField:'text'" style="width:100%">
										</div>
										<div style="flex: 1; flex-grow: 1; padding: 0px 0px 10px 10px;">
											<a id="btn_incluir_colab_eq_cadastro_proj_new" class="btn btn-success" style="width:100%; margin-top:30px;" onclick="$('#frm_colab_eq_cadastro_proj_new').form('submit');">Incluir</a>
										</div>
									</div>
								</form>
								<div style="flex: 1; padding: 10px 0px 0px 10px;">


							</div>

							<div style="flex: 1; padding: 10px 0px 0px 10px;">
								<legend style="color:red;font-weight: bold;padding-bottom: 5px !important;" >Externos</legend>
								<form class="a-form" id="frm_colab_eq_cadastro_proj_new" method="post" enctype="multipart/form-data" novalidate>
									<div style="display: flex;">
										<div style="flex: 1; flex-grow: 1; padding: 0px 10px 0px 0px;">
											<input type="hidden" id="id_eq" name="id_eq" value="-1" />
											<input class="easyui-switchbutton"  value="0" id="swtb_encerra_proj" name="swtb_encerra_proj" data-options="label:'Tipo',labelPosition:'top',onText:'Cliente',offText:'Fornecedor'" style="width:100%;">
										</div>
										<div style="flex: 2; flex-grow: 2; padding: 0px 10px 0px 0px;">
											<input type="hidden" id="id_eq" name="id_eq" value="-1" />
											<input class="easyui-combobox" required name="cbx_cad_eq_colab" id="cbx_cad_eq_colab" data-options="label:'Empresa',labelPosition:'top',panelHeight:'auto',panelMinHeight:'5px',panelMaxHeight:'150px',valueField:'id',textField:'text'" style="width:100%">
										</div>
									</div>
									<div style="display: flex;">
										<div style="flex: 4; flex-grow: 4; padding: 0px 0px 0px 0px;">
											<input type="hidden" id="id_eq" name="id_eq" value="-1" />
											<input class="easyui-combobox" required name="cbx_cad_eq_colab" id="cbx_cad_eq_colab" data-options="label:'Contato',labelPosition:'top',panelHeight:'auto',panelMinHeight:'5px',panelMaxHeight:'150px',valueField:'id',textField:'text'" style="width:100%">
										</div>
										<div style="flex: 1; flex-grow: 1; padding: 0px 0px 10px 10px;">
											<a id="btn_incluir_colab_eq_cadastro_proj_new" class="btn btn-success" style="width:100%; margin-top:30px;" onclick="$('#frm_colab_eq_cadastro_proj_new').form('submit');">Incluir</a>
										</div>
									</div>
									<div style="display: flex;">


									</div>
								</form>

							</div>
							<div style="flex: 1; padding: 10px 0px 0px 10px;">
								<legend style="color:red;font-weight: bold;padding-bottom: 5px !important;" >Convidados</legend>
								<form class="a-form" id="frm_colab_eq_cadastro_proj_new" method="post" enctype="multipart/form-data" novalidate>
									<div style="display: flex;">
										<div style="flex: 2; flex-grow: 2; padding: 0px 10px 0px 0px;">
											<input type="hidden" id="id_eq" name="id_eq" value="-1" />
											<input class="easyui-textbox" required name="txt_ata_email_conv" id="txt_ata_email_conv" data-options="label:'e-Mail',labelPosition:'top',panelHeight:'auto',panelMinHeight:'5px',panelMaxHeight:'150px',valueField:'id',textField:'text'" style="width:100%">
										</div>
									</div>
									<div style="display: flex;">
										<div style="flex: 4; flex-grow: 4; padding: 0px 0px 0px 0px;">
											<input type="hidden" id="id_eq" name="id_eq" value="-1" />
											<input class="easyui-textbox" required name="txt_ata_email_conv" id="txt_ata_email_conv" data-options="label:'Convidado',labelPosition:'top',panelHeight:'auto',panelMinHeight:'5px',panelMaxHeight:'150px',valueField:'id',textField:'text'" style="width:100%">
										</div>
										<div style="flex: 1; flex-grow: 1; padding: 0px 0px 10px 10px;">
											<a id="btn_incluir_colab_eq_cadastro_proj_new" class="btn btn-success" style="width:100%; margin-top:30px;" onclick="$('#frm_colab_eq_cadastro_proj_new').form('submit');">Incluir</a>
										</div>
									</div>
									<div style="display: flex;">


									</div>
								</form>
							</div>
						</div> -->


					</div>

					<div title="Avaliação">

						<div style="display: flex;">

							<div style="flex: 2; flex-grow: 2; padding: 10px 10px 10px 10px;">
								<input type="hidden" id="id_eq" name="id_eq" value="-1" />
								<input class="easyui-combobox" required name="cbx_ata_pauta_debat" id="cbx_ata_pauta_debat" data-options="label:'Pauta',labelPosition:'top',panelHeight:'auto',panelMinHeight:'5px',panelMaxHeight:'150px',valueField:'id',textField:'text'" style="width:100%">
							</div>
							<div style="flex: 4; flex-grow: 4; padding: 10px 10px 10px 10px;">
								<input type="hidden" id="id_eq" name="id_eq" value="-1" />
								<input class="easyui-textbox" required name="txt_ata_coment_debat" id="txt_ata_coment_debat" data-options="label:'Comentário',labelPosition:'top',panelHeight:'auto',panelMinHeight:'5px',panelMaxHeight:'150px',valueField:'id',textField:'text'" style="width:100%">
							</div>
							<div style="flex: 1; flex-grow: 1; padding: 10px 10px 10px 10px;">
								<input class="easyui-filebox" name="fl_ata_anex_coment" data-options="label:'Anexo',labelPosition:'top',buttonAlign:'left',buttonText:'Inserir',buttonIcon:'icon-add'" style="width:100%;">
							</div>
							<div style="flex: 1; flex-grow: 1; padding: 10px 10px 10px 10px;">
								<a id="btn_salvar_mensagem_analise" class="btn btn-success" style="width:100%; margin-top:30px;" onclick="$('#frm_debate_analise').form('submit');"></i>Enviar</a>
							</div>


						</div>
						<div style="display: flex; height: 400px;">
							<div style="flex: 1; padding: 15px 15px 0px 10px;">
								<legend style="color:red;font-weight: bold;padding-bottom: 5px !important;" >Comentários Registrados</legend>
								<table   class="easyui-datagrid" id="dg_debate_ata"                
									data-options="nowrap:false, showFooter:true, striped:true, singleSelect:true, fitColumns:true,remoteSort:false,multiSort:true,loadMsg:'Carregando ...',emptyMsg:'Dados não encontrados!',rowStyler:rowStyler,onBeforeEdit:onBeforeEdit,onAfterEdit:onAfterEdit" style="width:100%; height:80%;">
									<thead><tr>
										<th data-options="field:'nome1',align: 'center', title: 'Pauta',width: '25%'"></th>
										<th data-options="field:'nome2',align: 'center', title: 'Data',width: '10%'"></th>
										<th data-options="field:'nome3',align: 'center', title: 'Colaborador',width: '10%'"></th>
										<th data-options="field:'nome4',align: 'center', title: 'Comentário',width: '45%'"></th>
										<th data-options="field:'nome5',align: 'center', title: 'Opções',width: '10%'"></th>
									</tr></thead>
									<tbody>
										<tr>
											<td>Resultados das Compras</td>
											<td>10/01/2022</td>
											<td>Leomar</td>
											<td>Comentário feito sobre o assunto da compra</td>
											<td>Lap | olho | Lix</td>
										</tr>
										<tr>
											<td>Resultados das Compras</td>
											<td>10/01/2022</td>
											<td>Leomar</td>
											<td>Comentário feito sobre o assunto da compra</td>
											<td>Lap | olho | Lix</td>
										</tr>
										<tr>
											<td>Resultados das Compras</td>
											<td>10/01/2022</td>
											<td>Ruvian</td>
											<td>Comentário feito sobre o assunto da compra</td>
											<td>Lap | olho | Lix</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>

						
					</div>

					<div title="Registros">


							<div style="display: flex; height: 400px;">
								<div style="flex: 1; padding: 15px 15px 0px 10px;">
									<legend style="color:red;font-weight: bold;padding-bottom: 5px !important;" >Pautas</legend>
									<table   class="easyui-datagrid" id="dg_acoes_ata"                
										data-options="nowrap:false, showFooter:true, striped:true, singleSelect:true, fitColumns:true,remoteSort:false,multiSort:true,loadMsg:'Carregando ...',emptyMsg:'Dados não encontrados!',rowStyler:rowStyler,onBeforeEdit:onBeforeEdit,onAfterEdit:onAfterEdit" style="width:100%; height:100%;">
										<thead><tr>
											<th data-options="field:'nome1',align: 'center', title: 'Item',width: '20%'"></th>
											<th data-options="field:'nome2',align: 'center', title: 'Pauta / Tema',width: '80%'"></th>
										</tr></thead>
										<tbody>
											<tr>
												<td>01</td>
												<td>Pauta 01</td>
											</tr>
											<tr>
												<td>02</td>
												<td>Pauta 02</td>
											</tr>
											<tr>
												<td>03</td>
												<td>Pauta 03</td>
											</tr>
										</tbody>
									</table>
								</div>

								<div style="flex: 2; padding: 15px 15px 0px 10px;">
									<legend style="color:red;font-weight: bold;padding-bottom: 5px !important;" >Registro da Ata</legend>
									<div style="flex: 2; flex-grow: 2; padding: 10px 10px 10px 10px;">
										<input type="hidden" id="id_eq" name="id_eq" value="-1" />
										<input class="easyui-textbox" required name="txt_ata_registro" id="txt_ata_registro" data-options="label:'Comentário',labelPosition:'top',panelHeight:'auto',panelMinHeight:'5px',panelMaxHeight:'150px',valueField:'id',textField:'text'" style="width:100%">
									</div>
									<div style="flex: 1; padding: 10px 15px 0px 0px;">
										<a id="btn_incluir_acao" class="btn btn-success" style="width:100%; margin-top:30px;" onclick="$('#ata_comenta').form('submit');"></i>Incluir</a>
									</div>
								</div>
							</div>

					</div>

					<div title="Saídas">
						<form id="plano_ata" method="post" enctype="multipart/form-data" novalidate>
							<div style="display: flex;">
								<div style="flex: 2; padding: 10px 10px 0px 15px;">
									<select class="easyui-combobox" name="cbx_ata_pauta_acao" id="cbx_ata_pauta_acao" style="width:100%;" data-options="label:'Pauta',labelPosition:'top'">
									</select>
								</div>
								<div style="flex: 3; padding: 10px 10px 0px 15px;">
									<input class="easyui-textbox" required multiline="true" name="txt_ativ_ata" id="txt_ativ_ata" data-options="label:'Ação Necessária',labelPosition:'top'" style="width:100%;">
								</div>
								<div style="flex: 1; padding: 10px 10px 0px 15px;">
									<input class="easyui-datebox" required multiline="true" name="txt_ativ_prazo_ata" id="txt_ativ_prazo_ata" data-options="label:'Prazo',labelPosition:'top'" style="width:100%;">
								</div>
								<div style="flex: 2; padding: 10px 10px 0px 15px;">
									<select class="easyui-combobox" name="cbx_ativ_responsavel_ata" id="cbx_ativ_responsavel_ata" style="width:100%;" data-options="label:'Responsável',labelPosition:'top'">
									</select>
								</div>
								<div style="flex: 1; padding: 10px 15px 0px 0px;">
									<a id="btn_incluir_acao" class="btn btn-success" style="width:100%; margin-top:30px;" onclick="$('#ativ_ata').form('submit');"></i>Incluir</a>
								</div>
							</div>
						</form>

						<div style="display: flex; height: 400px;">
							<div style="flex: 1; padding: 15px 15px 0px 10px;">
								<legend style="color:red;font-weight: bold;padding-bottom: 5px !important;" >Atividades Planejadas</legend>
								<table   class="easyui-datagrid" id="dg_ativ_ata"                
									data-options="nowrap:false, showFooter:true, striped:true, singleSelect:true, fitColumns:true,remoteSort:false,multiSort:true,loadMsg:'Carregando ...',emptyMsg:'Dados não encontrados!',rowStyler:rowStyler,onBeforeEdit:onBeforeEdit,onAfterEdit:onAfterEdit" style="width:100%; height:80%;">
									<thead><tr>
										<th data-options="field:'nome1',align: 'center', title: 'Pauta',width: '25%'"></th>
										<th data-options="field:'nome2',align: 'center', title: 'Ação Proposta',width: '40%'"></th>
										<th data-options="field:'nome3',align: 'center', title: 'Prazo',width: '7%'"></th>
										<th data-options="field:'nome4',align: 'center', title: 'Responsável',width: '7%'"></th>
										<th data-options="field:'nome5',align: 'center', title: 'OK',width: '5%'"></th>
										<th data-options="field:'nome6',align: 'center', title: 'Eficácia',width: '6%'"></th>
										<th data-options="field:'nome7',align: 'center', title: 'Opções',width: '10%'"></th>
									</tr></thead>
									<tbody>
										<tr>
											<td>Pauta 01</td>
											<td>Atividade planejada como saída desta pauta 01</td>
											<td>10/01/2022</td>
											<td>Leomar</td>
											<td>OK</td>
											<td>Pendente</td>
											<td>Lap | olho | Lix</td>
										</tr>
										<tr>
											<td>Pauta 01</td>
											<td>Atividade planejada como saída desta pauta 02</td>
											<td>10/01/2022</td>
											<td>Leomar</td>
											<td>OK</td>
											<td>Pendente</td>
											<td>Lap | olho | Lix</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>

					<div title="Eficácia">
						<div style="display: flex; height: 400px;">
							<div style="flex: 2; padding: 15px 15px 0px 10px;">
								<legend style="color:red;font-weight: bold;padding-bottom: 5px !important;" >Atividades Planejadas</legend>
								<table   class="easyui-datagrid" id="dg_ativ_ata"                
									data-options="nowrap:false, showFooter:true, striped:true, singleSelect:true, fitColumns:true,remoteSort:false,multiSort:true,loadMsg:'Carregando ...',emptyMsg:'Dados não encontrados!',rowStyler:rowStyler,onBeforeEdit:onBeforeEdit,onAfterEdit:onAfterEdit" style="width:100%; height:80%;">
									<thead><tr>
										<th data-options="field:'nome1',align: 'center', title: 'Pauta',width: '30%'"></th>
										<th data-options="field:'nome2',align: 'center', title: 'Ação Proposta',width: '50%'"></th>
										<th data-options="field:'nome3',align: 'center', title: 'Prazo',width: '10%'"></th>
										<th data-options="field:'nome4',align: 'center', title: 'Responsável',width: '10%'"></th>
									</tr></thead>
									<tbody>
										<tr>
											<td>Pauta 01</td>
											<td>Atividade planejada como saída desta pauta 01</td>
											<td>10/01/2022</td>
											<td>Leomar</td>
										</tr>
										<tr>
											<td>Pauta 01</td>
											<td>Atividade planejada como saída desta pauta 02</td>
											<td>10/01/2022</td>
											<td>Leomar</td>
										</tr>
									</tbody>
								</table>
							</div>

							<div style="flex: 1; padding: 15px 15px 0px 10px;">
								<legend style="color:red;font-weight: bold;padding-bottom: 5px !important;" >Verificação da Eficácia</legend>
								<div style="flex: 1; padding: 10px 10px 0px 15px;">
									<input class="easyui-textbox" required multiline="true" name="cbx_ativ_ata" id="cbx_ativ_ata" data-options="label:'Parecer',labelPosition:'top'" style="width:100%;">
								</div>

								<div style="flex: 1; flex-grow: 1; padding: 0px 10px 0px 0px;">
									<input type="hidden" id="id_eq" name="id_eq" value="-1" />
									<input class="easyui-switchbutton"  value="0" id="swtb_encerra_proj" name="swtb_encerra_proj" data-options="label:'Tipo',labelPosition:'top',onText:'Eficaz',offText:'Ineficaz'" style="width:100%;">
								</div>
								<div style="flex: 1; padding: 10px 15px 0px 0px;">
									<a id="btn_incluir_acao" class="btn btn-success" style="width:100%; margin-top:30px;" onclick="$('#frm_efica_ata').form('submit');"></i>Salvar</a>
								</div>

							</div>
						</div>

					</div>

					<div title="Validações">
						<div style="display: flex; height: 400px;">
							<div style="flex: 1; padding: 10px 0px 0px 10px;">
								<legend style="color:red;font-weight: bold;padding-bottom: 5px !important;" >Participantes</legend>

								<table   class="easyui-datagrid" id="dg_valida_ata"                
								data-options="nowrap:false, showFooter:true, striped:true, singleSelect:true, fitColumns:true,remoteSort:false,multiSort:true,loadMsg:'Carregando ...',emptyMsg:'Dados não encontrados!',rowStyler:rowStyler,onBeforeEdit:onBeforeEdit,onAfterEdit:onAfterEdit" style="width:100%; height:100%;">
								<thead><tr>
									<th data-options="field:'nome1',align: 'center', title: 'Item',width: '20%'"></th>
									<th data-options="field:'nome2',align: 'center', title: 'Participante',width: '80%'"></th>
								</tr></thead>
								<tbody>
									<tr>
										<td>01</td>
										<td>Pessoa 01</td>
									</tr>
									<tr>
										<td>02</td>
										<td>Pessoa 02</td>
									</tr>
									<tr>
										<td>03</td>
										<td>Pessoa 03</td>
									</tr>
								</tbody>
							</table>

							</div>

							<div style="flex: 1; padding: 10px 0px 0px 10px;">
								<legend style="color:red;font-weight: bold;padding-bottom: 5px !important;" >Imagem</legend>
								<img class="img_processo" src="foto/default.jpg" style="height: 300px; width: 300px;">
							</div>

							<div style="flex: 1; padding: 10px 0px 0px 10px;">
								<legend style="color:red;font-weight: bold;padding-bottom: 5px !important;" >Validação</legend>
								<div style="flex: 1; padding: 10px 10px 0px 15px;">
									<input class="easyui-textbox" required multiline="true" name="txt_valida_ata" id="txt_valida_ata" data-options="label:'Participante',labelPosition:'top'" style="width:100%;">
								</div>
								<div style="flex: 1; padding: 10px 10px 0px 15px;">
                                    <input class="easyui-passwordbox" name="txt_senha_valida_ata" id="txt_senha_valida_ata" style="width:100%" data-options="label:'Senha:',labelPosition:'top'">
								</div>
								<div style="flex: 1; padding: 10px 15px 0px 0px;">
									<a id="btn_incluir_acao" class="btn btn-danger" style="width:100%; margin-top:30px;" onclick="$('#frm_valida_ata').form('submit');"></i>Assinar</a>
								</div>

							</div>

						</div>

					</div>

		</div>
	</div>

</div>


<script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
<script src="js/jquery-easyui-1.8.1/jquery.easyui.min.js" type="text/javascript"></script>
<script src="js/jquery-easyui-1.8.1/datagrid-filter.js" type="text/javascript"></script>
<script src="js/jquery-easyui-1.8.1/jquery.edatagrid.js" type="text/javascript"></script>
<script src="js/jquery-easyui-1.8.1/datagridview/datagrid-detailview.js" type="text/javascript"></script>
<script src="js/jquery-easyui-1.8.1/datagridview/datagrid-scrollview.js" type="text/javascript"></script>
<script src="js/jquery-easyui-1.8.1/locale/easyui-lang-pt_BR.js" type="text/javascript"></script>
<!-- <script src="./js/atas.js" type="text/javascript"></script> -->
<?php require_once 'js/atas.js.php'; ?> 