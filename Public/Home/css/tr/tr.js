var order=$('.o');
	var total=0;
	var num=0;
	for(var i=0;i<order.length;i++){
		var aOrder=order.eq(i).find('.order');
		var aGoods=order.eq(i).find('.num').find('span');
		var aPrice=order.eq(i).find('.price').find('span');
		var aFreight=order.eq(i).find('.freight');
		for(var j=0;j<aGoods.length;j++){
			num+=parseInt(aGoods.eq(j).text());
		}
	total=addFn(total,aFreight.html());
	order.eq(i).find('.total_box').find('.goods').html(num);
	num=0;
	for(var k=0;k<aOrder.length;k++){
		total+=mulFn(parseInt(aOrder.eq(k).find('.num').find('span').html()),parseInt(aOrder.eq(k).find('.price').find('span').html()));
	}
	order.eq(i).find('.total').html(total);
	total=0;
}
