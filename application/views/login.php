	<div class="container">
		<div class="sixteen columns services_div">
			<div class="Services_1_title_div">
				<h3>
					Faça seu login.	
				</h3>
			</div>
			<div class="clearfix"></div>

		</div>
		<div class="clearfix"></div>
		<div class="contact_form_div">

				<div class="eight columns omega">

					<?php echo validation_errors("<p>","</p>"); ?>
					<?php echo form_open('login/validacao', array('class' => '')); ?>

					<fieldset id="contact_form">

						<div id="result"></div>
					    <label for="email"><span class="contact_label">Email <span class="red_text">*</span></span><br/>
					    <input type="email" name="email" id="email" placeholder="Seu Email"/>
					    </label>

						<label for="name"><span class="contact_label">Senha <span class="red_text">*</span></span><br/>
					    <input type="password" name="senha" id="name" placeholder="Sua Senha"/>
					    </label>


					    <button class="submit_btn" id="submit_btn">Login</button>

					</fieldset>

					</form>
				</div>
				<div class="clearfix"></div>
		</div>

		<div class="clearfix"></div>
	</div>
