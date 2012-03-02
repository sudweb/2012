(function($){
	var $div = $('#flickr');

	var url = 'http://api.flickr.com/services/rest/?format=json&method='
		+ 'flickr.photos.search&api_key=' + $div.data('key')
		+ '&user_id=' + $div.data('userid') + '&jsoncallback=?';

	$.getJSON(url, function(data) {
		var total = data.photos.photo.length; //and not total because it's higher than the number of returned photos
		var randomnumber=Math.floor(Math.random()*total)
		var rPhoto = data.photos.photo[randomnumber];
		var basePhotoURL = 'http://farm' + rPhoto.farm + '.static.flickr.com/' + rPhoto.server + '/' + rPhoto.id + '_' + rPhoto.secret;

		var thumbPhotoURL = basePhotoURL + '_s.jpg';
		var smallPhotoURL = basePhotoURL + '_m.jpg';
		var mediumPhotoURL = basePhotoURL + '.jpg';

		$div.html('<img src="' + smallPhotoURL + '" alt=""/>');
	});
})(jQuery);
