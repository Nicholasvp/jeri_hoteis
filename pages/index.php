<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;700&display=swap" rel="stylesheet">

    
    

    <title>Document</title>
</head>
<body>
    <nav class="nav_bar">
        <img class="logo" src="./assets/logo.svg" alt="logo">
        <ul class="nav_buttom">
            <li class="home"><a href="#home">Home</a></li>
            <li class="about"><a href="#about">Sobre</a></li>
            <li class="reserve"><a href="#reserve">Reserva</a></li>
            <li class="contact"><a href="#">Contato</a></li>
        </ul>
    </nav>
    
    <section id="home">

        <img id="image" src="" alt="">
        <h4>Jericoacoara a ciddade gente da gente</h4>
    
    </section>

    <section id="about">   
        
        <h2>Pontos turísticos:</h2>

        <div class="imagem"><img src="https://vivaomundo.com.br/wp-content/uploads/2020/03/Mangue-seco.png" height="200" width="400" alt="">
        <p> Mangue Seco</p>
        </div>

        <div class="imagem"><img src="https://www.vamostrilhar.com.br/content/uploads/2022/06/Conheca-tudo-sobre-as-Dunas-e-Lagoa-da-Tatajuba-em-Jericoacoara-CE-Vamos-Trilhar.jpg" alt="" height="200" width="400">
        <p>Lagoa Tatajuba</p></div>

        <div class="imagem"><img src="https://vivaomundo.com.br/wp-content/uploads/2014/03/Arvore-Torta.jpg" height="200" width="400" alt=""><p>Árvore da Preguiça</p></div>
        <div class="imagem"></div>

        <div class="imagem"><img src="https://vivaomundo.com.br/wp-content/uploads/2014/03/Pedra-Furada.jpg" height="200" width="400" alt=""><p> Pedra Furada</p></div>
        <div class="imagem"></div>

    </section>
    <section id="reserve">
        <h2>Reserve sua vaga:</h2>

        <form id="myForm">
		<label for="name">Nome:</label>
		<input type="text" id="name" name="name"><br><br>

		<label for="phone">Telefone:</label>
		<input type="text" id="phone" name="phone"><br><br>

		<label for="rooms">Número de Quartos:</label>
		<input type="number" id="rooms" name="rooms"><br><br>

		<label for="checkin">Data de Checkin:</label>
		<input type="date" id="checkin" name="checkin"><br><br>

		<label for="checkout">Data de Checkout:</label>
		<input type="date" id="checkout" name="checkout"><br><br>

		<input type="button" value="Enviar" onclick="createMessage()">
	</form>

	<script>
		function createMessage() {
			// Captura valores
			var name = document.getElementById("name").value;
			var phone = document.getElementById("phone").value;
			var rooms = document.getElementById("rooms").value;
			var checkin = document.getElementById("checkin").value;
			var checkout = document.getElementById("checkout").value;

			// Mensagem
			var wppMessage = "Olá, meu nome é " + name + ".\n"
				+ "Estou procurando por " + rooms + " quartos.\n"
				+ "Do dia " + checkin + " até " + checkout + ".\n"
				+ "Meu telefone para contato é " + phone + ".";

			// Link do WhatsApp com mensagem pré-preenchida
			var url = "https://wa.me/5584986105803?text=" + encodeURIComponent(wppMessage);

			// Redireciona para o WhatsApp em outra guia
			window.open(url, "_blank");
		}
	</script>

    </section>

</body>
</html>