<table>
	<thead>
		<td>Codigo</td>
		<td>Nome</td>
		<td>Especialidade</td>
		<td>Telefone</td>
		<td>Email</td>
	</thead>
	<tr>

	<form id="formFiltro" method="Post">

	<td>
		<input style=" float: left; width: 80%" type="text" name="filtro_codigo"/>
		<img onclick="$('#formFiltro').submit()" style="width: 30px;" src="<?=$this->Url->image('icon_find.png');?>"/></td>
	<td>
		<input  style=" float: left; width: 80%" type="text" name="filtro_nome"/>
 		<img onclick="$('#formFiltro').submit()" style='width: 30px;' src='<?=$this->Url->image('icon_find.png')?>'/>
	</td>
	<td>
		<select style="width: 80%; float: left;" name='filtro_especialidade'>
			<?php 
			echo "<option  value=''>Selecione</option>";
			
			foreach($listaEspecialidades as $especialidade){ 
				echo "<option  value='{$especialidade->codigo}'>{$especialidade->descricao}</option>";
			}
			?>
			
		</select>
		<img onclick="$('#formFiltro').submit()" style='width: 30px;' src='<?=$this->Url->image('icon_find.png')?>'/>
		
	</td>
	<td>
		<input style="width: 80%; float: left;" type="text" name="filtro_telefone"/>
		<img onclick="$('#formFiltro').submit()" style='width: 30px;' src='<?=$this->Url->image('icon_find.png')?>'/>
	</td>
	<td>
		<input style="width: 80%; float: left;"type="text" name="filtro_email"/>
		<img onclick="$('#formFiltro').submit()" style='width: 30px;' src='<?=$this->Url->image('icon_find.png')?>'/>
	</td>
	</form>
</tr>
<?php
foreach($medico as $umMedico){    
?>
<tr>
	<td><?=$umMedico->codigo?></td>
	<td><?=$umMedico->nome?></td>
	<td><?=$umMedico->especialidade->descricao?></td>
	<td><?=$umMedico->telefone?></td>
	<td><?=$umMedico->email?></td>
	
</tr>
<?php	
}

?>