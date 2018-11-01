var storage = {
   'name' : 'valeron',
   'lastname' : 'andruscenko',
   'call' : function () {
       console.log('11111');
   }
};
delete storage.name;
var name;
for (name in storage){
   document.writeln(name + ':' + storage[name]);
}
storage.call();
var myObjcet = {
   value : 0,
   increment : function (inc) {
       this.value += typeof inc === 'number' ? inc : 1;
   }
};

myObjcet.increment();
document.writeln(myObjcet.value);

myObjcet.increment(2);
document.writeln(myObjcet.value);

function add(value1, value2) {
   return value1 + value2;
}

myObjcet.double = function () {
   var that = this;

   var helper = function () {
       that.value = add(that.value, that.value);
   };

   helper();
};

myObjcet.double();
document.writeln(myObjcet.value);
// шаблон вызова конструктора
// создаём объект со свойством status
//
// создаём конструктор
var Quo = function (string) {
   this.status = string;
};

//создаём метод объекта
Quo.prototype.get_status = function () {
   return this.status;
};

var myQuo = new Quo('valeron');

document.writeln(myQuo.get_status());

// метод apply
var array = [3,4];
var sum = add.apply(null, array);

document.writeln(sum);

var statusObject = {
 status: 'A-OK'
};

var status = Quo.prototype.get_status.apply(statusObject);

document.writeln(status);

var suma = function () {
   var i, suma = 0;
   for (i = 0; i < arguments.length; i += 1){
       suma += arguments[i];
   }
   return suma;
};

document.writeln(suma(4, 6, 89, 32, 3));