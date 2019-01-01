//Runs primitiveMultiply function. Suceeds 50% of the time. If fails catches recalls method & catches error.
function primitiveMultiply(x, y){
  if(Math.random() > .5){
    return x * y;
  }
  else{
    throw new Error("MultiplicatorUnitFailure");
  }
}

function primitiveMultiplyWrap(x, y){
  for(;;){
    try{
      return primitiveMultiply(x,y);
    }
    catch(error){
      primitiveMultiplyWrap(x,y);
      if(Error != "MultiplicatorUnitFailure")
        throw error;
    }
  }
}

//RegEx in JS
let regSet = /[1234]/;
console.log(`Set [1234] match in 2005? ${regSet.test("2005")}`);
console.log(`Set [1234] match in 907687? ${regSet.test("907687")}`);
console.log();

let datetime = /\d\d\d\d-\d\d-\d\d \d\d:\d\d\w\w/;
console.log(`Is 2003-10-08 10:30AM a valid datetime? ${datetime.test("2003-10-08 10:30AM")}`);
console.log(`Is 2003-10-08 1a:30AM a valid datetime? ${datetime.test("2003-1a-08 10:30AM")}`);
console.log();

let dateTimeShort = /\d{4}-\d{1,2}-\d{1,2} \d{1,2}:\d{2}\w{0,2}/;
console.log(`Is 2013-09-07 12:30PM a valid datetime? ${dateTimeShort.test("2013-09-07 12:30PM")}`);
console.log(`Is 2013-9-7 17:17 a valid datetime? ${dateTimeShort.test("2013-09-07 12:30PM")}`);
console.log();

let post = "AFAIK no one have implemented an algorithm that takes a set of strings and substrings and gives back one or more regular expressions that would match the given substrings inside the strings. So, for instance, if I'd give my algorithm this two samples";
let regPost = /(an)/;
let regObjects = regPost.exec(post);
console.log(regObjects.values());
