	<div class="container">
		<div class="sixteen columns services_div">
			<div class="Services_1_title_div">
				<h3>
					ADMINISTRAÇÃO | Venda
				</h3>
			</div>
			<div class="clearfix"></div>

		</div>

		<?php if (!empty($sRetorno)): ?>
		<div>
			<strong><?php echo $sRetorno; ?></strong>
		</div>
		<?php endif; ?>

		<div class="clearfix"></div>
		<div class="contact_form_div">

				<div class="eight columns alpha">

					<?php echo validation_errors("<div>","</div>"); ?>
					<?php echo form_open('catalogo/admVendaCriar', array('class' => '')); ?>

					<fieldset id="contact_form">

						<h3>Efetuar Baixa(Venda)</h3>

						<div id="result"></div>

						<label><span class="contact_label">Produto <span class="red_text">*</span></span><br/>
						<select style="width:450px" name="idprodutov">
							<?php foreach ($rsProdutosDia as $sProdutoDia): ?>
								<option value="<?php echo $sProdutoDia->id;?>"><?php echo $sProdutoDia->nome;?> / Valor: <?php echo $sProdutoDia->valor;?> / Qtn: <?php echo $sProdutoDia->quantidade;?>  / Data de Venda: <?php echo $sProdutoDia->data_para_venda;?> </option>
							<?php endforeach;?>
						</select>
						</label>

						<label><span class="contact_label">Cliente <span class="red_text">*</span></span><br/>
						<select style="width:450px" name="idclientev">
							<?php foreach ($rsClientes as $sCliente): ?>
								<option value="<?php echo $sCliente->id;?>"><?php echo $sCliente->nome;?> / <?php echo $sCliente->email;?> / <?php echo $sCliente->tipo;?> </option>
							<?php endforeach;?>
						</select>
						</label>

						<label><span class="contact_label">Quantidade <span class="red_text">*</span></span>
						<input type="text" style="width:50px;" value="1" name="quantidadev" />
						</label>

						<button class="submit_btn" >Vender</button>

					</fieldset>
					</form>

				</div>
				<div class="eight columns omega">

					<fieldset id="contact_form">
						<h3>Relatório do total já vendido hoje(<?php  echo date('d/m/Y'); ?>)</h3>

						<ul>
							<?php foreach ($rsVendasDoDiaHoje as $sVendaDoDiaHoje): ?>
								<li><strong>Nome do Comprador: </strong> <?php echo $sVendaDoDiaHoje->comprador;?><br />
									<strong>Produto:</strong> <?php echo $sVendaDoDiaHoje->produto;?> / <strong>Quantidade:</strong> <?php echo $sVendaDoDiaHoje->quantidade;?> / <strong>Valor Unitário:</strong> <?php echo $sVendaDoDiaHoje->valor_uni;?><br/>
									<strong>TOTAL DA VENDA: </strong> <?php echo $sVendaDoDiaHoje->valor_total;?><br/><br/><br/>
								</li>
							<?php endforeach;?>
						</ul>

					</fieldset>

				</div>
				<div class="clearfix"></div>

				<div class="eight columns omega">

					<fieldset id="contact_form">
						<h3>Relatório do total já vendido</h3>
						<ul>
							<?php foreach ($rsVendasGeral as $sVendaDoDiaHoje): ?>
								<li><strong>Nome do Comprador: </strong> <?php echo $sVendaDoDiaHoje->comprador;?><br />
									<strong>Produto:</strong> <?php echo $sVendaDoDiaHoje->produto;?> / <strong>Quantidade:</strong> <?php echo $sVendaDoDiaHoje->quantidade;?> / <strong>Valor Unitário:</strong> <?php echo $sVendaDoDiaHoje->valor_uni;?><br/>
									<strong>TOTAL DA VENDA: </strong> <?php echo $sVendaDoDiaHoje->valor_total;?><br/><br/><br/>
								</li>
							<?php endforeach;?>
						</ul>

					</fieldset>

				</div>
		</div>
		<hr/>

		<div class="clearfix"></div>
	</div>
