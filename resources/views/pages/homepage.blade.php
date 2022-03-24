@extends('layouts.app')

@section('content')
    <section class="l-relative c-homebanner">
            <h1 class="c-hometitle l-horizontalcenter">Pomme</h1>
            <div class="c-notebook c-notebook--showcase u-nofirsttransition">
                <div class="c-notebook__page  c-notebook__page--passed c-notebook__page--cover u-nofirsttransition" onclick="turnPage(this)" style="--page-rotate:0deg;"></div>
                <div class="c-notebook__page  c-notebook__page--passed u-nofirsttransition" onclick="turnPage(this)" style="--page-rotate:5deg;"></div>
               
                <div class="c-notebook__page  c-notebook__page--decoration-backdeletion u-nofirsttransition" style="--page-rotate:10deg;" data-deletion="Mes nuits blanches &#xa; ne sont pas blanches &#xa; à peine claires">
                    <div class="c-notebook__content">
                        @foreach ($words  as $key => $value)
                            <p class="c-notebook__pageline  c-notebook__pageline--{{["center","left","right"][random_int(0,2)]}}"><span class="c-notebook__word" onclick="livewireword('{{ucfirst($key)}}')" style="--diff:{{ $value/max($words)}}">{{ ucfirst($key) }}<span></p>
                        @endforeach
                        <p class="c-notebook__pageline"> </p>
                    </div>
                </div>
                <div class="c-notebook__page c-notebook__page--decoration-trace u-nofirsttransition" style="--page-rotate:5deg;"> 
                    @livewire('songs-by-word')
                </div>
                
                <div class="c-notebook__page u-nofirsttransition" style="--page-rotate:4deg;"> 
                    @livewire('song-by-id')
                </div>

              <div class="c-notebook__page c-notebook__page--cover  u-nofirsttransition" style="--page-rotate:0deg;"></div>
            </div>
        </div>
    </section>

    <section class="c-cassettes l-relative">
        <div class="c-cassettes__container-cassettes l-relative" style="--nb-cassettes--collab:{{count($collaborations)}}">
        <h2 class="o-title2 c-cassettes__title c-cassettes__title--anticlock" style="--bottom:{{count($collaborations)-1}}">Collaborations</h2>
        @foreach ($collaborations as $collaboration)
            <div class="o-cassette" style="--bottom:{{count($collaborations) - $loop->index - 1 }};-translate--static:{{ rand(-0.5,0) }}em;-rotate--static:{{ rand(15,45) }}deg">
                    <div class="o-cassette__slice">
                        <p class="o-cassette__title o-cassette__title--slice">{{ $collaboration->title }}</p>
                    </div>
                    <audio class="u-hide" src="{{asset('/audio/song-'.$collaboration->id.'.mp3')}}"> </audio>
                    <div class="o-cassette__front">
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

        <h2 class="o-title2 c-cassettes__title c-cassettes__back c-cassettes__title--clock" style="--bottom:{{count($participations)-1}}">Participations</h2>
        @foreach ($participations as $part)
            <div class="o-cassette c-cassettes__back" style="--bottom:{{count($participations) - $loop->index - 1 }};-translate--static:{{ rand(-0.5,0) }}em;-rotate--static:{{ rand(15,45) }}deg">
                    <div class="o-cassette__slice">
                        <p class="o-cassette__title o-cassette__title--slice">{{ $part->title }}</p>
                    </div>
                    <audio class="u-hide" src="{{asset('/audio/song-'.$part->id.'.mp3')}}"> </audio>
                    <div class="o-cassette__front">
                        <div class="o-cassette__sticker">
                            <p class="o-cassette__title">{{ $part->title }}</p>
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
        </div>
        <div class="c-cassettes__container-player u-flex u-flex--bottom">
            <div class="c-cassettes__player">
                <div class="o-player__background"></div>
                <div class="o-player">
                    <div class="o-player__block"> 
                    </div>
                    <div class="o-player__flapper"></div>
                    <div class="o-player__controls"> 
                        <button onclick="player_back()" class="js-button js-player-backward"><i class="fa-solid fa-backward-fast"></i></button>
                        <button onclick="player_play()" class="js-button js-player-play"><i class="fa-solid fa-play"></i></button>
                        <button onclick="player_stop()" class="js-button js-player-stop"><i class="fa-solid fa-stop"></i></button>
                        <button onclick="player_forward()" class="js-button js-player-forward"><i class="fa-solid fa-forward-fast"></i></button>
                        <button onclick="player_eject()" class="js-button js-player-eject"><i class="fa-solid fa-eject"></i></button>
                    </div>
                </div>
            </div>
        </div>

    </section>
@stop

