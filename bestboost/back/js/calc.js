$('.order_body').each(function(){
		let ths = $(this)
		ths.find('.addInp input').change(function(){

			if (ths.hasClass('orderNetwin')) {

				let amount = Number(ths.find('.finalAmountInp').val())
				let addOpt = Number($(this).val())
			
				if(this.checked) {
					ths.find('.clearAmount').text((amount * addOpt * 2).toFixed(2))
					ths.find('.finalAmountInp').val((amount * addOpt).toFixed(2))
					ths.find('.finalAmount').text('$' + (amount * addOpt).toFixed(2))
				} else {
					ths.find('.clearAmount').text((amount / addOpt * 2).toFixed(2))
					ths.find('.finalAmountInp').val((amount / addOpt).toFixed(2))
					ths.find('.finalAmount').text('$' + (amount / addOpt).toFixed(2))
				}


			} else {

			let amount = Number(ths.find('.finalAmountInp').val())

			lp(amount)

			let addOpt = Number($(this).val())
			
				if(this.checked) {
					ths.find('.clearAmount').text((amount * addOpt * 2).toFixed(2))
					ths.find('.finalAmountInp').val((amount * addOpt).toFixed(2))
					ths.find('.finalAmount').text('$' + (amount * addOpt).toFixed(2))
				} else {
					ths.find('.clearAmount').text((amount / addOpt * 2).toFixed(2))
					ths.find('.finalAmountInp').val((amount / addOpt).toFixed(2))
					ths.find('.finalAmount').text('$' + (amount / addOpt).toFixed(2))
				}

			}

		})

		ths.find('.currentPoint').change(function(){

			ths.find('.addInp input').prop("checked", false)

			let currentRank = ths.find('.chooseCurrentRank').find(":selected").val(),
				 desiredRank = ths.find('.chooseDesiredRank').find(":selected").val();

			$.ajax({
				type: 'POST',
				url: 'getPrice.php',
				data: {currentRank:currentRank, desiredRank:desiredRank},
				success: function(data){
					lp(data)
				}
			})
	
		})

		function lp(price){
			let lp = ths.find('.currentPoint').val()
			switch (lp) {
				case '21-40':  
					ths.find('.clearAmount').text('$' + ((price-0.6)*2).toFixed(2))
					ths.find('.finalAmount').text('$' + (price - 0.6).toFixed(2))
					ths.find('.finalAmountInp').val(price-0.6)
					break
				case '41-60':
					ths.find('.clearAmount').text('$' + ((price-1.2)*2).toFixed(2))
					ths.find('.finalAmount').text('$' + (price - 1.2).toFixed(2))
					ths.find('.finalAmountInp').val(price-1.2)
					break
				case '61-80': 
					ths.find('.clearAmount').text('$' + ((price-1.8)*2).toFixed(2))
					ths.find('.finalAmount').text('$' + (price - 1.8).toFixed(2))
					ths.find('.finalAmountInp').val(price-1.8).toFixed(2)
					break
				case '81-100':
					ths.find('.clearAmount').text('$' + ((price-2.4)*2).toFixed(2))
					ths.find('.finalAmount').text('$' + (price - 2.4).toFixed(2))
					ths.find('.finalAmountInp').val(price-2.4).toFixed(2)
					break
				default: 
					ths.find('.clearAmount').text('$' + (price*2).toFixed(2))
					ths.find('.finalAmount').text('$' + (price).toFixed(2))
					ths.find('.finalAmountInp').val(price).toFixed(2)
					break
			}
		}

		ths.find('.chooseCurrentRank_NetWin').change(function(e){
			e.preventDefault();
			ths.find('.addInp input').prop("checked", false)
			let chooseCurrentRank_NetWin = ths.find('.chooseCurrentRank_NetWin').find(":selected").val()
			let winsQuant = Number(ths.find('.winsQuantInp').val())

			$.ajax({
				type: 'POST',
				url: 'getPriceNetWin.php',
				data: {chooseCurrentRank_NetWin:chooseCurrentRank_NetWin},
				success: function(data){
					
					ths.find('.clearAmount').text('$' + (data*winsQuant*2).toFixed(2))
					ths.find('.finalAmount').text('$' + (data*winsQuant).toFixed(2))
					ths.find('.finalAmountInp').val((data*winsQuant).toFixed(2))

					if ( isNaN(data) ) {
						ths.find('label').removeClass('active')
					} else {
						ths.find('label').addClass('active')
					}

				}
			})
		})

		ths.find('.winsQuantInp').change(function(e){
			e.preventDefault();
			ths.find('.addInp input').prop("checked", false)
			let count = $(this).val()
			$(this).siblings('.rangeInfo').text(count)
			let chooseCurrentRank_NetWin = ths.find('.chooseCurrentRank_NetWin').find(":selected").val()
			let winsQuant = Number(ths.find('.winsQuantInp').val())

			$.ajax({
				type: 'POST',
				url: 'getPriceNetWin.php',
				data: {chooseCurrentRank_NetWin:chooseCurrentRank_NetWin},
				success: function(data){
					
					ths.find('.clearAmount').text('$' + (data*winsQuant*2).toFixed(2))
					ths.find('.finalAmount').text('$' + (data*winsQuant).toFixed(2))
					ths.find('.finalAmountInp').val((data*winsQuant).toFixed(2))

					if ( isNaN(data) ) {
						ths.find('label').removeClass('active')
					} else {
						ths.find('label').addClass('active')
					}

				}
			})
		})



		ths.find('.chooseCurrentRank, .chooseDesiredRank').change(function(e){
			e.preventDefault();

			ths.find('.addInp input').prop("checked", false)

			let currentRank = ths.find('.chooseCurrentRank').find(":selected").val(),
				 desiredRank = ths.find('.chooseDesiredRank').find(":selected").val();	
			
				
			ths.find('.from').text(currentRank)
			ths.find('.to').text(desiredRank)

			$.ajax({
				type: 'POST',
				url: 'getPrice.php',
				data: {currentRank:currentRank, desiredRank:desiredRank},
				success: function(data){
					
					lp(data)

					if ( isNaN(data) ) {
						ths.find('label').removeClass('active')
					} else {
						ths.find('label').addClass('active')
					}

				}
			})

		})

	})