<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Varcamp</title>
    <link rel="stylesheet" href="varcamp.css">
    <style>
        #container{
    border: 2px solid black;
    background-repeat: no-repeat;
    background-size: cover;
    background-clip: unset;
    position: relative;
}

.office{
    width: 1500px;
    height: 1015px;
}

.conference{
    width: 1500px;
    height: 872px;
}
.obstacle,#portal {
    position: absolute;
}


    </style>
</head>
<body>
    @php
        $event_id = request('id');
        $meetinglink = App\Models\Event::find($event_id)->link;
    @endphp
    <div id="container" class="conference" style="background-image : url({{asset('storage/courseHomeImage/conference.png')}});">

    <div style="width: 80%; height: 20%;" class="obstacle"></div>
    <div style="width: 8%; height: 100%; right: 0;" class="obstacle"></div>
    <div style="width: 4%; height: 100%; left: 0;" class="obstacle"></div>
    <div style="width: 100%; height: 6%; bottom: 0;" class="obstacle"></div>
    <div style="width: 13%; height: 15%; top: 22%; left: 12.5%;" class="obstacle"></div>
    <div style="width: 21%; height: 9%; top: 22%; right: 29%;" class="obstacle"></div>
    <div style="width: 9%; height: 5%; top: 22%; left: 35%;" class="obstacle"></div>
    <div style="width: 20.5%; height: 5%; top: 51%; left: 8.5%;" class="obstacle"></div>
    <div style="width: 20.5%; height: 5%; bottom: 29.5%; left: 8.5%;" class="obstacle"></div>
    <div style="width: 20.5%; height: 5%; bottom: 15.5%; left: 8.5%;" class="obstacle"></div>
    <div style="width: 4%; height: 22%; bottom: 7%; left: 37.5%;" class="obstacle"></div>
    <div style="width: 4%; height: 7%; bottom: 36%; left: 37.5%;" class="obstacle"></div>
    <div style="width: 8.3%; height: 7%; bottom: 30.5%; right: 25%;" class="obstacle"></div>
    <div style="width: 8.3%; height: 7%; bottom: 30.5%; right: 41.6%;" class="obstacle"></div>
    <div style="width: 6.6%; height: 7%; bottom: 7%; right: 26%;" class="obstacle"></div>
    <div style="width: 6.6%; height: 7%; bottom: 7%; right: 42.6%;" class="obstacle"></div>
    <div style="width: 3%; height: 10%; top: 21%; left: 5%;" class="obstacle"></div>

    <div id="portal" style="width: 10.5%; height: 5%; top: 14.5%; right: 9%;"></div>

    </div>
</body>
<script>
    const terrain = document.getElementById("container");
const room = terrain.classList[0];
const bound = terrain.getBoundingClientRect();
const obst = document.getElementsByClassName("obstacle");
const port = document.getElementById("portal");

const entrance = {
        top : port.offsetTop,
        bottom : port.offsetTop+port.offsetHeight,
        left : port.offsetLeft,
        right : port.offsetLeft+port.offsetWidth
}
console.log(entrance.top)
console.log(entrance.bottom)
console.log(entrance.left)
console.log(entrance.right)

{const player = document.createElement("div");
player.id = 'player';
player.style.position = 'absolute';
player.style.backgroundSize = 'contain';
player.style.backgroundRepeat = 'no-repeat';
player.style.backgroundPosition = 'center';
if(room=='office'){
        player.style.width = '50px';
        player.style.height = '50px';
        player.style.left = '4%';
        player.style.bottom = '15%';
        player.style.backgroundImage = "url({{asset('storage/courseHomeImage/playerUp.png')}})";
}else if(room=='conference'){
        player.style.width = '60px';
        player.style.height = '60px';
        player.style.right = '13%';
        player.style.top = '21%';
        player.style.backgroundImage = "url({{asset('storage/courseHomeImage/playerDown.png')}})"
}
terrain.appendChild(player);
}

const Player = {
        player: document.getElementById("player"),
        top : document.getElementById("player").offsetTop,
        left : document.getElementById("player").offsetLeft,
        step: 5,
        get bottomSide() {
                switch(room){
                        case 'office' : bottom = document.getElementById("player").offsetTop+40;break;
                        case 'conference' : bottom = document.getElementById("player").offsetTop+60;break;
                }
                return bottom;
        },
        get rightSide() {
                switch(room){
                        case 'office' : right = document.getElementById("player").offsetLeft+40;break;
                        case 'conference' : right = document.getElementById("player").offsetLeft+60;break;
                }
                return right;
        },
        bottom : this.bottomSide,
        right : this.rightSide,
        getPlayerposition : function(){
                this.top = document.getElementById("player").offsetTop;
                this.left = document.getElementById("player").offsetLeft;
                switch(room){
                        case 'office' : this.bottom = document.getElementById("player").offsetTop+40;this.right = document.getElementById("player").offsetLeft+40;break;
                        case 'conference' : this.bottom = document.getElementById("player").offsetTop+60;this.right = document.getElementById("player").offsetLeft+60;break;
                }
        }
};
let obstacles = [];
for(i=0;i<obst.length;i++){
        const Obstacle = {
                obstacle : obst[i],
                top : obst[i].getBoundingClientRect().top-bound.top,
                bottom : obst[i].getBoundingClientRect().top-bound.top+obst[i].getBoundingClientRect().height,
                left : obst[i].getBoundingClientRect().left-bound.left,
                right : obst[i].getBoundingClientRect().left-bound.left+obst[i].getBoundingClientRect().width,
                internet : obst[i].classList.contains("internet"),
                meet : obst[i].classList.contains("meet"),
                haveChild : false
        };
        obstacles.push(Obstacle);
}

