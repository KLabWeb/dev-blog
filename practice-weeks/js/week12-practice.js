
//Content negotiation accepting various forms of document types from site
// fetch("https://eloquentjavascript.net/author", {headers: {accept: "text/plain"}}).then(resp => resp.text()).then(text => console.log("plaintext: " + text + "\n"));
// fetch("https://eloquentjavascript.net/author", {headers: {accept: "text/html"}}).then(resp => resp.text()).then(text => console.log("html text: " + text + "\n"));
// fetch("https://eloquentjavascript.net/author", {headers: {accept: "appication/json"}}).then(resp => resp.text()).then(text => console.log("json: " + text + "\n"));

//Rest parameter review
function restReview(x, y, ...z){
  let total = 0;
  for(num of z){
    total += num;
  }
  return x + y + total;
}
console.log(restReview(1, 2, 3, 4, 5, 6));

//Deconstruction review
const numOb = {a:1, b:2, c:3};
const {c} = numOb;
const{a, b} =numOb;
console.log(`a=${a}, b=${b}, c=${c}`);
const numArray = [4, 5, 6, 7];
const [d] = numArray;
const [,,f, g] = numArray;  //skips 4 & 5 due to extra ,
console.log(`d=${d}, f=${f}, g=${g}`);

//combining deconstructing with default parameters and named parameters/args
function foo({a, c} = {}){
  console.log(`a=${c}`);
}
foo({a:1, b:2, c:3, d:4, e:5});

function arrayFoo([a, b, ...rest] = []){
  console.log(`a=${a}, rest=${rest}`);
}
arrayFoo([1, 2, 3, 4, 5, 6]);

//High-order function review
function outerFunction(num, someFunction){
  return someFunction(num);
}

function sum(nums){
  let total = 0;
  for(current of nums){
    total += current;
  }
  return total;
}
console.log(`total: ${outerFunction([1,2,3,4], sum)}`);

//Closure Practice
function returnFunction(x){
  return function returnSum(y){
    return x+y;
  }
}

let innerInstanceA = returnFunction(2);
let innerInstanceB = returnFunction(3);

console.log(`completing function A: ${innerInstanceA(2)}`);
console.log(`completing function B: ${innerInstanceB(4)}`);

//function that prints sum of two nums
const add = (x, y) => console.log(x + y);

//takes in function and calls function on array with two nums
const wrapper = theFunction => theFunction([3, 9]);

const spreadArgs = someFunction =>
  args => someFunction(...args);

//passes foo to bar, but since bar uses an unary arg, it wraps it in spread args first, to spread bar args into multiple args
wrapper(spreadArgs(add));
