import {add, subtract, style} from "./addition-module.js";
import theDefault from "./addition-module.js";

console.log(add(3,4));
console.log(subtract(3,4));
console.log(theDefault);
console.log(style.color);

const x = {a: 10, b: 20, c: 30};
const {b} = x;
console.log(b);

const f = ["the", "is", "has", "face"];
const [d,g, ...rest] = f;
console.log(d + g + rest);

//print contents of submit-file
fetch("data/submit-file", {headers: {"Access-Control-Allow-Origin": '*'}}).then(resp => resp.text()).then(text => console.log(text));

//get data from google books api
//fetch("https://www.googleapis.com/books/v1/volumes?q=isbn:0747532699", {headers: {"Access-Control-Allow-Origin": '*'}}).then(resp => resp.json()).then(json => console.log(json));

//document.getElementById('name').focus();
//document.getElementById('name').setAttribute("disabled", "true");

// let form = document.getElementById('second-form');
// form.addEventListener("submit", event => {
//   event.preventDefault();
//   let data = new FormData(document.getElementById('shipping-grid'));
//   // for(let key of data.entries())
//   //   console.log(key);
// });


//change color of div based on form input
document.getElementById('color-form').addEventListener("submit", event => {
  event.preventDefault();
  document.getElementById('color-div').style.backgroundColor = document.getElementById('color-input').value;
});




//global variable to tell if book exists or not
let bookExists = false;

document.getElementById('book-form').addEventListener("submit", event => {
    //prevents page from re-loading
    event.preventDefault();
    let section = document.getElementById('book-section');

    //if book details already exist, remove
    if(bookExists)
      section.removeChild(document.getElementById("the-book"));

    //fetch book from google api based on input from form "book-section"
    fetch(`https://www.googleapis.com/books/v1/volumes?q=${document.getElementById('book-input').value}`, {headers: {"Access-Control-Allow-Origin": '*'}})
    .then(resp => resp.json())
    .then(json => {
      //create book with unique id to allow removal for next book
      let book = document.createElement("div");
      book.setAttribute("id", "the-book");

      //add title and author
      book.appendChild(document.createElement("strong")).appendChild(document.createTextNode(json.items[0].volumeInfo.title + " by " + json.items[0].volumeInfo.authors));
      //double break via paragraph
      book.appendChild(document.createElement("p"));
      book.appendChild(document.createTextNode(json.items[0].volumeInfo.description));

      //append book to section and set that book exists
      section.appendChild(book);
      bookExists = true;
    })
});
