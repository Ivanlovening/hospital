'use strict';

var filter = function filter(predicate, xs) {
  return xs.filter(predicate);
};

var is = function is(type) {
  return function (x) {
    return Object(x) instanceof type;
  };
};

filter(is(Number), [0, '1', 2, null]); // 2 3

//# sourceMappingURL=index-compiled.js.map