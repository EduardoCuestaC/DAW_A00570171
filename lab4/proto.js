function Animal(w, h){
    this.w = w;
    this.h = h;
}
Animal.prototype.printData = function(){
    console.log("weight", this.w, "height", this.h);
}
Animal.prototype.eat = function(){
    console.log("an animal eating");
}


//Lion Class

function Lion(w=100, h = 20, name = "leo"){
    Animal.call(this, w, h);
    this.name = name;
}

Lion.prototype = Object.create(Animal.prototype);
Lion.prototype.constructor = Lion;

Lion.prototype.roar = function(){
    console.log("roar")
}

Lion.prototype.eat = function(){
    console.log("a lion eating")
}

function mymain(){
	alert("mensajes en consola");
    var lio = new Lion([w, h] = [5, 5]);
    lio.roar();
    lio.printData();
    console.log("name: ", lio.name);
    lio.eat();
    
}

