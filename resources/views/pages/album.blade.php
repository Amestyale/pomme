@extends('layouts.app')

@section('content')
    <!--
    <section class="c-home l-group">
        <div class="l-restplace">
            <h1 class="c-hometitle">Pomme</h1>
        </div>

        <div>
            <img class="c-home__img" src="{{asset('/images/artists/pomme/eye.png')}}"/>
        </div>
    </section>
    -->
    <section class="l-relative c-homebanner">
            <h1 class="c-hometitle l-horizontalcenter">Pomme</h1>
            <div class="c-notebook c-notebook--showcase u-nofirsttransition">
                <div class="c-notebook__page  c-notebook__page--passed c-notebook__page--cover u-nofirsttransition" onclick="turnPage(this)" style="--page-rotate:0deg;"></div>
                <div class="c-notebook__page  c-notebook__page--passed u-nofirsttransition" onclick="turnPage(this)" style="--page-rotate:5deg;"></div>
               
                <div class="c-notebook__page u-nofirsttransition" style="--page-rotate:10deg;">
                    <div class="c-notebook__content">
                        @foreach ($words  as $key => $value)
                            <p class="c-notebook__pageline  c-notebook__pageline--{{["center","left","right"][random_int(0,2)]}}"><span class="c-notebook__word" onclick="livewireword('{{ucfirst($key)}}')" style="--diff:{{ $value/max($words)}}">{{ ucfirst($key) }}<span></p>
                        @endforeach
                        <p class="c-notebook__pageline"> </p>
                    </div>
                </div>
                <div class="c-notebook__page u-nofirsttransition" style="--page-rotate:5deg;"> 
                    @livewire('songs-by-word')
                </div>
                
                <div class="c-notebook__page u-nofirsttransition" style="--page-rotate:4deg;"> 
                    @livewire('song-by-id')
                </div>

              <div class="c-notebook__page c-notebook__page--cover  u-nofirsttransition" style="--page-rotate:0deg;"></div>
            </div>
        </div>
    </section>
    
    <!--
    <section class="o-block c-discotheque">
        <h2 class="o-title2">Albums</h2>
        <div class="c-discotheque__albums">
        @foreach ($albums as $album)
            @if($loop->last)
                <article class="c-album c-album--discotheque s-active" style="--bg-color:{{ $album->color }};--imgsrc:url('{{asset('/images/albums/cover-'.$album->id.'.jpg')}}')">
            @else
                <article class="c-album c-album--discotheque" style="--bg-color:{{ $album->color }};--imgsrc:url('{{asset('/images/albums/cover-'.$album->id.'.jpg')}}')">
            @endif

                <h1 class="c-album__title"> {{ $album->name }}</h1>
                <div class="c-album__cover">
                    <img src="{{asset('/images/albums/cover-'.$album->id.'.jpg')}}"/>
                </div>
                <p class="c-album__release" >Sorti le <time datetime="2017-10-06">6 octobre 2017</time></p>
                <p class="c-album__description" >{{ $album->description }}</p>
                <p class="c-album__slice">{{ ($album->shortname) ? $album->shortname : $album->name }}</p>
            </article>
        @endforeach
        </div>
    </section>
    -->
        
    <section class="o-block c-cassettes l-container l-relative">
        <h2 class="o-title2 l-child l-col12">Collaborations et Participations</h2>
        @foreach ($collaborations as $collaboration)
        <div class="l-child l-col4 o-cassette">
                <div class="o-cassette__slice">
                    <p class="o-cassette__title o-cassette__title--slice">{{ $collaboration->title }}</p>
                </div>
                <audio class="u-hide" src="{{asset('/audio/song-'.$collaboration->id.'.mp3')}}"> </audio>
                <div class="o-cassette__front">
                    <div class="o-cassette__buttons">
                        <button class="js-button js-backward"><i class="fa-solid fa-backward-fast"></i></button>
                        <button class="js-button js-play"><i class="fa-solid fa-play"></i></button>
                        <button class="js-button js-stop"><i class="fa-solid fa-stop"></i></button>
                        <button class="js-button js-forward"><i class="fa-solid fa-forward-fast"></i></button>
                    </div>
                    <div class="o-cassette__sticker">
                        <p class="o-cassette__title">{{ $collaboration->title }}</p>
                        <div class="o-cassette__central">
                            <div class="o-cassette__tape">
                                <div class="o-cassette__hole"></div>
                                <div class="o-cassette__transparent"></div>
                                <div class="o-cassette__hole"></div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        @endforeach
    </section>

        <br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br>
        <br><br><br><br><br><br><br><br><br><br><br><br>
@stop

