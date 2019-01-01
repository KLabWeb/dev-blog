//navigate through DOM with recursion. Return array of nodes in order of occurence in html doc
function domNavigate(element) {
  if (element.nodeType == Node.ELEMENT_NODE)
    for (let i = 0; i < element.childNodes.length; i++) {
      if (element.childNodes[i].nodeType == Node.ELEMENT_NODE) {
        console.log(element.childNodes[i]);
        domNavigate(element.childNodes[i]);
      }
    }
}

domNavigate(document.documentElement);

//takes in an dom node, prints all descendents that are specified tag, optionally just priting specific property of tag
function printType(element, tag, property) {
  let nodes = element.getElementsByTagName(tag);
  console.log(nodes.length);

  for(let i = 0; i < nodes.length; i++)
    if(property != null)
        console.log(nodes[i][property]);
    else
      console.log(nodes[i]);
}

printType(document.documentElement, "img", "src");
printType(document.documentElement, "a", "href");


//Replicates method document.getElementsByTagName
function findTag(element, tag) {
  let tags = [];
  tag = tag.toUpperCase();

  function getElementsByTagNameDIY(element) {
    for (let i = 0; i < element.childNodes.length; i++) {
      let childNode = element.childNodes[i];
      if (childNode.nodeType == Node.ELEMENT_NODE) {
        if(childNode.nodeName == tag)
          tags.push(childNode);
        getElementsByTagNameDIY(childNode);
        }
    }
  }
  getElementsByTagNameDIY(element, tag);
  return tags;
}
