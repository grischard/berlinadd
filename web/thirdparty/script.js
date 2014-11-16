$(document).ready(function(){
	pagedidload();
	
	$("#toggleKey").click(function() {
		$("#key").toggle();
		var newText;
		if($("#key").is(":visible")) {
			newText = "Legende ausblenden";
		} else {
			newText = "Legende einblenden";
		}
		$("#toggleKey").text(newText);
	});

    $.widget("custom.catcomplete", $.ui.autocomplete, {
		_create: function() {
			this._super();
			this.widget().menu("option", "items", "> :not(.ui-autocomplete-category)");
		},
		_renderMenu: function(ul, items) {
			var that = this, currentCategory = "";
			$.each(items, function(index, item) {
				var li;
				if(item.category != currentCategory) {
					ul.append("<li class='ui-autocomplete-category'>" + item.category + "</li>");
					currentCategory = item.category;
				}
				li = that._renderItemData(ul, item);
				if(item.category) {
					li.attr("aria-label", item.category + " : " + item.label);
				}
			});
		},
		_renderItem: function (ul, item) {
        	return $("<li></li>")
        		.data("item.autocomplete", item)
             	.append(item.label)
             	.appendTo(ul);
     	}
	});
	
    $("#search").catcomplete({
        source: "search.php",
        delay: 100,
        minLength: 1,
        select: function(event, ui) {
            var item = ui.item;
            $(location).attr("href", item.url);
            return false;
        },
        focus: function(event, ui) {
        	return false; 
        }
    })
});

function showMap(lat, lon) {
	var osmUrl = "http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png";
	var osmAttrib='Map data © <a href="http://openstreetmap.org">OpenStreetMap</a> contributors';
	var osm = new L.TileLayer(osmUrl, {minZoom: 1, maxZoom: 19, attribution: osmAttrib});		

	map = new L.Map("map");
	map.setView(new L.LatLng(lat, lon), 17);
	map.addLayer(osm);

	L.marker([lat, lon]).addTo(map);
}