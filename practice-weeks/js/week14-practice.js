//Imperative
const names = ["John Williams", "Michael Pollan", "Carl Smith", "Shannon Wheeler", "Kiyohiko Azuma", "Al Burian", "John Smith"];

function imperativeNameCheck(names, regexp){
  let passedNames = [];

  for(let i = 0; i < names.length; i++)
    if(names[i].match(regexp))
      passedNames.push(names[i]);

  return passedNames;
}

let johns = imperativeNameCheck(names, /(Smith)/)
console.log(johns);


//Declarative
const decJohns= names.filter(someName => someName.match(/(Smith)/));
console.log(decJohns);


//Imperative
let numbers = [1, 73.42, 7, 182.1244, 6, 29.12, 9];

function isInteger(numArray){

  for(let i = 0; i < numArray.length; i++)
    if(numArray[i] % 1 != 0)
      return false;

  return true;
}

console.log(isInteger(numbers));

//Declarative
const decIsInts = numbers.every(num => num % 1 == 0);
console.log(decIsInts);


//Imperative
let people = [{ name: "John Smith",
                age: 21,
                city: "Portland"
              },
              { name: "Marcus Williams",
                age: 16,
                city: "Portland"
              },
              { name: "Yuassa Masaki",
                age: 43,
                city: "Portland"
              }
             ]

function under21(personArray){
  for(let i = 0; i < personArray.length; i++)
    if(personArray[i].age < 21)
      return true;

  return false;
}

console.log(under21(people));


//Declarative
const decOver21 = people.some((person => person.age < 21));

console.log(under21(people));


//Imperative
let someNums = [0, 1, 2, 3, 4, 5, 6, 7];

function reverseArray(array){
  let reversed = [];

  for(let i = array.length-1; i >= 0; i--)
    reversed.push(array[i]);

  return reversed;
}

console.log(reverseArray(someNums));


///Declarative
const reversedArray = someNums.reverse();
console.log(reversedArray);


//Imperative
let partialPath = ["dog.jpg", "house.png", "motorcyle.gif", "ant.jpg", "river.jpeg"];

function fullRelative(startPath, endArray){
  let fullPath = [];

  for(let i = 0; i < endArray.length; i++)
    fullPath.push(startPath + endArray[i]);

  return fullPath;
}

console.log(fullRelative("~/images/", partialPath));


//Declarative
const decFullPath = partialPath.map(end => `~/images/${end}`);

console.log(decFullPath);
