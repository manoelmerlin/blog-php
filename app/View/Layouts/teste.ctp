<style>

	.div-imagem {
		background-image: url('/img/banners/4.jpg');
		background-size: cover;
		background-position: center;
		background-repeat: no-repeat;
	}

	.div-conteudo {

		background-color: rgba(0,0,0,0.4);
	}

	.titulo {
		color: #fff;
		font-family: 'Dancing Script', cursive;
		font-size: 3rem;
	}

	.div-conteudo .categoria {

		font-weight: bold;
		margin: 0;
		font-size: 1rem;
	}

	.div-conteudo .data {

		font-weight: bold;
		margin: 0;
		font-size: 1rem;
	}

	.div-conteudo .categoria-data {
		color: orange;
		background-color: rgba(0,0,0,0.45);
	}

</style>



<?php for ($i = 0; $i < 3; $i++): ?>

	<!-- Imagem -->
	<div class="col-12 p-0 div-imagem my-3">

		<div class="row m-0 p-0 div-conteudo">

			<!-- Div de espaçamento -->
			<div class="col-12 py-5 my-5"></div>

			<!-- Titulo -->
			<div class="col-12 p-3">
				<h2 class="titulo">Titulo da noticia</h2>
			</div>

			<!-- Data/ Categoria -->
			<div class="col-12 categoria-data py-0 px-0">
				<div class="row m-0">

					<div class="col-2 p-3">
						<h5 class="categoria">Esporte</h5>
					</div>

					<div class="col p-3">
						<h5 class="data">25/julho/2019 as 14:05</h5>
					</div>

				</div>
			</div>

			<!-- Entrar -->
			<div class="col-12 p-3 mt-3">
				<button class="btn btn-light btn-md rounded-0">Ler mais...</button>
			</div>

		</div>

	</div>

<?php endfor; ?>