<table>
<thead>
	<td>Código</td>
	<td>Nome</td>
	<td>Data de Nascimento</td>
	<td>Email</td>
	<td>Telefone</td>
	<td>Plano de Saude</td>
</thead>

<?php
foreach($listaPacientes as $umPaciente){  
?>
<tr>
	<td><?=$umPaciente->nome?></td>
	<td><?=$umPaciente->sexo?></td>
	<td><?=$umPaciente->data_nascimento?></td>
	<td><?=$umPaciente->email?></td>
	<td><?=$umPaciente->telefone?></td>
	<td>
		<table>
			<?php foreach($umPaciente->plano_saude as $plano){ ?>
			<tr>
				<td><?=$plano->nome?>
				</td>
			</tr>
			<?php } ?>
		</table>
	
	</td>
</tr>
<?php	
}

?>