<table>
	<thead>
		<td>Data</td>
		<td>Nome Paciente</td>
		<td>Texto</td>
		<td>Medico</td>
		<td>Especialidade Médico</td>
	</thead>
	<tbody>
	<?php
		foreach($laudos as $umLaudo){   
		//@todo implementar corpo da tabela
			echo "<tr>";
				echo "<td>".$umLaudo->data."</td>";
				echo "<td>".$umLaudo->exame->paciente->nome."</td>";
				echo "<td>".$umLaudo->texto."</td>";
				echo "<td>".$umLaudo->medico->nome."</td>";
				echo "<td>".$umLaudo->medico->especialidade->descricao."</td>";					
			echo "</tr>";
		}
	?>
	</tbody>
</table>