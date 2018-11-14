<table>
<thead>
	<td>Codigo</td>
	<td>Nome</td>
	<td>Pacientes</td>
</thead>

<tbody>
	<tr>
		<form id="formFiltro" method="Post">

			<td>
				<input style=" float: left; width: 80%" type="text" name="filtro_codigo"/>
				<img onclick="$('#formFiltro').submit()" style="width: 30px;" src="<?=$this->Url->image('icon_find.png');?>"/></td>
			</td>
			<td>
				<input  style=" float: left; width: 80%" type="text" name="filtro_nome"/>
				<img onclick="$('#formFiltro').submit()" style='width: 30px;' src='<?=$this->Url->image('icon_find.png')?>'/>
			</td>
			<td>
				<select style="width: 80%; float: left;" name='filtro_paciente'>
					<?php 
						echo "<option  value=''>Selecione</option>";
						
						foreach($listaPacientes as $paciente){ 
							echo "<option  value='{$paciente->codigo}'>{$paciente->nome}</option>";
						}
					?>						
				</select>
				<img onclick="$('#formFiltro').submit()" style='width: 30px;' src='<?=$this->Url->image('icon_find.png')?>'/>					
			</td>
		</form>
	</tr>

	<?php
	foreach($planoSaude as $umPlano){  
	//@todo fazer tabela com dados
		echo "<tr>";
			echo "<td>".$umPlano->codigo."</td>";
			echo "<td>".$umPlano->nome."</td>";
			echo "<td>";
				echo "<table>";
					foreach($umPlano->paciente as $umPaciente){
						echo "<tr>";
							echo "<td>".$umPaciente->nome."</td>";
						echo "</tr>";
					}
				echo "</table>";
			echo "</td>";
		echo "</tr>";
	}
	?>
</tbody>