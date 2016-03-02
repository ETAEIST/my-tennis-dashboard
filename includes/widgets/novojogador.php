<div class= "widget">
	<h2>Novo jogador</h2>
	<div class = "inner">
		<form action="novojogadorScript.php" method="post">
			<ul id="login">
				<li>
					* Nome:<br>
					<input type="text" name="Nome">
				</li>
				<li>
					* Mail:<br> 
					<input type="text" name="Mail">
				</li>
				<li>
					Telefone:<br> 
					<input type="text" name="Telefone">
				</li>
				<br>
				<li>
					Desde:<br> 
					<input type="date" name="Desde">
				</li>
				<li>
					Lateralidade(esquerdino ou destro):<br> 
					<input type="radio" name="Lateralidade" value=1 checked> Destro<br>
					<input type="radio" name="Lateralidade" value=0> Esquerdino<br>
					
				</li>
				<li>
					Raquete:<br> 
					<input type="text" name="Raquete">
				</li>
				<li>
					<input type="submit" value="Adicionar">
				</li>
			</ul>
		</form>
	</div>
</div>
