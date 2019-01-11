//Takes in two variables, then calls two math functions on them
const doubleOutcome = (x, y, firstMath, secondMath) => {
    return ((typeof firstMath != "function" || typeof secondMath != "function")
    ?
      "Type error"
    :
      secondMath(firstMath(x, y)));
}

const add = (x, y) => x + y;
const double = z => z * 2;
console.log(`Result after addition and multiplication: ${doubleOutcome(2, 3, add, double)}`);

//takes three args and prints them
const threeArgs = (first, second, third) => console.log(`${first}, ${second}, ${third}`);
threeArgs("one", "two", "three");


//An example of referential transparency & equational reasoning
//immutable is NPM package. Any output on from Map() become immutable.
const { Map } = require("immutable");

const chris = Map({name: 'Chris', age: 20, sign: 'Leo'});
//const isLeo = someGuy => someGuy.get('sign') == 'Leo' ? `is` : `is not`;
//const nameSign = someGuy => `${chris.get('name')} ${isLeo(chris)} a Leo`;
const nameSign = someGuy => `${chris.get('name')} ${someGuy.get('sign') == 'Leo' ? `is` : `is not`} a Leo`;
console.log(nameSign(chris));

const fs = require('fs');
const lorem = fs.watch('lorem-ipsum.txt', () => console.log("file changed"));

//review of this and bind
let person = {
    word: 'hello',
    speak: function() {
        console.log(this.word);		//this reaches down to person scope
    }
}

person.speak();		//hello, as speak() has access to sound as is within person scope

let speakFunction = person.speak;    //undefined, as current scope (window) does not have access to speak
speakFunction();

speakFunction = speakFunction.bind(person);  //sets speakFunction to person scope
speakFunction();           //prints hello, as speakFunction now bound to person scope


//Basic composition
const composedFunction = (functA, functB) =>
  x => functA(functB(x));

const triple = x => x * 3;
const square = x => x * x;
const tripleSquare = composedFunction(triple, square);
console.log(tripleSquare(6));

const uppercase = string => string.toUpperCase();
const intense = string => `${string}!!!!`;
const loud = composedFunction(uppercase, intense);
console.log(loud('This sentence is loud'));

const composedFunction2 = (composedFunction, functC) =>
  (sentence, original, newWord) => composedFunction(functC(sentence, original, newWord));

const replaceWord = (string, original, newWord) => string.replace(original, newWord);
const loudReplace = composedFunction2(loud, replaceWord);
console.log(loudReplace('This sentence is loud, so very very loud', /loud/g, 'noisy'));

const composedFunctionBig = (functA, functB, functC) =>
  (...args) => functC(functB(functA(...args)));

const upperIntenseReplace = composedFunctionBig(replaceWord, uppercase, intense);
console.log(upperIntenseReplace('This sentence is not quiet, not quiet at all', /quiet/g, 'silent'));

let arrayB = [10, 11, 12];
let arrayA = [1, 2, ...arrayB, 3];
console.log(arrayA);
