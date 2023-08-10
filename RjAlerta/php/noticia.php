<?php

// Inclusão da Conexão

$dbHost = 'Localhost' ;
$dbUsername = 'root' ;
$dbPassword = '';
$dbName = 'rjalerta_db';

 $conn = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

 if($conn -> connect_errno){
     echo "erro";
 }
 else{
echo "conexao efetuada com sucesso";
 }
// Consulta ao banco de dados
$sql = "SELECT id, titulo, imagem, paragrafo, dat FROM noticias ORDER BY id DESC LIMIT 5";
$result = $conn->query($sql);

// Verificar se existem resultados
if ($result->num_rows > 0) {
    // Armazenar os dados em um array ou estrutura de dados
    $noticias = array();

    while ($row = $result->fetch_assoc()) {
        $noticias[] = $row;
    }
} else {
    echo "Nenhuma notícia encontrada.";
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
<title>Noticias</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../CSS/style.css">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,500;1,300;1,400&display=swap');
</style>

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
       <!--Página de Noticias-->
       <div class="main_box_news">
    
        <div class="second_box">
            <div class="news_box">

                    <div class="tile_news">
                      
                        <?php
                          // Exibir o título da primeira notícia
                          if (!empty($noticias)) {
                              $titulo = $noticias[0]["titulo"];
                              echo "<h1>$titulo</h1>";
                            }
                        ?>
                                  
                  
                  
                  </div>
                    <div class="img_news">
                      
                    
                    <?php
                      if (!empty($noticias)) {
                          $id = $noticias[0]["id"];
                          echo "<img src='gerar_imagem.php?id=$id' alt='Imagem da notícia'>";
                      }
                      ?>
                  
                  </div>
                    <div class="p_news" id="color_p">
                    <?php
                          // Exibir o título da primeira notícia
                          if (!empty($noticias)) {
                              $paragrafo = $noticias[0]["paragrafo"];
                              echo "<p>$paragrafo</p>";
                            }
                        ?>
                  
                  </div>
                    <div class="news_date">
                      <?php
                    // Exibir o data da primeira notícia
                          if (!empty($noticias)) {
                              $dat = $noticias[0]["dat"];
                              echo "<p>Postado em: $dat </p>";
                            }
                        ?>
                    
                      
                      </div>
                    </div>
                    <div class="news_box">

                    <div class="tile_news">
                      
                        <?php
                          // Exibir o título da primeira notícia
                          if (!empty($noticias)) {
                              $titulo = $noticias[1]["titulo"];
                              echo "<h1>$titulo</h1>";
                            }
                        ?>
                                  


                    </div>
                    <div class="img_news">
                      

                    <?php
                      if (!empty($noticias)) {
                          $id = $noticias[1]["id"];
                          echo "<img src='gerar_imagem.php?id=$id' alt='Imagem da notícia'>";
                      }
                      ?>

                    </div>
                    <div class="p_news" id="color_p">
                    <?php
                          // Exibir o título da primeira notícia
                          if (!empty($noticias)) {
                              $paragrafo = $noticias[1]["paragrafo"];
                              echo "<p>$paragrafo</p>";
                            }
                        ?>

                    </div>
                    <div class="news_date">
                      <?php
                    // Exibir o data da primeira notícia
                          if (!empty($noticias)) {
                              $dat = $noticias[1]["dat"];
                              echo "<p>Postado em: $dat </p>";
                            }
                        ?>

                      
                      </div>
                    </div>
                    <div class="news_box">

                    <div class="tile_news">
                      
                        <?php
                          // Exibir o título da primeira notícia
                          if (!empty($noticias)) {
                              $titulo = $noticias[2]["titulo"];
                              echo "<h1>$titulo</h1>";
                            }
                        ?>
                                  


                    </div>
                    <div class="img_news">
                      

                    <?php
                      if (!empty($noticias)) {
                          $id = $noticias[2]["id"];
                          echo "<img src='gerar_imagem.php?id=$id' alt='Imagem da notícia'>";
                      }
                      ?>

                    </div>
                    <div class="p_news" id="color_p">
                    <?php
                          // Exibir o título da primeira notícia
                          if (!empty($noticias)) {
                              $paragrafo = $noticias[2]["paragrafo"];
                              echo "<p>$paragrafo</p>";
                            }
                        ?>

                    </div>
                    <div class="news_date">
                      <?php
                    // Exibir o data da primeira notícia
                          if (!empty($noticias)) {
                              $dat = $noticias[2]["dat"];
                              echo "<p>Postado em: $dat </p>";
                            }
                        ?>

                      
                      </div>
                    </div>
                    <div class="news_box">

                    <div class="tile_news">
                      
                        <?php
                          // Exibir o título da primeira notícia
                          if (!empty($noticias)) {
                              $titulo = $noticias[3]["titulo"];
                              echo "<h1>$titulo</h1>";
                            }
                        ?>
                                  


                    </div>
                    <div class="img_news">
                      

                    <?php
                      if (!empty($noticias)) {
                          $id = $noticias[3]["id"];
                          echo "<img src='gerar_imagem.php?id=$id' alt='Imagem da notícia'>";
                      }
                      ?>

                    </div>
                    <div class="p_news" id="color_p">
                    <?php
                          // Exibir o título da primeira notícia
                          if (!empty($noticias)) {
                              $paragrafo = $noticias[3]["paragrafo"];
                              echo "<p>$paragrafo</p>";
                            }
                        ?>

                    </div>
                    <div class="news_date">
                      <?php
                    // Exibir o data da primeira notícia
                          if (!empty($noticias)) {
                              $dat = $noticias[3]["dat"];
                              echo "<p>Postado em: $dat </p>";
                            }
                        ?>

                      
                      </div>
                    </div>
                    <div class="news_box">

                    <div class="tile_news">
                      
                        <?php
                          // Exibir o título da quinta notícia
                          if (!empty($noticias)) {
                              $titulo = $noticias[4]["titulo"];
                              echo "<h1>$titulo</h1>";
                            }
                        ?>
                                  


                    </div>
                    <div class="img_news">
                      

                    <?php
                      if (!empty($noticias)) {
                          $id = $noticias[4]["id"];
                          echo "<img src='gerar_imagem.php?id=$id' alt='Imagem da notícia'>";
                      }
                      ?>

                    </div>
                    <div class="p_news" id="color_p">
                    <?php
                          
                          if (!empty($noticias)) {
                              $paragrafo = $noticias[4]["paragrafo"];
                              echo "<p>$paragrafo</p>";
                            }
                        ?>

                    </div>
                    <div class="news_date">
                      <?php
                    // Exibir o data da primeira notícia
                          if (!empty($noticias)) {
                              $dat = $noticias[4]["dat"];
                              echo "<p>Postado em: $dat </p>";
                            }
                        ?>

                      
                      </div>
                    </div>


    </div>


        </div>
        <?php 
          mysqli_close($conn);
        ?>
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
<script src="../php/jquery.js"></script>
<script src="../php/script.js"></script>
<script src="../php/html5shiv.js"></script>
<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
<script src="https://code.jquery.com/jquery-3.6.4.min.js"
            integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
            crossorigin="anonymous"></script>          
</body>
</html>