function isColliding(key){
    flag = false;
    for(i=0;i<obstacles.length;i++) {
        flag2 = false;
       switch(key){
        case'w':
                if(obstacles[i].bottom>(Player.top-Player.step)&&obstacles[i].bottom<Player.top&&((obstacles[i].left<=Player.left&&obstacles[i].right>=Player.right)||(obstacles[i].left>=Player.left&&obstacles[i].left<=Player.right)||(obstacles[i].right>=Player.left&&obstacles[i].right<=Player.right))){flag=true;flag2=true;}
                break;
        case's':
                if(obstacles[i].top<(Player.bottom+Player.step)&&obstacles[i].top>Player.top&&((obstacles[i].left<=Player.left&&obstacles[i].right>=Player.right)||(obstacles[i].left>=Player.left&&obstacles[i].left<=Player.right)||(obstacles[i].right>=Player.left&&obstacles[i].right<=Player.right))){flag=true;flag2=true;}
                break;
        case'a':
                if(obstacles[i].right>(Player.left-Player.step)&&obstacles[i].right<Player.left&&((obstacles[i].top<=Player.top&&obstacles[i].bottom>=Player.bottom)||(obstacles[i].top>=Player.top&&obstacles[i].top<=Player.bottom)||(obstacles[i].bottom>=Player.top&&obstacles[i].bottom<=Player.bottom))){flag=true;flag2=true;}
                break;
        case'd':
                if(obstacles[i].left<(Player.right+Player.step)&&obstacles[i].left>Player.right&&((obstacles[i].top<=Player.top&&obstacles[i].bottom>=Player.bottom)||(obstacles[i].top>=Player.top&&obstacles[i].top<=Player.bottom)||(obstacles[i].bottom>=Player.top&&obstacles[i].bottom<=Player.bottom))){flag=true;flag2=true;}
                break;
        }
        if(obstacles[i].internet&&flag2){
                popUp(obstacles[i].obstacle,"internet");
                setTimeout(()=>{
                        pop = document.getElementById("pop-up");
                        if (pop!=null){pop.parentNode.removeChild(pop);}
                },3000)
        }else if(obstacles[i].meet&&flag2){
                popUp(obstacles[i].obstacle,"meet");
                setTimeout(()=>{
                        pop = document.getElementById("pop-up");
                        if(pop!=null){pop.parentNode.removeChild(pop);}
                },3000)
        }
    }

    return flag;
}

document.addEventListener('keydown',(evt)=>{
    Player.getPlayerposition();
        switch(evt.key){
                case 'w': if(!(Player.top-Player.step<bound.top||isColliding('w'))){
                                Player.player.style.top=(Player.player.offsetTop-Player.step)+'px';Player.player.style.backgroundImage= "url({{asset('storage/courseHomeImage/player-up.gif')}})";}break;
                case 's': if(!(Player.bottom+Player.step>bound.bottom||isColliding('s'))){
                                Player.player.style.top=(Player.player.offsetTop+Player.step)+'px';Player.player.style.background= "url({{asset('storage/courseHomeImage/player-down.gif')}})";}break;
                case 'a': if(!(Player.left-Player.step<bound.left||isColliding('a'))){
                                Player.player.style.left=(Player.player.offsetLeft-Player.step)+'px';Player.player.style.background= "url({{asset('storage/courseHomeImage/player-left.gif')}})";}break;
                case 'd': if(!(Player.right+Player.step>bound.right||isColliding('d'))){
                                Player.player.style.left=(Player.player.offsetLeft+Player.step)+'px';Player.player.style.background= "url({{asset('storage/courseHomeImage/player-right.gif')}})";}break;
        }
        Player.player.style.backgroundSize = "contain";
        Player.player.style.backgroundRepeat= "no-repeat";
        Player.player.style.backgroundPosition = "center";
})
document.addEventListener('keyup',(evt)=>{
        switch(evt.key){
                case 'w' : Player.player.style.backgroundImage= "url({{asset('storage/courseHomeImage/playerUp.png')}})";break;
                case 's' : Player.player.style.backgroundImage= "url({{asset('storage/courseHomeImage/playerDown.png')}})";break;
                case 'a' : Player.player.style.backgroundImage= "url({{asset('storage/courseHomeImage/playerLeft.png')}})";break;
                case 'd' : Player.player.style.backgroundImage= "url({{asset('storage/courseHomeImage/playerRight.png')}})";
        }
        Player.player.style.backgroundSize= "contain";
        Player.player.style.backgroundPosition = "center";
})
const net = document.createElement('div');
net.id = "pop-up";
net.style.position = "absolute";
net.style.zIndex = "9";
net.style.width = "140px";
net.style.height = "30px";
net.style.background = "white";
net.style.borderRadius = "10%";
net.style.alignContent = "center";
function popUp(parent, which){
        switch(which){
                case "internet": net.innerHTML = "<a href='https://archive.org/' style='display: block; text-decoration: none;' target='_blank'>To Internet Archive</a>";break;
                case "meet": net.innerHTML = "<a href='https://meet.google.com/landing' style='display: block; text-decoration: none;' target='_blank'>To Google Meet</a>";
        }
        parent.appendChild(net);
        parent.haveChild = true;
}
function destPopUp(){
        console.log("Popup destroyed")
}
setInterval(()=>{
        switch(room){
                case 'office': if((entrance.right>Player.left)&&(entrance.top<Player.top)&&(entrance.bottom>Player.bottom)){window.location.href='/varcampCon'};break;
                case 'conference' : if((entrance.bottom>Player.top)&&(entrance.left<Player.left)&&(entrance.right>Player.right)){window.location.href='/varcampOff'}'};break;
        }
},500)

</script>
</html>
