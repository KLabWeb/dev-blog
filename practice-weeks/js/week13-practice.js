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
