<table>
	<thead>
		<td>Data do Exame</td>
		<td>Nome Pacientem</td>
		<td>Nome Medico Exame</td>
		<td>Especialidade Médico Exame</td>
		<td>Código Laudo</td>
		<td>Data Laudo</td>
		<td>Nome Medico Laudo</td>
		<td>Especialidade Médico Laudo</td>
	</thead>
	<tbody>
	<?php
		foreach($exame as $umExame){    
			//@Todo Implementar impressao da tabela
			echo "<tr>";
				echo "<td>".$umExame->data."</td>";
				echo "<td>".$umExame->paciente->nome."</td>";
				echo "<td>".$umExame->medico->nome."</td>";			
				echo "<td>".$umExame->medico->especialidade->descricao."</td>";		
				
				echo "<td>";
					echo "<table>";					
						foreach ($umExame->laudo as $umLaudo){
							echo "<tr>";
								echo "<td>".$umLaudo->codigo."</td>";								
							echo "</tr>";
						}
					echo "</table>";
				echo "</td>";
				
				echo "<td>";
					echo "<table>";					
						foreach ($umExame->laudo as $umLaudo){
							echo "<tr>";
								echo "<td>".$umLaudo->data."</td>";								
							echo "</tr>";
						}
					echo "</table>";
				echo "</td>";

				echo "<td>";
					echo "<table>";					
						foreach ($umExame->laudo as $umLaudo){
							echo "<tr>";
								echo "<td>".$umLaudo->medico->nome."</td>";								
							echo "</tr>";
						}
					echo "</table>";
				echo "</td>";

				echo "<td>";
					echo "<table>";					
						foreach ($umExame->laudo as $umLaudo){
							echo "<tr>";
								echo "<td>".$umLaudo->medico->especialidade->descricao."</td>";								
							echo "</tr>";
						}
					echo "</table>";
				echo "</td>";

			echo "</tr>";
		}
	?>
	</tbody>
</table>