let fs = require('fs');
fs.writeFileSync('myCourse.txt','Programming Languages Concept  (225313)');

let r= fs.readFileSync('myCourse.txt','utf8');
console.log(r);
