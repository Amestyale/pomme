
<div class="c-notebook__content c-notebook__content--flex">
<p class=" c-notebook__pageline c-notebook__pageline--back" onclick="turnPageBack()">← Retour</p>

@if($music)
<div class="c-notebook__flexcenter">
<div id="livewire_cassette" class="o-cassette o-cassette--flat o-cassette--drawing" onload="init_cassette(this, false)">
    <div class="o-cassette__slice">
        <p class="o-cassette__title o-cassette__title--slice">{{ $music->name }}</p>
    </div>
    <audio ontimeupdate="audio(this, {{ $music->id }})" class="u-hide" src="{{asset('/audio/song-'.$music->id.'.mp3')}}" autoplay> </audio>
    <div class="o-cassette__front u-border-drawing--reverse">
        <div class="o-cassette__buttons">
            <button class="js-button js-backward"><i class="fa-solid fa-backward-fast"></i></button>
            <button class="js-button js-play"><i class="fa-solid fa-play"></i></button>
            <button class="js-button js-stop"><i class="fa-solid fa-stop"></i></button>
            <button class="js-button js-forward"><i class="fa-solid fa-forward-fast"></i></button>
        </div>
        <div class="o-cassette__sticker u-border-drawing">
            <p class="o-cassette__title">{{ $music->name }}</p>
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
</div>
<div class="c-notebook__pageline c-notebook__pageline--column c-notebook__pageblock c-notebook__pageblock--fullcenter">
    <p class="c-notebook__pageblock--fullcenter lyrics_1 u-opacitytransition"> </p>
    <p class="c-notebook__pageblock--fullcenter lyrics_2 u-opacitytransition"> </p>
</div>
@endif
  
<script>
    let livewiresong;
    let lyrics;
    let current_lyric = 1;
    let current_time = -1;
    let audio
        document.addEventListener('livewire:load', function () {
            audio = function(element, id){
                if(!lyrics){
                    fetch(`/lyrics/song-${id}.json`)
                    .then(response => {
                        return response.json();
                    })
                    .then(jsondata => {
                        lyrics = jsondata
                        element.play()
                        change_lyrics(element)
                    });
                } else {
                    change_lyrics(element)
                }
            }
            function change_lyrics(audio){
                let lyric = lyrics.find((element, index, array) => audio.currentTime >= element.time && ((index+1) >= array.length || audio.currentTime < array[index+1].time ))
                if(current_time == lyric.time) return
                current_time = lyric.time
                if(current_lyric == 1){
                    document.querySelector(".lyrics_2").classList.add("u-opacitytransition--out")
                    document.querySelector(".lyrics_1").classList.remove("u-opacitytransition--out")
                    document.querySelector(".lyrics_1").innerHTML = lyric.lyric
                    current_lyric = 2
                } else {
                    document.querySelector(".lyrics_1").classList.add("u-opacitytransition--out")
                    document.querySelector(".lyrics_2").classList.remove("u-opacitytransition--out")
                    document.querySelector(".lyrics_2").innerHTML = lyric.lyric
                    current_lyric = 1
                }
                console.log(lyric)
            }
            
            livewiresong = function(song){ 
                lyrics = null
                current_time = -1
                current_lyric = 1
                @this.set('song',song);
                turnPage()
            }
        });
</script>
</div>