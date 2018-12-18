document.body.addEventListener("click", firstClick);
document.body.addEventListener("click", drawcelestial);


function firstClick(event) {
  //create and start audio
  let song = new Audio("../Audio/funeral-canticle.mp3");
  song.loop = true;
  song.play();

  //hide header
  document.getElementsByTagName("h1")[0].style.display = "none";

  event.stopPropagation();
  document.body.removeEventListener("click", firstClick);

  /*let carl = new Image(10vw, 10vh);
  carl.src = '../Images/carl.png';*/
}

//Places celestial bodies on an empty universe.
// 75% of time body to place on universe is chosen randomly from an array
function drawcelestial(event) {

  let celestial = document.createElement("div");
  let randomNum = Math.random();
  //potential image array for it randomNum < .77
  let spaceImages = ["comet", "comet-1", "europa", "jupiter", "mars", "mercury", "milky-way", "meteorite", "saturn", "uranus", "neptune"];

  if (randomNum <= .75)
    //Math.round on a decimal * 10 returns 0-10, perfect for an array.length of 11
    celestial.style.backgroundImage = `url(../Images/space/${spaceImages[Math.round(randomNum * 10)]}.svg)`;
  else if (randomNum > .75 && randomNum < .98)
    celestial.style.backgroundImage = "url(../Images/space/sun.svg)";
  else
    celestial.style.backgroundImage = "url(../Images/space/planet-earth-1.svg)";

  celestial.style.position = "absolute";
  //responsive sizing for varying viewport sizes
  window.innerWidth > 700 ? celestial.style.height = (Math.random() * 6) + "vw": celestial.style.height = (Math.random() * 20) + "vw";
  celestial.style.width = celestial.style.height;
  //sets to place coordinates clicked
  celestial.style.left = event.pageX + "px";
  celestial.style.top = event.pageY + "px";
  document.body.appendChild(celestial);
}
