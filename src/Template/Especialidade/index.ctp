<table>
	<thead>
		<td>Código</td>
		<td>Descricao</td>
		<td>Médicos</td>
	</thead>
	<tbody>
		<tr>
			<form id="formFiltro" method="Post">

				<td>
					<input style=" float: left; width: 80%" type="text" name="filtro_codigo"/>
					<img onclick="$('#formFiltro').submit()" style="width: 30px;" src="<?=$this->Url->image('icon_find.png');?>"/></td>
				</td>
				<td>
					<input  style=" float: left; width: 80%" type="text" name="filtro_descricao"/>
					<img onclick="$('#formFiltro').submit()" style='width: 30px;' src='<?=$this->Url->image('icon_find.png')?>'/>
				</td>
				<td>
					<select style="width: 80%; float: left;" name='filtro_medico'>
						<?php 
							echo "<option  value=''>Selecione</option>";
							
							foreach($listaMedicos as $medico){ 
								echo "<option  value='{$medico->codigo}'>{$medico->nome}</option>";
							}
						?>						
					</select>
					<img onclick="$('#formFiltro').submit()" style='width: 30px;' src='<?=$this->Url->image('icon_find.png')?>'/>					
				</td>
			</form>
		</tr>

		<?php foreach ($especialidades as $especialidade): ?>
            <tr>               
				<td><?= $this->Number->format($especialidade->codigo) ?></td>
				<td><?= h($especialidade->descricao) ?></td>			
                <td>
					<table>					
						<?php foreach ($especialidade->medico as $umMedico): ?>
							<tr>
								<td><?= h($umMedico->nome) ?></td>
							</tr>
						<?php endforeach; ?>					
					</table>
				</td>

            </tr>
        <?php endforeach; ?>

	</tbody>
</table>