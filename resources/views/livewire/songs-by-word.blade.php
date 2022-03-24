

<div class="c-notebook__content">
    <p class="c-notebook__pageline c-notebook__pageline--back" onclick="turnPageBack()">← Retour</p>
    @foreach ($songs as $song)
        <p class="c-notebook__pageline"><span class="c-notebook__word" onclick="livewiresong({{$song->id}})">{{ $song->name }}<span></p>
    @endforeach
    <p class="c-notebook__pageline"> </p>

    <script>
        let livewireword;
            document.addEventListener('livewire:load', function () {
                livewireword = function(word){ 
                    turnPage()
                    @this.set('word',word);
                }
            });
    </script>
</div>