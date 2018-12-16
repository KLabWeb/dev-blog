let warpListener = document.getElementById("warp").addEventListener('click', domWarp);

//navigate through DOM with recursion. Return array of nodes in order of occurence in html doc
function domWarp() {
  //random layout changes
  console.log(document.URL);
  document.title = "JavaScript Has Changed Your Title";
  document.getElementById('flexb').textContent = "ALERT: JAVASCRIPT HAS CHANGED THIS TEXT";
  document.getElementById('flexj').textContent = "WARNING: VIDEO SOURCE SWITCHED BY JAVASCRIPT. BOX COLOR CHANGED.";
  document.getElementById('flexj').style.backgroundColor = "white";

  //remove modification of flexbox colored boxes. Restructure box layout and remove flexg box
  document.getElementById('flex-one').appendChild(document.getElementById('flexa'));
  document.getElementById('flex-one').appendChild(document.getElementById('flexc'));
  document.getElementById('flex-two').appendChild(document.getElementById('flexh'));
  document.getElementById('flexh').textContent = "NEW"
  document.getElementById('flex-two').appendChild(document.getElementById('flexf'));
  document.getElementById('flexf').textContent = "TEXT";
  document.getElementById('flexf').style.fontSize = "20px";
  document.getElementById('flexf').style.color = "#e05915";
  document.getElementById('flexg').remove();

  //video change
  newVideo("clownvideo", "video/webm", "../Videos/grandma.webm");
  newVideo("clownvideo", "video/mp4", "../Videos/grandma.mp4");

  //table row additions
  addRow("styled-table-body", ["12/14/18", "Fri", "3", "Why is central not responding still?", "This row created by JS"]);
  addRow("styled-table-body", ["12/29/18", "Sat", "js", "We have taken control of the ship", "Do you think he noticed?"]);

  //change
  let body = document.getElementsByTagName("body");
  body[0].style.position = "relative";
  body[0].style.backgroundImage = "url(../Images/back.gif)";
  body[0].style.backgroundSize = "100%";
  body[0].style.backgroundRepeat = "repeat";
  body[0].style.backgroundAttachment = "fixed";
  body[0].style.overflow = "scroll";
  
 document.getElementById("warp").style.display = "none";

}

//--------//
//Checks if a video specified video type exists for unique id video. If so, replaces video with new video via specified url

function newVideo(videoID,type, newURL){
  let videoContainer = document.getElementById(videoID);
  let videos = videoContainer.getElementsByTagName("source");

  for(let i = 0; i < videos.length; i++){
    if(videos[i].type == type)
      videos[i].src = newURL;
  }
  videoContainer.load();
  videoContainer.play();
}

//--------//
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
