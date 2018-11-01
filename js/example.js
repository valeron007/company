
var hanoi = function hanoi(disc, first, second, third) {
    if(disc > 0){
        hanoi(disc - 1, first, third, second);
        document.writeln('Move disc' + disc + ' from ' + first + ' to ' + third);
        hanoi(disc - 1, second, first, third);
    }
};

hanoi(3, 'first', 'second', 'third');


var quo = function (status) {
    return {
        get_status : function () {
            return status;
        }      
    }
};

var myQuo = quo("valeron");

document.writeln(myQuo.get_status());

//ещё пример
var fade = function (node) {
    var level = 1;
    var step = function () {
        var hex = level.toString(16);
        node.style.background = '#FFFF' + hex + hex;
        if(level < 15){
            level += 1;
            setTimeout(step,100);
        }
    };
    setTimeout(step, 100);
};

fade(document.body);


var serial_maker = function () {
    var prefix = '';
    var seq = 0;

    return{
        set_prefix : function (p) {
            prefix = String(p);
        },
        set_seq : function (s) {
            seq = s;
        },
        gensym : function () {
            var result = seq + prefix;
            seq += 1;
            return result;
        }

    };

};

var sequr = serial_maker();
sequr.set_prefix('V');
sequr.set_seq(500);
var unique = sequr.gensym();
document.writeln(unique);

// Function.method('carry', function () {
//     var args = Array.prototype.slice,
//         arguments,
//         that = this;
//     return function () {
//         return that.apply(null, args.concat(slice.apply(arguments)));
//     };
// });

var fibonachi = function (n) {
  return n < 2 ? n : fibonachi(n-1) + fibonachi(n-2);
};

//мемоизация
var fib = (function () {
   var memo = [0,1];
   var fb = function (n) {
       var result = memo[n];
       if(typeof result !== 'number'){
            result = fb(n-1) + fb(n-2);
            memo[n] = result;
       }
       return result;
   };
   return fb;
}());

var memoizer = function (memo, formula) {
    var recur = function (n) {
        var result = memo[n];
        if(typeof result !== 'number'){
            result = formula(recur, n);
            memo[n] = result;
        }
        return result;
    };
    return recur;
};


var Mammal = function (name) {
    this.name = name;
};

Mammal.prototype.get_name = function () {
  return this.name;
};

Mammal.prototype.says = function () {
  return this.saying || '';
};

var mam = new Mammal('Valeron');
var name = mam.get_name();

document.writeln('**************');
document.writeln(name);



