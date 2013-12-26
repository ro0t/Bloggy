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

var currentSelection = function(node) {

	var flag = false;
	var t = '';
    if(window.getSelection) {
        t = window.getSelection();
    } else if(document.getSelection) {
        t = document.getSelection();
    } else if(document.selection) {
        t = document.selection.createRange().text;
    }

    return ($(t.anchorNode).closest('section#content') !== undefined) ? t : null;

};

function editor() {

	if($('[contenteditable]').length > 0) {
		$('body').append('<div class="bloggyEditorToolbar">' +
			'<button type="button" data-type="left"><i class="fa fa-align-left"></i></button>' +
			'<button type="button" data-type="right"><i class="fa fa-align-right"></i></button>' +
			'<button type="button" data-type="center"><i class="fa fa-align-center"></i></button>' +
			'<button type="button" data-type="bold"><i class="fa fa-bold"></i></button>' +
			'<button type="button" data-type="italic"><i class="fa fa-italic"></i></button>' +
			'<button type="button" data-type="link"><i class="fa fa-link"></i></button>' +
			'<button type="button" data-type="unlink"><i class="fa fa-unlink"></i></button>' +
			'<button type="button" data-type="list-ul"><i class="fa fa-list-ul"></i></button>' +
			'<button type="button" data-type="list-ol"><i class="fa fa-list-ol"></i></button>' +
			'<button type="button" data-type="image"><i class="fa fa-picture-o"></i></button>' +
			'<button type="button" data-type="undo"><i class="fa fa-undo"></i></button>' +
			'<button type="button" data-type="redo"><i class="fa fa-repeat"></i></button>' +
			'</div>');

		var borderRad = '3px';
		var blue = '#00c0e4';
		var $editor = $('.bloggyEditorToolbar');

		$editor.css({
			display: 'none',
			position: 'absolute',
			'-webkit-border-radius': borderRad,
			'-moz-border-radius': borderRad,
			'border-radius': borderRad,
			textAlign: 'center',
		});

		$editor.find('button').css({
			margin: 3,
			padding: '5px 10px',
			background: blue,
			color: '#fff',
			outline: 0,
			border: 0,
			'-webkit-border-radius': borderRad,
			'-moz-border-radius': borderRad,
			'border-radius': borderRad,
		});

		$editor.find('button').click(function() {
			var selectedText = currentSelection('content');
			var $button = $(this);
			if(selectedText !== null) {
				var type = $button.data('type');

				if(type === 'left') {
					document.execCommand('justifyleft');
				}

				if(type === 'right') {
					document.execCommand('justifyright');
				}

				if(type === 'center') {
					document.execCommand('justifycenter');
				}

				if(type === 'bold') {
					document.execCommand('bold');
				}

				if(type === 'italic') {
					document.execCommand('italic');
				}

				if(type === 'link') {
					document.execCommand('CreateLink', true, 'http://www.mbl.is');
				}

				if(type === 'unlink') {
					document.execCommand('unlink');
				}

				if(type === 'list-ul') {
					document.execCommand('insertunorderedlist');
				}

				if(type === 'list-ol') {
					document.execCommand('insertorderedlist');
				}

				if(type === 'undo') {
					document.execCommand('undo');
				}

				if(type === 'redo') {
					document.execCommand('redo');
				}
			}

		});

		return $editor;
	}

	return null;
}

$(function() {

	var $editor = editor();

	$('[contenteditable]').each(function() {
		var $e = $(this);
		var boxShadow = '0px 0px 10px rgba(0,0,0,.1)';
		var borderError = '1px dashed #e74c3c';
		var borderSuccess = '1px dashed #2ecc71';

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

	if($editor !== null) {
		$('#content[contenteditable]').focus(function() {
			var $e = $(this);
			$e.animate({
				marginTop: $editor.height()
			}, function() {
				$editor.css({
					top: $e.offset().top - $editor.height(),
					left: $e.offset().left,
					width: $e.width(),
					maxWidth: $e.width(),
				});
				$editor.fadeIn();
			});
		});
	}

	$('[data-click=publish]').click(function() {
		var $title = $('#title').html();
		var $content = $('#content').html();

		api('/api/create', 'post', { title: $title, content: $content }, function(data) {
			if(data.response) {
				window.location = '/blog/' + data.id;
			}
			else {
				console.log('BLOGGY ERROR:');
				console.log(data.message);
			}
		});
	});

	$('[data-click=save]').click(function() {
		var $title = $('#title').html();
		var $content = $('#content').html();
		var $id = $('#id').val();

		api('/api/edit/' + $id, 'post', { title: $title, content: $content }, function(data) {
			if(data.response) {
				window.location = '/blog/' + data.id;
			}
			else {
				console.log('BLOGGY ERROR:');
				console.log(data.message);
			}
		});
	});

});