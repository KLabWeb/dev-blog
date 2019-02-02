//Author: Kyle Miskell
//For post-initial phone interview with CDK Global on 02-01-19

class Deck{

    constructor(){
      this.suits = ['Hearts', 'Spades', 'Clubs', 'Diamonds'];
      this.values = ['Ace', 2, 3, 4, 5, 6, 7, 8, 9, 10, 'Jack', 'Queen', 'King'];
      this.deck = this.createDeck();
      this.shuffle_cards();
    }

    createDeck(){
      let deck = [];
      for(let i = 0; i < this.suits.length; i++)
        for(let j = 0; j < this.values.length; j++)
          deck.push(`${this.values[j]} of ${this.suits[i]}`)
      return deck;
    }

    shuffle_cards(){
      for (let i = this.deck.length - 1; i > 0; i--){
        //generates random whole number between 0 and length of deck
        const rand = Math.floor(Math.random() * (i + 1));

        let temp = this.deck[i];
        this.deck[i] = this.deck[rand];
        this.deck[rand] = temp;
      }
    }

   //this method actually alters the deck, by removing the cards from the deck, then adjusting indexes to fit this
   draw_card(location){
     switch(location){
       case "top":
        return this.deck.pop();
       case "bottom":
        return this.deck.shift();
       case "random":
        let rand = Math.floor(Math.random() * (this.deck.length + 1));
        return this.deck.splice(rand, 1).toString();
       default:
     }
   }
    print_deck(){
      console.log(this.deck);
    }
}

deck1 = new Deck();
deck1.print_deck();
console.log(deck1.deck.length);
console.log(deck1.draw_card("top"));
console.log(deck1.draw_card("bottom"));
console.log(deck1.draw_card("random"));
console.log(deck1.draw_card("kfdo"));
console.log(deck1.deck.length);


var myObject = {
    foo: "bar",
    func: function() {
        var self = this;
        console.log("outer func:  this.foo = " + this.foo);
        console.log("outer func:  self.foo = " + self.foo);
        (function() {
            console.log("inner func:  this.foo = " + this.foo);
            console.log("inner func:  self.foo = " + self.foo);
            console.log(this.type);
        }());
    }
};
myObject.func();
