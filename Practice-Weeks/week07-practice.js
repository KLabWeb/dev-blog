//print a new Line
const newLine = () => console.log("\n");

newLine();

//First JavaScript - ternary operator
console.log("//Ternary operator");
var a = 101, b = 100;
(a > b) ? console.log(a + " is greater than " + b): console.log(b + " is greater than " + a);

newLine();

//A triangle of #
console.log("//A triangle of #");
let hash = "";
for (let i = 0; i < 7; i++) {
  hash += "#";
  console.log(hash);
}

newLine();

//Classic FizzBuzz
console.log("//Classic FizzBuzz Exercise");
for (let i = 1; i <= 100; i++) {
  if ((i % 3 == 0) && (i % 5 != 0))
    console.log(i + ": " + "FIZZ");
  else if ((i % 3 != 0) && (i % 5 == 0))
    console.log(i + ": " + "BUZZ");
  else if ((i % 3 == 0) && (i % 5 == 0))
    console.log(i + ": " + "FIZZBUZZ");
}

newLine();

//print grid of defined height and width with for loops
console.log("//A checkerboard with for loops");
let endHeightF = 8, endWidthF = 10;
let row = "";

for (let height = 0; height < endHeightF; height++) {
  for (let width = 0; width < endWidthF; width++) {
    if ((height + width) % 2 == 0)
      row += " ";
    else
      row += "#";
  }
  console.log(row);
  row = "";
}

newLine();

//print grid with while loops (wordy, but good brush-up)
console.log("//A checkerboard with while loops");
let currentWidth = 0, currentHeight = 0;
let gridRow = "";

while (currentHeight < 8) {
  while (currentWidth < 8) {
    currentWidth++;
    if ((currentHeight + currentWidth) % 2 == 0)
      gridRow += "#";
    else
      gridRow += " ";
  }
  console.log(gridRow);
  currentHeight++;
  currentWidth = 0;
  gridRow = "";
}

newLine();


//recursive function to determine if a positive whole number is even or odd (without using mod)
function printEvenOdd(num){
  if(evenOdd(num) == 0)
    console.log(num + " is even.");
  else if(evenOdd(num) == 1)
    console.log(num + " is odd.");
  else
    console.log(num + ": Please no negative or decimal numbers.");
}

function evenOdd(num){
  if(num == 1)
    return 1;
  else if(num == 0)
    return 0;
  else if (num < 0)
    return -1;
  else
    return evenOdd(num-2);
}

printEvenOdd(10, 10);
printEvenOdd(23, 23);
printEvenOdd(-5, -5);

newLine();

//tells lowest numerical value of two number arguments
function mathmin(x, y){
    x < y ? console.log(x + " is less than " + y) : rconsole.log(y + " is less than " + x)
}

mathmin(10, 20);
mathmin(80, 100);

newLine();

//counts how many of a specified char in a string
function countChar(cString, char){
  let cCount = 0;
  for(let i = 0; i < cString.length; i++){
    if(cString[i] === char)
      cCount++;
  }
  console.log("\"" + cString + "\" has " +cCount + char +"'s.");
}

//counts how many B's in a string using countChar
function countB(bString){
  countChar(bString, "B");
}

countB("Bobby Bradsworth lives in Bolivia.");

newLine();


//Creates customer queue, prints customer names, and prints and returns total num items in all carts
let customerQueue = [{name: "Charles",
                      mostExpensive: 29.99,
                      leastExpensive: 9.49,
                      numberItems: 12},
                      {name: "Diana",
                       mostExpensive: 97.23,
                       leastExpensive: 14.73,
                       numberItems: 21},
                      {name: "Junto",
                       mostExpensive: 37.23,
                       leastExpensive: 24.73,
                       numberItems: 16},
                      {name: "Sergio",
                       mostExpensive: 17.23,
                       leastExpensive: 5.73,
                       numberItems: 17}];

function printCustomers(custQueue){
  this.totalItems = 0;
  for(let customer of custQueue){
    console.log(customer.name);
    this.totalItems+=customer.numberItems;
  }
  console.log(`Number of items in all carts: ${totalItems}` );
  return totalItems;
}

console.log("You have three customers in line: ");
printCustomers(customerQueue, "name");
newLine();

/*console.log("Arranging customers by most expensive item:");

function move(swapArray, originalIndex, newIndex){
  let temp = swapArray[originalIndex-1];
  while(originalIndex !== newIndex){
    swapArray[originalIndex-1] = swapArray[originalIndex];
    swapArray[originalIndex] = temp;
    originalIndex = originalIndex - 1;
  }
}

function checkPreviousLower(arrayX, propertyName, startIndex, count){
  if(count > 0){
    if(arrayX[startIndex][propertyName] < arrayX[count-1][propertyName])
      return checkPreviousLower(arrayX, propertyName, startIndex, count-1);
    else
      return count;
  }
  return count;
}

for(let i = 0; i < customerQueue.length; i++){
  let lowerSwapIndex = checkPreviousLower(customerQueue, "mostExpensive", i, i);
  if(lowerSwapIndex !== i){
    move(customerQueue, i, lowerSwapIndex);
  }
}

for(let customer of customerQueue){
  console.log(customer.name);
}*/

//creates array from range of numbers with optional step arg, for x step to increase nums by
function range(start, end, step){

  if(wholeNumber(start) == false || wholeNumber(end) == false)
    return;

  let rangeArray = [];

  if(step == undefined){
    for(; start <= end; start++){
      rangeArray.push(start);}
    console.log("Created range: " + rangeArray);
  }
  else{
    if(wholeNumber(step) == false)
      return;

    if(step > (end-start)){
      console.log("Step too large for range. Please enter smaller step or increase range.")
      return;
    }
    while(start <= end){
      rangeArray.push(start);
      start += step;
    }
    console.log("Created step range: " + rangeArray);
  }
  return rangeArray;
}

