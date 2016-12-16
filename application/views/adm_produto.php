	<div class="container">
		<div class="sixteen columns services_div">
			<div class="Services_1_title_div">
				<h3>
					ADMINISTRAÇÃO | Produtos
				</h3>
				<p>Está parte da administração deve seguir os seguintes passos: <br />
				   Etapa #1: Lançar os produtos na etapa #1, com a informações do produto.<br/>
				   Etapa #2: Lançar os produtos para venda do dia, informando a quantidade e valor atual. <br />
			   </p>
			</div>
			<div class="clearfix"></div>

		</div>

		<?php if (!empty($sRetorno)): ?>
		<div>
			<strong><?php echo $sRetorno; ?></strong>
		</div>
		<?php endif; ?>

		<?php
			if(!empty($error)){
				echo $error;
			}
		?>

		<div class="clearfix"></div>
		<div class="contact_form_div">

				<div class="eight columns alpha">

					<?php echo validation_errors("<div>","</div>"); ?>
					<?php echo form_open('catalogo/admProdutosDoDiaCriar', array('class' => '')); ?>

					<fieldset id="contact_form">

						<h3>#2 - Produtos do Dia</h3>

						<div id="result"></div>

						<label><span class="contact_label">Produto <span class="red_text">*</span></span><br/>
						<select style="width:500px" name="idproduto">
							<?php foreach ($rsProdutos as $sProduto): ?>
								<option value="<?php echo $sProduto->id;?>"><?php echo $sProduto->nome;?> / <?php echo $sProduto->detalhes;?></option>
							<?php endforeach;?>
						</select>
						</label>

						<label><span class="contact_label">Valor R$ <span class="red_text">*</span></span>
						<input type="text" style="width:50px;" name="valor"/>
						</label>

						<label><span class="contact_label">Quantidade <span class="red_text">*</span></span>
						<input type="text" style="width:50px;" value="1" name="quantidade" />
						</label>

						<label><span class="contact_label">Dia para Venda: <span class="red_text">*</span></span><br/>
						<input type="text"  style="width:80px;" name="dia" value="<?php echo date('d/m/Y'); ?>"/>
						</label>

						<button class="submit_btn" >Salvar</button>

					</fieldset>
				</form>

				</div>
				<div class="eight columns omega">

					<fieldset id="contact_form">
						<ul>
							<ul>
								<?php foreach ($rsProdutosDoDia as $sProdutoDia): ?>
								<li><strong>Nome: </strong><?php echo $sProdutoDia->nome;?>  <br />
									<strong>Valor: </strong> <?php echo $sProdutoDia->valor;?> / <strong>Quantidade Disponível: </strong> <?php echo $sProdutoDia->quantidade;?><br/>
									<strong>Ações: </strong> <a href="<?php echo site_url('catalogo/admProdutosDoDiaAlterar/'.$sProdutoDia->id); ?>"> Deletar </a><br /><br /></li>
								<?php endforeach;?>
							</ul>
						</ul>

					</fieldset>

				</div>
				<div class="clearfix"></div>
		</div>
		<hr/>
		<div class="clearfix"></div>
		<div class="contact_form_div">

				<div class="eight columns alpha"> <br />

					<?php echo form_open_multipart('catalogo/admProdutosCriar');?>

					<fieldset id="contact_form">

						<h3>#1 - Produtos</h3>

						<div id="result"></div>
					    <label><span class="contact_label">Nome <span class="red_text">*</span></span><br/>
					    <input type="text" name="nomepro" placeholder="Nome do produto"/>
					    </label>

					    <label><span class="contact_label">Foto <span class="red_text">*</span></span><br/>
					    <input type="file" name="foto"/>
						</label>

					    <label><span class="contact_label">Mensagem <span class="red_text">*</span></span><br/>
					    <textarea rows="4" cols="50" name="detalhes" placeholder="Detalhes do produto" ></textarea>
					    </label>

					    <button class="submit_btn" id="submit_btn">Salvar</button>

					</fieldset>

				</form>

				</div>
				<div class="eight columns omega">

					<fieldset id="contact_form">
						<ul>
							<?php foreach ($rsProdutos as $sProduto): ?>
							<li><strong>Nome: </strong><?php echo $sProduto->nome;?>  <br />
								<?php if($sProduto->foto != NULL): ?>
									<img width="50" src="<?php echo base_url()."upload/produtos/".$sProduto->foto;?>" > <br />
								<?php endif;?>
								<strong>Detalhes: </strong> <?php echo $sProduto->detalhes;?> <br />
								<strong>Ações: </strong> <a href="<?php echo site_url('catalogo/admProdutosAlterar/'.$sProduto->id); ?>"> Deletar </a><br /><br /></li>
							<?php endforeach;?>
						</ul>

					</fieldset>

				</div>
				<div class="clearfix"></div>
		</div>

		<div class="clearfix"></div>
	</div>
