//non blocking io bcsic 
console.log('# 1 task');
console.log('# 2 task');
//console.log('# 3 task');
setTimeout(()=>{console.log('# 3 task')},3000); 
console.log('# 4 task');
console.log('# 5 task');
