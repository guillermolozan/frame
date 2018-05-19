module.exports = ()=>{
	var images=[
	
	[{'img':'1','release':'toUp'}],
	
	[{'img':'2','release':'toRight'},
	{'img':'3','release':'toLeft'}],

	[{'img':'4','release':'toUp'},
	{'img':'5','release':'toDown'}],
	
	[{'img':'6','release':'toRight'},
	{'img':'7','release':'toLeft'}],

	[
	// {'img':'8','release':'toUp'},
	{'img':'9','release':'toRight'},
	{'img':'10','release':'toLeft'}],
	
	[{'img':'11','release':'toRight'},
	{'img':'12','release':'toUp'},
	{'img':'13','release':'toLeft'}],
	
	[{'img':'14','release':'toRight'},
	{'img':'15','release':'toDown'},
	{'img':'16','release':'toLeft'}],
	
	[{'img':'17','release':'toRight'},
	{'img':'18','release':'toLeft'}],
	
	[{'img':'19','release':'toRight'},
	{'img':'20','release':'toShow'},
	{'img':'21','release':'toLeft'}]

	];


	// console.log(pub_img);
	images.forEach((step)=>{
		step.forEach((image)=>{
			$('#banner').append("<div class='coll image_"+image.img+"'>"+
				"<img src='"+pub_img+"/animacion/"+image.img+".jpg?1'>"+
				"</div>");
		});
	});

	let i=0;
	let classes=["toLeft ","toRight","toDown","toUp","toShow","Blink"];


	release();

	setInterval(()=>{	

		release();

		if(i==images.length) i=0
	}, 5000);


	function release(){

		classes.forEach((cla)=>{
			$('#banner .coll').removeClass(cla);
		});

		images[i].forEach((image)=>{
			$('.image_'+image.img).addClass(image.release);
		});
		i++;

	}


}
	