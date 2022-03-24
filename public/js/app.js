let disks = document.querySelectorAll(".c-album--discotheque")
disks.forEach((disk)=>{
    disk.querySelector(".c-album__slice").addEventListener("click",()=>{
        Array.from(disks).map((d) => { if(d != disk) d.classList.remove("s-active") })
        disk.classList.toggle("s-active")
    })
})
let cassettes = document.querySelector(".c-cassettes").querySelectorAll(".o-cassette")

cassettes.forEach((cassette)=>{
    init_cassette(cassette)
})

let player = document.querySelector(".o-player")
document.querySelector(".c-cassettes").style.setProperty('--player-margin', ((player.parentNode.parentNode.clientWidth - player.clientWidth)/2) + "px" );

document.addEventListener("DOMNodeInserted",(e)=> {
    if(typeof e.target.querySelectorAll !== 'function')return
    e.target.querySelectorAll(".o-cassette").forEach((cassette) => {
        init_cassette(cassette,false)
    })
})


function init_cassette(cassette, pack = true){
    if(pack){
        cassette.addEventListener("click",()=>{
            document.querySelector(".c-cassettes").querySelectorAll(".o-cassette.s-active").forEach(c => {
                c.classList.remove("s-active")
                c.classList.add("s-unactiving")
                setTimeout(() => {
                    c.classList.remove("s-unactiving")
                }, 2000);
                pause(c)
            })

            let parent = cassette.closest(".c-cassettes")
            if(parent){
                let time = getComputedStyle(parent).getPropertyValue('--cassettes-transition-time').replace(/\D/g,'') * 1000 
                if(parent.querySelector(".s-active")){
                    parent.querySelectorAll(".s-active").forEach((elem)=>{
                        elem.classList.remove("s-active")
                    })
                    setTimeout(() => {
                        cassette.classList.toggle("s-active")
                        document.querySelector(".o-player").classList.add("s-active")
                        setTimeout(() => {
                            play(cassette)
                        }, time );
                    }, time);
                } else {
                    cassette.classList.toggle("s-active")
                    document.querySelector(".o-player").classList.add("s-active")
                    setTimeout(() => {
                        play(cassette)
                    }, time );
                }
            } else {
                cassette.classList.toggle("s-active")
            }
        })
    } else {
        let buttons = cassette.querySelectorAll(".js-button")
        buttons.forEach(button => {
            button.addEventListener("click",(e)=>{
                e.stopPropagation()
                cassette_button(cassette,button)
            })
        });
    }
    let audio = cassette.querySelector("audio")
    audio.addEventListener("timeupdate",()=>{
        cassette.style.setProperty('--roll-progression', audio.currentTime / audio.duration);
    })
}
function play(cassette){
    cassette.querySelector("audio").play()
    backfor(cassette, 1)
}
function pause(cassette){
    cassette.querySelector("audio").pause()
    backfor(cassette, 0)
}
function backfor(cassette, playbackRate){
    let audio = cassette.querySelector("audio")
    if(playbackRate<0){
        audio.playbackRate = 1
        audio.currentTime = 0
    } else {
        audio.playbackRate = playbackRate
    }
    audio.play()
}

function cassette_button(cassette, button){
    console.log(button)
    let buttons = cassette.querySelectorAll(".js-button")
    Array.from(buttons).map((b) => { if(b != button) b.classList.remove("s-active") })

    console.log(button.classList.contains("js-stop"))
    if(button.classList.contains("js-stop")){
        pause(cassette)
    } else if(button.classList.contains("js-play")) {
        play(cassette)
    } else if(button.classList.contains("js-backward")){
        backfor(cassette, -1)
    } else if(button.classList.contains("js-forward")){
        backfor(cassette, 5)
    }

    button.classList.add("s-active")
    if(button.classList.contains("js-stop")) {
        setTimeout(() => {
            button.classList.remove("s-active")
        }, 500);
    }
}

document.addEventListener("scroll",function(){
    let scroll = document.documentElement.scrollTop
    if(scroll>100) {
        document.querySelector(".c-notebook").classList.remove("c-notebook--showcase")
        openBook()
    } else document.querySelector(".c-notebook").classList.add("c-notebook--showcase")
    console.log(document.documentElement.scrollTop, "scrolling")

});
document.addEventListener("DOMContentLoaded", function(event) { 
    document.querySelectorAll('.u-nofirsttransition').forEach((el)=>{
        el.classList.remove('u-nofirsttransition')
    })
});

function openBook(){
    document.querySelector(".c-notebook").classList.add("c-notebook--open")
    document.querySelector(".c-notebook__page--cover").classList.add("c-notebook__page--passed")
}

function turnPage(page = null){
    if(page) page.classList.add("c-notebook__page--passed")
    else document.querySelector(".c-notebook__page:not(.c-notebook__page--passed)").classList.add("c-notebook__page--passed")
}

function turnPageBack(){
    const last = Array.from(document.querySelectorAll('.c-notebook__page--passed')).pop()
    last.classList.remove("c-notebook__page--passed")
}

function player_button(button = null){
    let current = document.querySelector(".c-cassettes__player").querySelector(".js-button.s-active")
    if(current) current.classList.remove("s-active")
    document.querySelector(".c-cassettes__player").querySelector(`.js-player-${button}`).classList.add("s-active")
}

function player_play(){
    let cassette = get_current_cassette()
    if(!cassette) return
    player_button("play")
    play(cassette)
}
function player_stop(){
    let cassette = get_current_cassette()
    if(!cassette) return
    player_button("stop")
    pause(cassette)
} 
function player_back(){
    let cassette = get_current_cassette()
    if(!cassette) return
    player_button("backward")
    backfor(cassette, -1)
} 
function player_forward(){
    let cassette = get_current_cassette()
    if(!cassette) return
    player_button("forward")
    backfor(cassette, 5)
} 

function player_eject(){
    let cassette = get_current_cassette()
    if(!cassette) return
    cassette.classList.remove("s-active");
    document.querySelector(".o-player").classList.remove("s-active")
    pause(cassette)

}

function get_current_cassette(){
    return document.querySelector(".o-cassette.s-active")
}