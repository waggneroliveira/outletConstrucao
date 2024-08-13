<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Walmeida</title>
        <!-- favicon -->
        <link rel="shortcut icon" href="images/favicon.png" />
        <!-- Links externos CSS -->
        <link type="text/css" rel="stylesheet" href="css/padrao/default.css" />
        <!-- estrutura padrao -->
        <link type="text/css" rel="stylesheet" href="css/plugins/jquery.fancybox.min.css">
        <!-- padrao fancybox 3 -->
        <link type="text/css" rel="stylesheet" href="css/plugins/owl.carousel.css">
        <!-- padrao owl.carousel -->
        <link type="text/css" rel="stylesheet" href="css/padrao/linkFontes.css">
        <!-- padrao linkFontes -->
        <link type="text/css" rel="stylesheet" href="css/main.css" />
        <!-- tema padrao -->
        <!-- Links externos JS -->
        <script type="text/javascript" src="funcoes/biblioteca/jquery-3.3.1.min.js"></script>
    </head>
    <body>
        <section id="pagina">
            <!--***********START HEADER********-->  		
            <header id="topo" class="normal secao">
                <div class="wrap">
                    <div class="logo" id="logo">
                        <a href="home.blade.php">
                        <img src="images/logo.png" alt="">
                        </a>
                    </div>
                    <div class="engloba-super-menu trans-slow">
                        <!--***********START MEGA MENU********-->  		
                        <div id="mega-menu" class="col-inline">
                            <div class="content">
                                <a href="javascript::" class="link-full"></a>
                                <h5 class="titulo"> <i class="icon-text">&#xe8d4;</i> Nossos Produtos <i class="icon-text">&#xe93e;</i></h5>
                            </div>
                            <div class="submenu dropdown">
                                <div class="content back">
                                    <a href="produtos-inter.blade.php" class="image col-inline"  style="background-image: url(images/banner.png);">                                
                                    </a>
                                    <div class="categoria col-inline">
                                        <nav>
                                            <ul  class="col-inline">
                                                <p>categoria01</p>
                                                <li>
                                                    <a href="javascript::">Produto01</a>
                                                </li>
                                                <li>
                                                    <a href="javascript::">Produto01</a>
                                                </li>
                                                <li>
                                                    <a href="javascript::">Produto01</a>
                                                </li>
                                                <li>
                                                    <a href="javascript::">Produto01</a>
                                                </li>
                                                <li>
                                                    <a href="javascript::">Produto01</a>
                                                </li>
                                            </ul>
                                            <ul  class="col-inline">
                                                <p>categoria01</p>
                                                <li>
                                                    <a href="javascript::">Produto01</a>
                                                </li>
                                                <li>
                                                    <a href="javascript::">Produto01</a>
                                                </li>
                                                <li>
                                                    <a href="javascript::">Produto01</a>
                                                </li>
                                                <li>
                                                    <a href="javascript::">Produto01</a>
                                                </li>
                                                <li>
                                                    <a href="javascript::">Produto01</a>
                                                </li>
                                            </ul>
                                            <ul  class="col-inline">
                                                <p>categoria02</p>
                                                <li>
                                                    <a href="javascript::">Produto01</a>
                                                </li>
                                                <li>
                                                    <a href="javascript::">Produto01</a>
                                                </li>
                                                <li>
                                                    <a href="javascript::">Produto01</a>
                                                </li>
                                                <li>
                                                    <a href="javascript::">Produto01</a>
                                                </li>
                                                <li>
                                                    <a href="javascript::">Produto01</a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--***********END MEGA MENU********-->  		
                        <div class="engloba-menu col-inline">
                            <nav>
                                <ul>
                                    <li class="col-inline">
                                        <a href="#">Promoções</a>
                                    </li>
                                    <li class="col-inline">
                                        <a href="#">Blog</a>
                                    </li>
                                    <li class="col-inline">
                                        <a href="#">Cadastre-se</a>
                                    </li>
                                    <li class="col-inline">
                                        <a href="#">Logar</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="options col-inline">
                            <div class="whilist col-inline">
                                <a href="javascript::" class="icon-text">&#xe819;</a>
                            </div>
                        </div>
                        <a id="cart" href="javascript::" class="col-inline">
                        <i class="cart_count">01</i>
                        <img src="images/cart.png" alt="">
                        </a>
                        <div id="seach" class="col-inline">
                            <a href="javascript::" class="icon-text">&#xe816;</a>
                        </div>
                    </div>
                </div>
            </header>
            <!--***********END HEADER********--> 
            <section id="meus_dados" class="secao">
                <div class="wrap">
                    <div class="guia-pag dir">
                        <a href="javascript::" class="col-inline">Categorias</a>
                        <i class="col-inline">/</i>
                        <a href="javascript::" class="col-inline">Cards Especiais</a>
                    </div>
                    <div id="menu-dado" class="col-inline col-3">
                        <h4 class="titulo"><b>Olá,</b>Daniel Maia</h4>
                        <nav>
                            <ul>
                                <li class="trans-slow click-dado">
                                    <div class="image col-inline">
                                        <img src="images/user.png" alt="">
                                    </div>
                                    <a href="meus-dados.blade.php" onclick = ""class="col-inline"> Meus dados</a>
                                </li>
                                <li class="trans-slow click-dado">
                                    <div class="image col-inline">
                                        <img src="images/user.png" alt="">
                                    </div>
                                    <a href="enderecos.blade.php"onclick = "''"class="col-inline click-ajax">Meus endereços</a>
                                </li>
                                <li class="trans-slow click-dado">
                                    <div class="image col-inline">
                                        <img src="images/user.png" alt="">
                                    </div>
                                    <a href="meus-pedidos.blade.php" onclick = ""class="col-inline">Meus Pedidos</a>
                                </li>
                                <li class="trans-slow click-dado">
                                    <div class="image col-inline">
                                        <img src="images/user.png" alt="">
                                    </div>
                                    <a href="favoritos.blade.php"onclick = "" class="col-inline">Favoritos</a>
                                </li>
                                <li class="trans-slow click-dado">
                                    <div class="image col-inline">
                                        <img src="images/user.png" alt="">
                                    </div>
                                    <a href="ajuda.blade.php"onclick = "" class="col-inline">Ajuda</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div id="ajuda" class="col-inline col-9">
                        <h4 class="titulo">Ajuda</h4>
                        <div class="engloba-box-contato">
                            <div class="box-contato col-inline">
                                <div class="content">
                                    <p><i class="icon-text">&#xf232;</i>71 9000-0000</p>
                                </div>
                            </div>
                            <div class="box-contato col-inline">
                                <div class="content">
                                    <p><i class="icon-text">&#xe861;</i>71 9000-0000</p>
                                </div>
                            </div>
                            <div class="box-contato col-inline">
                                <div class="content">
                                    <p><i class="icon-text">&#xec9f;</i>contato@sertenge.com.br</p>
                                </div>
                            </div>
                        </div>
                        <div class="form">
                            <form action="" method="post">
                                <div class="label-input col-inline col-x2">
                                    <label for="name">
                                    <input type="text" name="name" id="name" placeholder="Nome">
                                    </label>                                    
                                </div>
                                <div class="label-input col-inline col-x2">
                                    <label for="email">
                                    <input type="text" name="email" id="email" placeholder="Email">
                                    </label>                                    
                                </div>
                                <div class="label-input col-inline col-x2">
                                    <label for="telefone">
                                    <input type="text" name="telefone" id="telefone" placeholder="telefone">
                                    </label>                                    
                                </div>
                                <div class="label-input col-inline col-x2">
                                    <select name="assunto" id="assunto">
                                        <option value="0" disable>Escolha o Assunto</option>
                                        <option value="frete">Frete</option>
                                        <option value="develucao">Devolução</option>
                                        <option value="tempo">Tempo</option>
                                        <option value="outro">Outros</option>
                                    </select>
                                </div>
                                <textarea name="mesage" id="mesage" cols="30" rows="10" value="Mensagem" placeholder="Assunto"></textarea>
                                <input type="submit" value="Enviar" class="trans-slow envia">
                            </form>
                        </div>
                        <div id="fedeback">
                            <h4 class="tituulo">Perguntas Frequentes</h4>
                            <div class="engloba-pergunta">
                                <div class="box-pergunta click-pergunta">
                                    <div class="content">
                                        <a href="javascript::" class="link-full"></a>
                                        <i class="icon-text">&#xe877;</i>
                                        <h3 class="pergunta">Quanto tempo leva para chegar o meu produto?</h3>
                                        <div class="resposta-oculto">
                                            <p>
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                At odit praesentium obcaecati magni id maxime rerum quos
                                                nobis voluptas cupiditate.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="next-pergunta">
                                <a href="javscript::">Carregar mais perguntas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="rede_social" class="secao">
                <div class="wrap">
                    <div class="globa-rede">
                        <div class="box-rede-social col-inline col-x3">
                            <div class="content">
                                <a href="javascript:void(0)" class="link-full"></a>
                                <div class="image">
                                    <img src="images/wpp.png" alt="">
                                </div>
                                <div class="descricao">
                                    <h3 class="titulo">Peça pelo Whatsapp</h3>
                                    <a href="javascript:void(0)">71 9 9999-9999</a>
                                </div>
                            </div>
                        </div>
                        <div class="box-rede-social col-inline col-x3">
                            <div class="content">
                                <a href="javascript:void(0)" class="link-full"></a>
                                <div class="image">
                                    <img src="images/face.png" alt="Facebook">
                                </div>
                                <div class="descricao">
                                    <h3 class="titulo">Curtiu nosso site ?</h3>
                                    <a href="javascript:void(0)">fb.com/nonnilapasta</a>
                                </div>
                            </div>
                        </div>
                        <div class="box-rede-social col-inline col-x3">
                            <div class="content">
                                <a href="javascript:void(0)" class="link-full"></a>
                                <div class="image">
                                    <img src="images/insta.png" alt="Instagram">
                                </div>
                                <div class="descricao">
                                    <h3 class="titulo">Siga a gente no Insta!</h3>
                                    <a href="javascript:void(0)">#nonnilapasta</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="newsllatter" class="secao" style="background-image: url(images/new.png);">
                <div class="wrap">
                    <div class="engloba-nwes dir">
                        <h4 class="titulo">Newsletter</h4>
                        <form action="" method="post">
                            <label for="nome" class="row">
                            <input type="text" name="nome" id="nome" placeholder="Nome">
                            </label>
                            <label for="email" class="row">
                            <input type="text" name="email" id="email" placeholder="Email">
                            </label>
                            <input type="submit" name="enviar" id="enviar" value="enviar" class="trans-slow">
                        </form>
                    </div>
                </div>
            </section>
            <!--  fim section id="rede_social" class="secao"> -->
            <!-- start footer-->
            <section id="footer" class="secao">
                <div class="wrap">
                    <div class="engloba-footer">
                        <ul class="logo col-inline">
                            <li>
                                <a href="home">
                                <img src="images/loog-footer.png" alt="">
                                </a>
                            </li>
                        </ul>
                        <ul class="menu-footer col-inline">
                            <li class="col-inline"><a href="home.blade.php">Home</a></li>
                            <li class="col-inline"><a href="sobre.blade.php">Quem Somos</a></li>
                            <li class="col-inline"><a href="Artigos">Artigos</a></li>
                            <li class="col-inline"><a href="produtos">Produtos</a></li>
                            <li class="col-inline"><a href="Contato">Contato</a></li>
                        </ul>
                        <ul class="contato col-inline">
                            <li>
                                <i class="tell">71 0000-0000</i>
                                <p>
                                    Lorem ipsum dolor sit amet, 
                                    consectetuer adipiscing elit. Aenean
                                    commodo ligula eget dolor. Aenean 
                                </p>
                            </li>
                        </ul>
                        <ul class="rede-social col-inline">
                            <li class="col-  inline">
                                <a href="#" target="_blank" class="icon-text">&#xecd1;</a>
                            </li>
                            <li class="col-inline">
                                <a href="#" target="_blank" class="icon-text">&#xf232;</a>
                            </li>
                            <li class="col-inline">
                                <a href="#" target="_blank" class="icon-text">&#xf16d;</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>
        </section>
        <!-- fim #pagina -->
        <!-- end footer-->
        <!-- start direitos altorais -->
        <section id="credito" class="secao">
            <div class="wrap">
                <p class="esq">2020 © Todos os direitos reservados.</p>
                <a href="https://hoom.com.br/" target="_blank"><img src="images/hoom.png" class="hoom dir"
                    alt="Hoom Interativa"></a>
            </div>
        </section>
        <!-- end direitos altorais -->
        </section>
        <!-- Links externos JS -->
        <script type="text/javascript" src="funcoes/plugins/jquery.fancybox.min.js"></script>
        <script type="text/javascript" src="funcoes/plugins/owl.carousel.min.js"></script>
        <script type="text/javascript" src="funcoes/plugins/instagramLite.js"></script>
        <script type="text/javascript" src="funcoes/plugins/jquery.menusidebar.js"></script>
        <script type="text/javascript" src="funcoes/plugins/jquery.banner.js"></script>
        <script type="text/javascript" src="svg/pathSVG.js"></script>
        <script type="text/javascript" src="funcoes/default.js"></script>
        <script type="text/javascript" src="funcoes/main.js"></script>
        <script type="text/javascript" src="funcoes/theme.js"></script>
        </section>
    </body>
</html>