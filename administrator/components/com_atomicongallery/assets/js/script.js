var image_current = 0;
var image_count   = 0;
var file_upload   = 0;

function processImages()
{
	image_current = image_count = 0;
	while(image_count<10000) {
		obj = $('file_' + image_count);
		if (!obj) {
			break;
		}
		image_count++;
	}
	if (image_count > 0) {
        processImage();
	}
	setProgress(image_current, image_count);
}

function processImage()
{
	var qstring,url;
	var file = $('file_' + image_current);
	
	if (file)
	{
		qstring  = '';
		qstring += 'folder=' + escape($('folder').value) + '&';
		qstring += 'file=' + escape(file.value) + '&';
		qstring += 'imagelib=' + escape($('imagelib').value) + '&';
        qstring += 'skip_if_exists=' + ($('skip_if_exists').checked ? '1' : '0') + '&';

		qstring += 'tn_process=' + ($('tn_process').checked ? '1' : '0') + '&';
		qstring += 'tn_width=' + escape($('tn_width').value) + '&';
		qstring += 'tn_height=' + escape($('tn_height').value) + '&';
		
		qstring += 'img_process=' + ($('img_process').checked ? '1' : '0') + '&';
		qstring += 'img_width=' + escape($('img_width').value) + '&';
		qstring += 'img_height=' + escape($('img_height').value) + '&';

        url = 'index.php?option=com_atomicongallery&task=process_image&' + qstring;

		new Ajax(url , {
			method: 'get',
			//update: $('file_' + image_current + '_status'),
			onComplete: function(){
			  image_current++;
			  setProgress(image_current, image_count);
			  processImage();
			}
		}).request();

	} else {
        window.parent.document.getElementById('sbox-window').close();
        window.parent.document.location.reload(true);
	}
}

function setProgress(value, total)
{
	if ($('progressbar-container') && $('progressbar') && total > 0)
	{
		var percent = Math.ceil(value*100/total) + '%';
		$('progressbar').innerHTML = percent;
		$('progressbar').style.width = percent;
		$('progressbar').style.display = '';
		$('progressbar-container').style.display = '';
	}
	else
	{
        $('progressbar-container').style.display = 'none';
	}
}


function addFileUpload(newid)
{
    if (!document.getElementById('file_upload_' + (newid+1)))
    {
		var node = document.createElement('div');
		node.innerHTML = '<input type="file" id="file_upload_' + newid + '" name="file_upload_' + newid + '" onchange="javascript: addFileUpload(' + (newid+1) + ')">';
		document.getElementById('file_upload_container').appendChild(node);
	}
}