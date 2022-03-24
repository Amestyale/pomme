@extends('layouts.app')

@section('content')
<section>
    <section>
        <div class="c-notebook c-notebook--showcase">
            <div class="c-notebook__slot c-notebook__slot--right">
                <div class="c-notebook__page c-notebook__page--cover" onclick="this.classList.toggle('c-notebook__page--passed')">

                </div>
                <div class="c-notebook__page"  onclick="this.classList.toggle('c-notebook__page--passed')"> 
                    @foreach ($words  as $key => $value)
                        <p class="c-notebook__pageline  c-notebook__pageline--{{["center","left","right"][random_int(0,2)]}}"><span class="c-notebook__word" onclick="livewireword('{{ucfirst($key)}}')" style="--diff:{{ $value/max($words)}}">{{ ucfirst($key) }}<span></p>
                    @endforeach
                    <p class="c-notebook__pageline"> </p>
                </div>
                @livewire('songs-by-word')
                <div class="c-notebook__rings">
                    <div class="c-notebook__ring"></div>
                    <div class="c-notebook__ring"></div>
                    <div class="c-notebook__ring"></div>
                    <div class="c-notebook__ring"></div>
                </div>
            </div>
        </div>
    </section>
    <!--
    <section class="o-block l-container c-textdecoration">
        <h2 class="o-title2 u-hide">Recherche</h2>
        @foreach ($words  as $key => $value)
            <div class="l-child l-col{{random_int(2,3)}} c-textdecoration__word c-textdecoration__word--{{["center","left","right"][random_int(0,2)]}} c-textdecoration__word--{{ ["top","bottom","classic"][random_int(0,2)] }} c-textdecoration__word--{{ ["primary","secondary"][random_int(0,1)] }}" style="--diff:{{ $value/max($words)}}">
                <p>{{ ucfirst($key) }}</p>
            </div>
        @endforeach
        <div class="l-fullcenter c-textdecoration__content">
            <input class="o-input o-input--full"/>
        </div>
    </section>
    -->
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
    <br><br><br>
</section>
@stop

