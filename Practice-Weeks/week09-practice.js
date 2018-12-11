
//Mock broken function and error handling
/*function primitiveMultiply(x, y){
  if(Math.random() > .8)
    console.log(`Multiplication of ${x} * ${y} is ${x * y}`);
  else
    throw new Error("MultiplicationUnitFailure");
}

function testedPrimitiveMultiply(x, y){
  for(;;){
    try{
      primitiveMultiply(x, y);
    }
    catch(error){
      throw error;
    }
  }
}
//test of broken function loop handler
testedPrimitiveMultiply(10 * 20);*/

//Locked box with error handling
const box = {
  locked: true,
  unlock() { this.locked = false; },
  lock() { this.locked = true;  },
  _content: [],
  get content() {
    if (this.locked) throw new Error("Locked!");
    return this._content;
  }
};
