//worspacebox for text insertion area
let keyDiv = document.querySelector("#keyClick");

//add text to text area
keyDiv.addEventListener("keydown", event => {
  let divChild = keyDiv.lastChild;

  //for different handlings for special action keys and standard keys
  switch(event.key){
    case "Enter":
      keyDiv.appendChild(document.createElement("p"));
      break;
    case "Tab":
      event.preventDefault();
      divChild.textContent += "\xa0\xa0\xa0\xa0";
      break;
    case " ":
      //to prevent default window action of move page down when space pressed
      event.preventDefault();
      divChild.textContent += "\xa0"
      break;
    case "Backspace":
      //removes one char from each <p> or last <p> if <p> is empty
      if(divChild.textContent.length > 0)
        divChild.textContent = divChild.textContent.slice(0, divChild.textContent.length-1);
      else if(divChild.previousSibling != null)
        divChild.remove();
      break;
    case "CapsLock":
      break;
    case "Shift":
      break;
    default:
      divChild.textContent += event.key;
  }
  //checks if overflowing from <div> and if so, scrolls div up
  if(keyDiv.scrollHeight > keyDiv.clientHeight)
    keyDiv.scrollTop = keyDiv.scrollHeight;
});

//remove display instructions after first key press
keyDiv.addEventListener("keydown", firstPress);
function firstPress(event){
  keyDiv.firstChild.textContent = event.textContent;
  keyDiv.removeEventListener("keydown", firstPress);
}
