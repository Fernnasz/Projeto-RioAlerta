
<?php

if (isset($_POST['acao'])) {

    include_once('config.php');

    $nome = $_POST['nome'];
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $celular = $_POST['celular'];
        $cpf = $_POST['cpf'];
        $cep = $_POST['cep'];
        $estado = $_POST['estado'];
        $cidade = $_POST['cidade'];
        $bairro = $_POST['bairro'];
        $rua = $_POST['rua'];
        $numero = $_POST['numero'];
        $complemento = $_POST['complemento'];

        
        $result = mysqli_query($conexao, "INSERT INTO usuario(nome,login,senha,celular,cpf,cep,estado,cidade,bairro,rua,numero,complemento)VALUES('$nome','$login','$senha','$celular','$cpf','$cep','$estado','$cidade','$bairro','$rua','$numero','$complemento')");

        if ($result) {
            $lastInsertedId = $conn->lastInsertId();
            if ($lastInsertedId) {
                // Cadastro bem-sucedido, exiba a mensagem de "Concluído"
                echo "<script>alert('Seu cadastro foi concluído com sucesso!');</script>";
            } else {
                // Ocorreu um erro no cadastro
                echo "<script>alert('Seu cadastro foi concluído com sucesso!');</script>";
            }
        }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
<title>Cadastro</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../CSS/style.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,500;1,300;1,400&display=swap');
</style>

<script>
   function formatarCampoCPF(campo) {
        var cpf = campo.value.replace(/\D/g, ''); // Remove caracteres não numéricos
        cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2'); // Adiciona um ponto após os primeiros 3 dígitos
        cpf = cpf.replace(/(\d{3})(\d)/, '$1.$2'); // Adiciona um ponto após os próximos 3 dígitos
        cpf = cpf.replace(/(\d{3})(\d{1,2})$/, '$1-$2'); // Adiciona um traço após os últimos 3 ou 4 dígitos
        campo.value = cpf;
    }

  </script>

</head>

<body>
           
<nav>
    <div class="nav-bar">
        <i class='bx bx-menu sidebarOpen' ></i>
        <span class="logo navLogo"><a href="#">Rio Alerta</a></span>

        <div class="menu">
            <div class="logo-toggle">
                <span class="logo"><a href="#">Rio Alerta</a></span>
                <i class='bx bx-x siderbarClose'></i>
            </div>

            <ul class="nav-links">
                <li><a href="../HTML/index.html">Home</a></li>
                <li><a href="noticia.php">Notícias</a></li>
                <li><a href="../HTML/tipoAlerta.html">Tipos de Alerta</a></li>
                <li><a href="formulario.php">Cadastro</a></li>
            </ul>
        </div>

        <div class="darkLight-searchBox">
            <div class="dark-light">
                <i class='bx bx-moon moon'></i>
                <i class='bx bx-sun sun'></i>
            </div>

            <div class="searchBox">
               <div class="searchToggle">
                <i class='bx bx-x cancel'></i>
                <i class='bx bx-search search'></i>
               </div>

                <div class="search-field">
                    <input type="text" placeholder="Search...">
                    <i class='bx bx-search'></i>
                </div>
            </div>
        </div>
    </div>
</nav>

<script>

const body = document.querySelector("body"),
  nav = document.querySelector("nav"),
  modeToggle = document.querySelector(".dark-light"),
  searchToggle = document.querySelector(".searchToggle"),
  sidebarOpen = document.querySelector(".sidebarOpen"),
  siderbarClose = document.querySelector(".siderbarClose");

  let getMode = localStorage.getItem("mode");
      if(getMode && getMode === "dark-mode"){
        body.classList.add("dark");
      }

// js code to toggle dark and light mode
  modeToggle.addEventListener("click" , () =>{
    modeToggle.classList.toggle("active");
    body.classList.toggle("dark");

    // js code to keep user selected mode even page refresh or file reopen
    if(!body.classList.contains("dark")){
        localStorage.setItem("mode" , "light-mode");
    }else{
        localStorage.setItem("mode" , "dark-mode");
    }
  });

// js code to toggle search box
    searchToggle.addEventListener("click" , () =>{
    searchToggle.classList.toggle("active");
  });

  
//   js code to toggle sidebar
sidebarOpen.addEventListener("click" , () =>{
nav.classList.add("active");
});

body.addEventListener("click" , e =>{
let clickedElm = e.target;

if(!clickedElm.classList.contains("sidebarOpen") && !clickedElm.classList.contains("menu")){
    nav.classList.remove("active");
}
});

</script>
<br>
 </nav>
 <br>

<main class="main_content container">
      
    <section class="main_form container">
        
        <div class="content">
                        
                
                    <!--Inícia Formulário-->

                    <div class="container_form">
                                
                        <h1>Formulário de Cadastro</h1>

                        <form action="formulario.php" method="post">
                            
                            <div class="form_grupo">
                                <label for="nome" class="form_label">Nome *</label>
                                <input type="text" name="nome" class="form_input" id="nome" placeholder="Nome" color= "red" required>
                            </div>
                            
                            <div class="form_grupo">
                                <label for="e-mail" class="form_label">Email *</label>
                                <input type="email" name="login" class="form_input" id="email" placeholder="seuemail@email.com" required>
                            </div>


                            <div class="form_grupo">
                                <label for="senha" class="form_label">Senha *</label>
                                <input type="password"  name="senha" class="form_input" id="senha" placeholder="*********"  minlength="8" maxlength="8" required>

                            </div>
                            
                            <div class="form_grupo">
                                <label for="celuar" class="form_label">Número - Celular *</label>
                                <input type="tel" name="celular" class="form_input" id="celular" placeholder="Seu número" required minlength="11" maxlength="14" >
                            </div>        

                            <div class="form_grupo">
                                <label for="CPF" class="form_label">CPF *</label>
                                <input type="text" name="cpf" minlength="11" maxlength="14" class="form_input" id="strCPF" placeholder="123.456.789-01" required oninput="formatarCampoCPF(this)">
                            </div>
                            
                            <div class="form_grupo">

                                <label for="CEP" class="form_label" >Digite seu CEP *</label>
                                <input type="text" name = "cep" class="form_input" id="cep"  minlength="8" maxlength="8" placeholder="13483000" required>
                            
                            </div>
                            <div class="form_grupo">
                                <label for="UF" class="form_label" >UF *</label>
                                <input type="text"  name ="estado" class="form_input" id="uf">
                            </div>
                            <div class="form_grupo">
                                <label for="Cidade" class="form_label" >Cidade *</label>
                                <input type="text" name = "cidade" class="form_input" id="cidade">
                            </div>
                            <div class="form_grupo">
                                <label for="Bairro" class="form_label" >Bairro *</label>
                                <input type="text" name="bairro" class="form_input" id="bairro">
                            </div>
                            <div class="form_grupo">
                                <label for="Endereco" class="form_label" >Endereço *</label>
                                <input type="text" name ="rua" class="form_input" id="endereco">
                            </div>
                            <div class="form_grupo">
                                <label for="Numero" class="form_label" >Número *</label>
                                <input type="text" name ="numero" class="form_input" id="numero">
                            </div>
                            <div class="form_grupo">
                                <label for="Complemento" class="form_label" >Complemento</label>
                                <input type="text" name ="complemento" class="form_input" id="complemento">
                            </div>

                                <div class="submit">

                                  
                                  <input type="hidden" name="acao" value="enviar">
                                  <button type="submit" name="Submit" id= "enviar" class="submit_btn" >Cadastrar</button>
                              
                                  <script>

                                      const button = document.querySelector("#enviar");
                                      button.onclick = function(){
                                          // valores dos campos
                                          var nome = document.getElementById("nome").value;
                                          var email = document.getElementById("email").value;
                                          var senha = document.getElementById("senha").value;
                                          var celular = document.getElementById("celular").value;
                                          var strCPF = document.getElementById("strCPF").value;
                                          var cep = document.getElementById("cep").value;
                                          var numero = document.getElementById("numero").value;
                            
                                          
                                          // Obtenha os outros campos do formulário aqui

                                          // Verifique se algum campo está vazio
                                          if (nome === "" || email === "" ||senha === "" || celular === "" ||strCPF === "" || cep === "" || numero === "" ) {
                                            // Exiba uma mensagem de erro
                                              Swal.fire({
                                                icon: 'error',
                                                title: 'Ops..',
                                                text: 'Para se cadastrar você precisa preencher todos os campos que possuam "*"',
                                                footer: '<a id="voltar_home" href="../HTML/index.html">Voltar para página principal.</a>'
                                              })
                                          } 
                                   
                                                              }

                                  </script>
                                </div>
                        </form>

                    </div><!--container_form-->

                    <!--Finaliza Formulário-->
               

        <div class="clear"></div>
        </div>
    </section>
</main>
<!--Footer-->
<footer>
<div class="conteiner-footer">
        <div class="text-footer">
          <p>© 2023 Rio Alerta - Rio de Janeiro. DLN - Inovação e Eficiência</p>
        </div>
  </div>

<script>
  const closeBtn = document.querySelector(".close-btn");

  closeBtn.addEventListener("click", () => {
    closeBtn.classList.toggle("open");
  });
</script>
</footer>
<script src="jquery.js"></script>
<script src="script.js"></script>
<script src="../php/html5shiv.js"></script>
<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
<script src="https://code.jquery.com/jquery-3.6.4.min.js"
            integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
            crossorigin="anonymous"></script>          
</body>
</html>