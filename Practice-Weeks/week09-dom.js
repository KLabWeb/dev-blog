console.log(document.URL);
document.title = "JavaScript Has Changed Your Title";

document.getElementById('flexb').textContent = "ALERT: JAVASCRIPT HAS CHANGED THIS TEXT";
document.getElementById('flexj').textContent = "WARNING: VIDEO SOURCE SWITCHED BY JAVASCRIPT. BOX COLOR CHANGED.";
document.getElementById('flexj').style.backgroundColor = "white";

let html = document.documentElement.firstChild;
console.log(html);

//navigate through DOM with recursion. Print element nodes in order of occurence in html doc
function domNavigate(element) {
  if (element.nodeType == Node.ELEMENT_NODE)
    for (let i = 0; i < element.childNodes.length; i++) {
      if (element.childNodes[i].nodeType == Node.ELEMENT_NODE) {
        console.log(element.childNodes[i]);
        domNavigate(element.childNodes[i]);
      }
    }
}

//domNavigate(document.documentElement);

//takes in an dom node, prints all descendents that are specified tag, optionally just priting specific property of tag, also takes optional regexp
function printType(element, tag, property, regexp) {
  let nodes = element.getElementsByTagName(tag);
  console.log(nodes.length);

  for(let i = 0; i < nodes.length; i++)
    if(property != null){
      if(regexp !=null)
        console.log(regexp.test(nodes[i][property]));
      else
        console.log(nodes[i][property]);
    }
    else
      console.log(nodes[i]);
}

//printType(document.documentElement, "img", "src");
//printType(document.documentElement, "a", "href");

//Checks if a video specified video type exists for unique id video. If so, replaces video with new video via specified url
function newVideo(videoID,type, newURL){
  let flexVideo = (document.getElementById(videoID)).getElementsByTagName("source");

  for(let i = 0; i < flexVideo.length; i++){
    if(flexVideo[i].type == type)
      flexVideo[i].src = newURL;
  }
}
newVideo("flex-clownvideo", "video/webm", "../Videos/grandma.webm");
newVideo("flex-clownvideo", "video/mp4", "../Videos/grandma.mp4");

//remove modification of flexbox colored boxes. Restructure box layout and remove flexg box
document.getElementById('flex-two').appendChild(document.getElementById('flexh'));
document.getElementById('flexh').textContent = "NEW"
document.getElementById('flex-two').appendChild(document.getElementById('flexf'));
document.getElementById('flexf').textContent = "ORDER";
document.getElementById('flexg').remove();


//Inserts row into table and add values, including table header
function addRow(tableBodyID, tableValues){

  let newRow = document.createElement("tr");

  //inner append method to account for th vs td
  function append(element, textValue){
    if(element ==  "th")
      element.scope = "row";
    element.appendChild(document.createTextNode(textValue));
    newRow.appendChild(element);
  }

  //add th & td to row
  append(document.createElement("th"), tableValues[0]);
  for(let i = 1; i < tableValues.length; i++)
    append(document.createElement("td"), tableValues[i]);

  //add new row
  document.getElementById(tableBodyID).appendChild(newRow);
}

addRow("styled-table-body", ["12/14/18", "Fri", "3", "Why is central not responding still?", "This row created by JS"]);
h
