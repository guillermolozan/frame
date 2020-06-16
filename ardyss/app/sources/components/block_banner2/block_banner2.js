class IndexForSiblings {
  static get(el){
    let children = el.parentNode.children;
    for(var i=0;i<children.length;i++){
      let child=children[i];
      if(child==el) return i;
    }
  }
}
class ControlSlider {

  constructor(options){

    this.slider=options.container;
    this.externalControls=options.externalControls;
    this.autostart = options.autostart || true;
    this.useControls = options.useControls || false;
    this.wait = options.wait || 5;

    this.selector_container='.slider_container';
    this.selector_controls='.slider_controls';
    this.move=this.move.bind(this); // hack
    this.moveByButton=this.moveByButton.bind(this); // hack
    this.container=this.slider.querySelector(this.selector_container)
    this.interval=null;
    this.contador=0;
    this.itemsCount=this.slider.querySelectorAll(this.selector_container+" > *").length;
    this.buildControls();
    this.start();
    // return this;

  }
  start(){
    if (!this.autostart) return;
    this.interval=window.setInterval(this.move,this.wait*1000);
  }
  restart(){
    if(this.interval) window.clearInterval(this.interval);
    this.start();
  }
  bindEvents(){
    this.slider.querySelectorAll(this.selector_controls+' li')
      .forEach(item=>{
        item.addEventListener("click",this.moveByButton)
      });
  }
  moveByButton(ev){
    let index = IndexForSiblings.get(ev.currentTarget);
    this.contador=index;
    this.moveTo(index);
    this.restart();
  }
  buildControls(){
    if (!this.useControls) return;
    for(var i=0;i<this.itemsCount;i++){
      let control=document.createElement("li");
      if(i==0) control.classList.add('active');
      this.slider.querySelector(this.selector_controls+' ul').appendChild(control);
    }
    this.bindEvents();
  }
  move() {
    this.contador++;
    if(this.contador>this.itemsCount - 1) this.contador=0;
    this.moveTo(this.contador);
  }
  resetIndicator(){
    this.slider.querySelectorAll(this.selector_controls+' li.active')
    .forEach( item => item.classList.remove('active') );
  }
  moveTo(index){
    let left = index*100;
    this.resetIndicator();
    this.container.style.left='-'+left+'%';
    if (!this.useControls) return;
      this.slider.querySelector(this.selector_controls+' li:nth-child('+(index+1)+')').classList.add('active')
  }

}


const days=['Dominngo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'];

const months=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Setiembre','Octubre','Noviembre','Diciembre'];

class ControlCalendar {
  constructor(options){

    this.date = options.date || new Date();
    this.container = options.container;

    this.calendarTable=null;
    this.onselect=options.onselect;
    this.buildTable();
    this.bindEvents();
    this.updateTable();
  }
  updateTable(){
    this.calculateDates();
    let firstDayInWeek=this.monthStart.getDay();
    let trs=this.calendarTable.querySelectorAll('tr');
    for(var i=0; i<5; i++){
      let tr=trs[i];
      let tds=tr.querySelectorAll('td');
      for(var j=0; j<7; j++){
        let td=tds[j];
        let day=(i*7)+j;
        if(day>=firstDayInWeek && day<this.monthLenth+firstDayInWeek){
          let day_number= day-firstDayInWeek + 1;
          td.innerHTML= day_number;
          td.style.borderStyle='solid';
          td.dataset.day=day_number;
        } else {
          td.innerHTML='';
          td.style.borderStyle='none';
          td.removeAttribute('date-day');
        }
      }
    }  
    this.container.querySelector('header').innerHTML=`${months[this.date.getMonth()]} - ${this.date.getFullYear()}`;
  }
  bindEvents(){
    this.buttons={};
    this.buttons.prev=document.createElement('button');
    this.buttons.next=document.createElement('button');
    this.buttons.prev.innerHTML='Anterior';
    this.buttons.next.innerHTML='Siguiente';
    this.container.querySelector('.body').appendChild(this.buttons.prev);
    this.container.querySelector('.body').appendChild(this.buttons.next);

    this.buttons.prev.addEventListener('click',()=>this.prev());
    this.buttons.next.addEventListener('click',()=>this.next());
  }
  calculateDates(){
    this.monthStart=new Date (this.date.getFullYear(),this.date.getMonth(),1)
    this.monthEnd=new Date (this.date.getFullYear(),this.date.getMonth()+1,1)
    this.monthLenth=Math.floor((this.monthEnd-this.monthStart) / (1000*60*60*24));
  }
  next(){
    let month=this.date.getMonth();
    if(month==11){
      this.date=new Date(this.date.getFullYear()+1,0,1);
    } else {
      this.date=new Date(this.date.getFullYear(),month+1,1);
    }
    this.updateTable();
  }
  prev(){
    let month=this.date.getMonth();
    if(month==0){
      this.date=new Date(this.date.getFullYear()-1,11,1);
    } else {
      this.date=new Date(this.date.getFullYear(),month-1,1);
    }
    this.updateTable();
  }
  select(el){
    if(!el.dataset.day) return;
    let date = new Date(this.date.getFullYear(),this.date.getMonth(),el.dataset.day);
    this.onselect(date);
  }
  buildTable(){
    let table = document.createElement('table');
    let thead = document.createElement('thead');
    for(var i=0; i<7; i++){
      let td=document.createElement('td');
      td.innerHTML=days[i];
      thead.appendChild(td);
    }
    for(var i=0; i<5; i++){
      let tr=document.createElement('tr');
      for(var j=0; j<7; j++){
        let td=document.createElement('td');
        td.addEventListener('click',()=>this.select(td))
        tr.appendChild(td);
      }
      table.appendChild(tr)
    }    
    this.calendarTable=table; 
    table.appendChild(thead);

    let body = document.createElement('div');
    body.classList.add('body');
    body.appendChild(table);

    // this.container.classList.add('custom-calendar');
    this.container.appendChild(document.createElement('header'));
    this.container.appendChild(body);
  }

}

module.exports = ()=>{
  
  new ControlSlider({
    container:document.querySelector('.custom_slider'),
    externalControls:document.querySelector('.slider_external_controls ul'),
    useControls:true,
    autostart:false,
    wait:5
  });

  new ControlCalendar({
    container:document.querySelector('.custom_calendar'),
    // date:new Date(2020,5,1),
    onselect:(date)=>{
      console.log(date);
    }
  });

}

