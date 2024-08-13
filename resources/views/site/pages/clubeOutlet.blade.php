@extends('site.layouts.app')

@section('content')
    <div class="engloba-desconto">

        <div class="wrap">
            <div class="clube-desconto col-inline col-7">
                <h1 class="titulo">{{$discountClub->title}}</h1>

                <h3 class="subtitulo">{{$discountClub->subtitle}}</h3>

                <p>{{$discountClub->description}}</p>

                <div class="engloba-box-funciona">
                    <h4 class="titulo">Veja com funciona</h4>

                    <div class="passos">
                        @foreach ($howWorks as $howWork)
                            <div class="box-funciona col-inline">
                                <div class="content">
                                    <div class="image">
                                        <img src="{{asset('storage/admin/uploads/fotos/'.$howWork->path_image)}}" alt="">
                                    </div>

                                    <div class="descricao">
                                        <h5 class="titulo">{{$howWork->title}}</h5>
                                    </div>
                                </div>

                            </div><!--Final box-funciona-->
                            <div class="seta col-inline">
                                <img src="{{asset('site/assets/images/seta-top.png')}}" alt="seta">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="formulario col-inline col-5">

                <h4 class="titulo">Inscreva-se</h4>

                <form action="{{route('site.newsletter.store')}}" method="POST">
                    @csrf
                    <label for="">
                        <input type="text" name="name" placeholder="Digite seu nome">
                    </label>
                    <label for="">
                        <input type="text" name="email" placeholder="Email">
                    </label>
                    <label for="">
                        <input type="text" name="profession" placeholder="Profissão">
                    </label>
                    <label for="telefone">
                        <input type="text" name="phone" id="telefone" placeholder="Telefone (Whatsapp)" onkeyup="mascara( this, mtel );" maxlength="15">
                    </label>

                    <button type="submit" class="dir trans-slow ">Participar</button>
                </form>
            </div>
        </div>
    </div>

    <div class="vantagem">
        <div class="wrap">
            <div class="engloba-titulo">
                <h3 class="titulo">Confira todas as vantagens</h3>

                <div class="border"></div>
            </div>

            <div class="engloba-box-vantagem">
                <div class="carousel-vantagem owl-carousel">
                    @foreach ($advantages as $advantage)
                        <div class="box-vantagem col-inline">
                            <div class="content">
                                <div class="container">
                                    <div class="central">
                                        <div class="image">
                                            <img src="{{asset('storage/admin/uploads/fotos/'.$advantage->path_image)}}" alt="icone">
                                        </div>

                                        <div class="descricao">
                                            <h4 class="titulo">{{$advantage->title}}</h4>

                                            <p>{{$advantage->description}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--Final box-vantagem-->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
