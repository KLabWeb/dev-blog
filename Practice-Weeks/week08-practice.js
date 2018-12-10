//creates break for new line in console
const newLine = () => console.log("\n");

newLine();

//Flattens an array of arrays into a single array
//Uses Array.prototype.reduce() method to concatenate each inner array element of the 2D array to a flat 1D array
function flatten(multiArray) {
  return multiArray.reduce((flatArray, innerArray) => {
    return flatArray.concat(innerArray)
  }, []);
}

//Tests for flatten()
let multiArray = [
  [0, 20, 30],
  [48, 12, 5],
  [19, 37, 405, 102, 48]
];
console.log("Created multi-dimensional array: ");
multiArray.forEach((innerArray, index) => {
  console.log(innerArray)
});
console.log(`Flattened array: ${flatten(multiArray)}`);

newLine();

//High-order function that acts as DIY function loop
//for each call, runs passed test, displays status via body, then updates. Prints and returns true when test met
//Passes updated currentValue each iteration via recurive calls until condition met
function testLoop(currentValue, testFunction, bodyFunction, updateFunction) {
  if (testFunction(currentValue)) {
    console.log(currentValue);
    return true;
  }
  bodyFunction(currentValue);
  return testLoop(updateFunction(currentValue), testFunction, bodyFunction, updateFunction);
}

//Test calls to millionLoop
console.log("Multiply starting value 2 x 5 until > 10,000, then return true:");
console.log(testLoop(2, x => x > 10000, x => console.log(x), x => x * 5));
console.log("Generate random decimals until number > .9, then return true:");
console.log(testLoop(Math.random(), x => x > .9, x => console.log(x), x => x = Math.random()));

newLine();

//DIY version of Array.prototype.every() function using loop
//Takes in predicateFunction and returns true only if all elmeents in array pass function condition(s)
function every(array, predicateFunction) {
  for (let index of array)
    if (!predicateFunction(index))
      return false;
  return true;
}

//Tests for every()
let numArray = [9, 15, 27, 30, 51, 144];
console.log(`Are all numbers: ${numArray} divisible by 3? ${every(numArray, x => (x % 3) == 0)}`);
console.log(`Adding number to array: ${numArray.push(7)}`);
console.log(`Still all divisible by 3? ${every(numArray, x => (x % 3) == 0)}`);

newLine();

//this and prototype Practice
const book = {
  title: "Where There Is No Doctor",
  showTitle() {
    console.log(`This title of this book can be referenced via \'this\': ${this.title}`);
  }
}
book.showTitle();

newLine();

function Car(type, model) {
  this.type = type;
  this.model = model;
}
let usedCar = new Car("sedan", "civic");

console.log("Prototype of Car function, then of usedCar, which is derived from Car. Properties of car:")
console.log(Object.getPrototypeOf(Car));
console.log(Object.getPrototypeOf(usedCar));
console.log(usedCar.type + "," + usedCar.model);

newLine();

//Symbol Practice to display unique values of Symbols
let firstString = "first",
  secondString = "first";
console.log(`Two let variables created as Strings, both with \"first\" for string. Are values equal? ${firstString == secondString}`);
let firstSymbol = Symbol("first"),
  secondSymbol = Symbol("first");
console.log(`Two let variables given Symbol values, both given \"first\" as the optional identifier for the symbol on printout. Are values equal? ${firstSymbol == secondSymbol}`);


//A Group data structure that can add members, as well as delete them and test for the existence of a member, but only adds members with unique values (no duplicates)
class Group {
  constructor() {
    this.values = [];
  }

  add(element) {
    if (this.values.includes(element))
      console.log("Value(s) already added to Group. Values must be unique.")
    else
      this.values.push(element);
  }
  has(element) {
    return this.values.includes(element);
  }
  delete(element) {
    if (this.has(element)) {
      this.values = this.values.filter(index => index != element);
    }
  }

  //Allows for the creation of a Group data structure from an existing iterable item, such as an array
  static from(iterable) {
    let group = new Group();
    for (let item of iterable)
      group.add(item);
    return group;
  }

  //Implements iterator interface and returns iterable object with next() method, to allow Group to be iterated through via methods like for...of
  [Symbol.iterator]() {
    let index = 0;
    return {
      next: () => {
        let value = this.values[index];
        let done = index >= this.values.length;
        index++;
        return {
          value,
          done
        };
      }
    };
  }
}

newLine();

//Tests for Group data structure
console.log("Creating \"Group\" data structure. Group holds values, but only if value does not already exist in Group.")
let theGroup = new Group();
console.log("Adding \"cat\" and \"dog\" to group...");
theGroup.add("cat");
theGroup.add("dog");
console.log(theGroup);
console.log();
console.log("Adding \"cat\" to group...");
theGroup.add("cat");
console.log();
console.log("Deleting \"cat\" from group");
theGroup.delete("cat");
console.log(theGroup);
console.log();
console.log("Adding \"cat\" and \"mouse\" to group...");
theGroup.add("cat");
theGroup.add("mouse");
console.log(theGroup);
console.log();
console.log("Creating new group by passing it array: [10, 20, 30, 40]");
let arrayGroup = Group.from([10, 20, 30, 40]);
console.log(arrayGroup);
