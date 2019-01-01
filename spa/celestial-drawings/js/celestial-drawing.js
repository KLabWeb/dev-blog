document.body.addEventListener("click", firstClick);
document.body.addEventListener("click", drawcelestial);

function firstClick(event) {
  //create and start audio
  let song = new Audio("./assets/audio/funeral-canticle.mp3");
  song.loop = true;
  song.play();

  //hide header
  document.getElementsByTagName("h1")[0].style.display = "none";

  event.stopPropagation();
  document.body.removeEventListener("click", firstClick);
}

//Places celestial bodies on an empty universe.
// 75% of time body to place on universe is chosen randomly from an array
function drawcelestial(event) {

  let celestial = document.createElement("div");
  let randomNum = Math.random();
  //potential image array for it randomNum < .77
  let spaceImages = ["comet", "comet-1", "europa", "jupiter", "mars", "mercury", "milky-way", "meteorite", "saturn", "uranus", "neptune"];

  if (randomNum <= .75)
    //sets to random index number between 0 an 10
    celestial.style.backgroundImage = `url(./assets/images/${spaceImages[Math.floor(Math.random()*spaceImages.length)]}.svg)`;
  else if (randomNum > .75 && randomNum < .98)
    celestial.style.backgroundImage = "url(./assets/images/sun.svg)";
  else
    celestial.style.backgroundImage = "url(./assets/images/planet-earth-1.svg)";

  celestial.style.position = "absolute";
  //responsive sizing for varying viewport sizes
  window.innerWidth > 700 ? celestial.style.height = `${Math.random() * 6}vw`: celestial.style.height = `${Math.random() * 12.5}vw`;
  celestial.style.width = celestial.style.height;
  //sets to place coordinates clicked
  celestial.style.left = `${event.pageX}px`;
  celestial.style.top = `${event.pageY}px`;
  document.body.appendChild(celestial);
}
