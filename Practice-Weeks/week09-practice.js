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
