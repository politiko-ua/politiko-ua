var ideasController = new function()
{
	this.createAction = function ()
    {
		var form = new Form(
			'add_form',
			{
				validators:
				{
					title: [validatorRequired],
					text: [validatorRequired]
				},
				success: function()
				{
					$('.success').fadeIn( 250, function() { $('.success').fadeOut( 1500 ); } );
					document.location = '/ideas/mine';
				}
			}
		);
    };

	this.rateIdea = function( id )
	{
		$.post(
			'/ideas/rate',
			{id: id},
			function() { $('#rate').html( parseInt($('#rate').html()) + 1 ) },
			'json'
		);

		$('#rate_pane > a').fadeOut(150);
	};

	this.viewAction = function ()
    {
		var form = new Form(
			'comment_form',
			{
				validators:
				{
					text: [validatorRequired]
				},
				success: function( response )
				{
					$('#no_comments').hide();
					$('#comments').append( response );
					form.getForm().hide( 150 );
				},
				format: 'raw'
			}
		);

		var replyForm = new Form(
			'comment_reply_form',
			{
				validators:
				{
					text: [validatorRequired]
				},
				success: function( response )
				{
					$('#no_comments').hide();
					$('#child_comments_' + replyForm.get('parent_id').val()).append( response );
					replyForm.getForm().hide();
				},
				format: 'raw'
			}
		);

		$('.comment_reply').bind('click', function(){
			replyForm.get('text').val('');
			$('#comment_reply_form').appendTo($(this).parent());
			$('#comment_reply_form').show();
			replyForm.get('parent_id').val( $(this).attr('rel') );
			replyForm.get('text').focus();
		});
    };

	this.rateComment = function( object, id, positive )
	{
		$(object).parent().fadeOut(150);

		var rateEl = $(object).parent().parent().children('span.bold');
		var newRate = parseInt(rateEl.html()) + (positive ? 1 : -1);

		if ( newRate > 0 )
		{
			newRate = '+' + newRate;
			rateEl.css({color: 'green'});
		}
		else
		{
			rateEl.css({color: 'red'});
		}

		rateEl.html( newRate );

		$.post(
			'/ideas/comment_rate',
			{id: id, positive: positive ? 1 : 0}
		);
	};
};
