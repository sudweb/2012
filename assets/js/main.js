(function($){
	var $div = $('#flickr');

	var url = 'http://api.flickr.com/services/rest/?format=json&api_key=' + $div.data('key');
	if ($div.data('photoset')){
		url += '&method=flickr.photosets.getPhotos&photoset_id=' + $div.attr('data-photoset');  //avoids casting
	}
	else if ($div.data('userid')){
		url += '&method=flickr.photos.search&user_id=' + $div.data('userid');
	}

	$.getJSON(url+'&jsoncallback=?', function(data) {
		var photos = data.photoset || data.photos,
				photos_length = photos.photo.length;

		var randomnumber=Math.floor(Math.random()*photos_length)
		var rPhoto = photos.photo[randomnumber];
		var basePhotoURL = 'http://farm' + rPhoto.farm + '.static.flickr.com/' + rPhoto.server + '/' + rPhoto.id + '_' + rPhoto.secret;

		var thumbPhotoURL = basePhotoURL + '_s.jpg';
		var smallPhotoURL = basePhotoURL + '_m.jpg';
		var mediumPhotoURL = basePhotoURL + '.jpg';

		$div.html('<img src="' + smallPhotoURL + '" alt=""/>');
	});
})(jQuery);