//checks to make sure number is an integer and prints error message if not
function wholeNumber(num){
  if(!Number.isInteger(num)){
    console.log("Please only whole numbers. \"" + num + "\" is not acceptable.");
    return false;
  }
}

//sums array of numbers
function sumArray(numArray){
  let sum = 0;

  for(num of numArray)
    sum += num;

  return sum;
}

//create number ranges and print sums
let rangeArray = range(1, 10);
console.log("Sum of range: " + sumArray(rangeArray));
newLine();
let negativeRange = range(-10, 10);
newLine();
console.log("Creating range: fish to 20.")
let badRange = range("fish", 20);
newLine();
console.log("Creating range: 20 to 100.2384.")
let badRangeAgain = range(20, 100.2384);
newLine();
let stepRange = range(1, 100, 5);
console.log("Sum of range: " + sumArray(stepRange));
newLine();
console.log("Creating range: 10 to 20 with 30 step.");
let badStep = range(10, 20, 30);
newLine();

//reverses array by creating new reversed array
function reverseArray(original){
  let reversed = [];
  for(index of original)
    reversed.unshift(index);
  return reversed;
}

//reverses array by reversing original array (same reference) without unshift method
function reverseArrayInPlace(original){
  let temp;
  let iterations;

  (original.length % 2) == 0 ? iterations = original.length/2 : iterations = ((original.length/2)-1);

  for(let i = 0; i < iterations; i++){
    temp = original[i];
    original[i] = original[original.length-1-i];
    original[original.length-1-i] = temp;
  }
  return original;
}

let originalArray = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
console.log("Original array: " + originalArray);
console.log("New reversed array: " + reverseArray(originalArray));
console.log("Original array reversed in place: " + reverseArrayInPlace(originalArray));

newLine();

//Turns array into list
function arrayToList(theArray){
  let list = null;

  for(let i = theArray.length-1; i >= 0; i--)
    list= {value: theArray[i],
           link: list};
  return list;
}

//Turns list into array
function listToArray(theList){
  let array = [];

  for(node = theList; node!=undefined; node=theList){
    array.push(theList.value);
    theList = theList.link;
  }
  return array;
}

//prints list values as a string
function printList(theList){
  let valueString = ""

  //while loop is a bit wordier than the listToArray() for loop, but the print format is nicer
  while(theList.link != null){
    valueString += theList.value.toString() + ",";
    theList = theList.link;
  }
  valueString += theList.value.toString() + "";
  console.log("List: " + valueString);
}

//adds element to front of list
function prepend(element, list){
  return { value: element,
           link: list
  };
}

//returns value of nth list node
function nthNode(theList, index){
  let count = 0;

  while(count < index-1 && theList.link != null){
    theList = theList.link;
    count++;
  }
  return theList.value;
}

//returns value of nth list node using recursion
function nthNodeRecursive(theList, index, count = 0){
  if(count < index-1 && listCopy.link != null){
    return nthNodeRecursive(theList.link, index, count++);
  }
  else
    return theList.value;
}

let listArray = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
console.log("Array created: " + listArray);
let list = arrayToList(listArray);
console.log("Converting array to list...");
printList(list);
console.log();

console.log("Adding to list...");
list = prepend(0, list);
printList(list);
console.log();

console.log("Value for node #7: " + nthNode(list, 7));
console.log("Value for node #4, traversed via recursion: " + nthNode(list, 4));
console.log();

console.log("Converted back to array: " + listToArray(list));

newLine();

//Compares primtives or objects. Returns true if same value or objects with same properties and values.
function deepEqual(itemA, itemB){
  if(typeof itemA == typeof itemB){
    //executes if initial items passed are objects
    if(typeof itemA == "object" && itemA != null){
      if(Object.keys(itemA).length == Object.keys(itemB).length){
        for(let i = 0; i < Object.keys(itemA).length; i++){
          let keyA = Object.keys(itemA)[i], keyB = Object.keys(itemB)[i];

          if(deepEqual(keyA, keyB) == false)
            return false;

          if(keyA != "object"){
            if(itemA[keyA] != itemB[keyB]){
              return false;
            }
          }
        }
        return true;
      }
    }
    //if initial items passed are not objects, this executes
    else{
      if(itemA == itemB)
        return true;
      else
        return false;
    }
  }
}

console.log("Values 12 and 10 are equal? " + deepEqual(12, 10));
console.log("Values Dog and Dog are equal? " + deepEqual("Dog", "Dog"));

console.log("Objects {animal: \"Dog\"} and {animal: \"Dog\"} are equal ? " + deepEqual({animal: "Dog"}, {animal: "Dog"}));

console.log("Obects {animal: \"Dog\", age: 10, living: true} and {animal: \"Dog\", age: 10, living: true} are equal? " + deepEqual({animal: "Dog", age: 10, living: true}, {animal: "Dog", age: 10, living: true}));

console.log("Obects {animal: \"Dog\", age: 10, living: true} and {animal: \"Dog\", age: 15, living: true} are equal? " + deepEqual({animal: "Dog", age: 10, living: true}, {animal: "Dog", age: 15, living: true}));

console.log("Obects {animal: \"Dog\", age: 10, living: true} and {SPACESHIP: \"Dog\", age: 10, living: true} are equal? " + deepEqual({animal: "Dog", age: 10, living: true}, {SPACESHIP: "Dog", age: 10, living: true}));
