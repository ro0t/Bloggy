/**
* Bloggy Javascript
*/

function api(action, apiMethod, apiData, callback) {
	$.ajax({
		url: action,
		method: apiMethod,
		data: apiData,
		dataType: 'json',
		success: function(data) {
			callback(data);
		},
		error: function(response) {
			console.log('Bloggy: API Error for action: ' + action);
			console.log(response);
		}
	});
}

$(function() {

	$('[contenteditable]').each(function() {
		var $e = $(this);
		var boxShadow = '0px 0px 10px rgba(0,0,0,.1)';
		var borderError = '1px dashed #e74c3c';
		var borderSuccess = '1px dotted #2ecc71';

		var borderChange = function() {

			var val = $e.html();

			if(val === undefined || val.length === 0) {
				$e.css({'border':borderError});
			} else {
				$e.css({'border': borderSuccess});
			}

		};

		$e.css({
			'padding': '3px',
			'border': borderError,
			'box-shadow': boxShadow,
			'-webkit-box-shadow': boxShadow,
			'-moz-box-shadow': boxShadow,
			'-o-box-shadow': boxShadow,
			'-ms-box-shadow': boxShadow,
		});

		$e.keypress(function() {
			borderChange();
		});

		$e.blur(function() {
			borderChange();
		});

	});

	$('[data-click=publish]').click(function() {
		var $title = $('#title').html();
		var $content = $('#content').html();

		api('/api/create', 'post', { title: $title, content: $content }, function(data) {
			if(data.response)
				window.location = '/blog/' + data.id;
			else
				console.log(data.message);
		});
	});

	$('[data-click=save]').click(function() {
		var $title = $('#title').html();
		var $content = $('#content').html();
		var $id = $('#id').val();

		api('/api/edit/' + $id, 'post', { title: $title, content: $content }, function(data) {
			if(data.response)
				window.location = '/blog/' + data.id;
			else
				console.log(data.message);
		});
	});

});