
function Student(name,age) {
   this.name = name;
   this.age = age;
   this.info = function() {
       console.log("name:"+name+"age:"+age);
   }
}
var Lily = new Student("Lily",18);
var Mas = new Student("Mas",19);


Student.prototype.info=function(){
    console.log("我是原型链"+this.name+this.age)
}
 const v1=new Student("zhangsan",10);
 const v2=new Student("lisi"+this.name+this.age);