// Cycle 1 Slider jQuery functionality to drag-n-drop, delete and upload images.
(function($) {

	// Initialise the table
	$('#c1-table-slides').tableDnD({
		onDragClass: "myDragClass",
		onDrop: function(table, row) {
		    var rows = table.tBodies[0].rows;
		    var slidesOrder = rows[0].id;
		    for (var i=1; i<rows.length; i++) {
			slidesOrder += ","+rows[i].id;
		    }
		    $('input#c1_slides_order_str').val(slidesOrder);
		},
		dragHandle: "dragHandle"
	});

	// Attach the file uploader module to each row
	$('#c1-table-slides tr').each(function() {
	    var curID = parseInt($(this).attr('id'));
            addUploader('#c1-table-slides', curID);
	});
        
	// Delete a slide
	$('#c1-table-slides tr td.deleteSlide').bind("mousedown", ( deleteSlide ));

	// Add a new slide
	$('.add-row').bind("mousedown", (function(event){
		// find current highest tr id
		var highestID = 0;
		$('#c1-table-slides tr').each(function() {
		    var curID = parseInt($(this).attr('id'));
		    if (highestID < curID){
			highestID = curID;
		    }
		});
		// Clone table row
		$('#c1-clone-table tr').clone().appendTo($('#c1-table-slides'));
		$('#c1-table-slides tr:last').attr("id",++highestID);
		// Update Image Upload Section
		$('#c1-table-slides tr:last td div.c1_slide_upload_section label').attr("for",'c1_slide_img_url_'+highestID);
		$('#c1-table-slides tr:last td div.c1_slide_upload_section input.c1_slide_img_url_field').attr("name","udesign_options[c1_slide_img_url_"+highestID+"]").attr("id","c1_slide_img_url_"+highestID).attr("value","");
		$('#c1-table-slides tr:last td div.c1_slide_upload_section input.c1_slide_img_url_btn').attr("id","c1_slide_upload_button_"+highestID);
		// Update Transition Type
		$('#c1-table-slides tr:last td div.transition-type select').attr("value","").attr("id","c1_transition_type_"+highestID).attr("name","udesign_options[c1_transition_type_"+highestID+"]");
		// Update Slide Link ID's
		$('#c1-table-slides tr:last td div.slide-link').attr("id",'c1_slide_link_url_'+highestID);
		$('#c1-table-slides tr:last td div.slide-link label.link-url').attr("for",'c1_slide_link_url_'+highestID);
		$('#c1-table-slides tr:last td div.slide-link input').attr("name",'udesign_options[c1_slide_link_url_'+highestID+']').attr("id",'c1_slide_link_url_'+highestID);
		$('#c1-table-slides tr:last td div.slide-link label.link-target').attr("for",'c1_slide_link_target_'+highestID);
		$('#c1-table-slides tr:last td div.slide-link label.link-target select').attr("name",'udesign_options[c1_slide_link_target_'+highestID+']').attr("id",'c1_slide_link_target_'+highestID);
		$('#c1-table-slides tr:last td div.slide-link .slide-alt-tag label').attr("for",'c1_slide_image_alt_tag_'+highestID);
		$('#c1-table-slides tr:last td div.slide-link .slide-alt-tag input').attr("name",'udesign_options[c1_slide_image_alt_tag_'+highestID+']').attr("id",'c1_slide_image_alt_tag_'+highestID);
		// Add the image upload module to the newly added row
		addUploader('#c1-table-slides tr:last', highestID);
                
		// sort displayed row numbers
		$('#c1-table-slides tr').each(function(index) {
		    $("#c1-table-slides tr td.position").eq(index).html(index+1);
		});

		// Add click event to the remove button on the newly added row
		$('#c1-table-slides tr:last td.deleteSlide').bind("mousedown", ( deleteSlide ));

		// update the slides' list
		var slidesOrder = '';
		$('#c1-table-slides tr').each(function(index) {
		    if (index == 0){
			slidesOrder += $(this).attr('id');
		    } else {
			slidesOrder += ","+$(this).attr('id');
		    }
		});
		// update the input#c1_slides_order_str
		$('input#c1_slides_order_str').val(slidesOrder);
		$("#c1-table-slides").tableDnDUpdate();

		event.stopPropagation;
		return false;
	}));

	function deleteSlide() {
		// remove delete slide button if only one slide is left
		if ($('#c1-table-slides tr').size() == 1) {
		    alert("Deletion is not allowed! At least one slide must be present.");
		    return false;
		} else {
		    if (confirm("Delete this Slide?")) {
			$(this).parent().remove();
		    }
		    // sort displayed row numbers
		    $('#c1-table-slides tr').each(function(index) {
			$("#c1-table-slides tr td.position").eq(index).html(index+1);
		    });

		    // update the slides order
		    var slidesOrder = '';
		    $('#c1-table-slides tr').each(function(index) {
			if (index == 0){
			    slidesOrder += $(this).attr('id');
			}else {
			    slidesOrder += ","+$(this).attr('id');
			}
		    });
		    // update the input#c1_slides_order_str
		    $('input#c1_slides_order_str').val(slidesOrder);
		    $("#c1-table-slides").tableDnDUpdate();

		    event.stopPropagation;
		    return false;
		}
	}
	function addUploader(tableOrRow, rowID) {
            var udesign_custom_uploader;
            $('#c1_slide_upload_button_'+rowID).click(function(event) {
                
                    event.preventDefault();

                    //Extend the wp.media object
                    udesign_custom_uploader = wp.media.frames.file_frame = wp.media({
                        title: 'Choose Image',
                        button: {
                            text: 'Choose Image'
                        },
                        multiple: false // Set to true to allow multiple files to be selected
                    });
                    //When a file is selected, grab the URL and set it as the text field's value
                    udesign_custom_uploader.on('select', function() {
                        attachment = udesign_custom_uploader.state().get('selection').first().toJSON();
                        // set the image URL to the input text field
                        $('#c1_slide_img_url_'+rowID).val(attachment.url);
                        return false;
                    });
                    //Open the uploader dialog
                    udesign_custom_uploader.open();

                });
	}

})(jQuery);



// Cycle 2 Slider jQuery functionality to drag-n-drop, delete and upload images.
(function($) {

	// Initialise the table
	$('#c2-table-slides').tableDnD({
		onDragClass: "myDragClass",
		onDrop: function(table, row) {
		    var rows = table.tBodies[0].rows;
		    var slidesOrder = rows[0].id;
		    for (var i=1; i<rows.length; i++) {
			slidesOrder += ","+rows[i].id;
		    }
		    $('input#c2_slides_order_str').val(slidesOrder);
		},
		dragHandle: "dragHandle"
	});

	// Attach the file uploader module to each row
	$('#c2-table-slides tr').each(function() {
	    var curID = parseInt($(this).attr('id'));
	    addUploader('#c2-table-slides', curID);
	});

	// Delete a slide
	$('#c2-table-slides tr td.deleteSlide').bind("mousedown", ( deleteSlide ));

	// Add a new slide
	$('.add-row').bind("mousedown", (function(event){
		// find current highest tr id
		var highestID = 0;
		$('#c2-table-slides tr').each(function() {
		    var curID = parseInt($(this).attr('id'));
		    if (highestID < curID){
			highestID = curID;
		    }
		});
		// Clone table row
		$('#c2-clone-table tr').clone().appendTo($('#c2-table-slides'));
		$('#c2-table-slides tr:last').attr("id",++highestID);
		// Update Image Upload Section
		$('#c2-table-slides tr:last td div.c2_slide_img_url label').attr("for",'c2_slide_img_url_'+highestID);
		$('#c2-table-slides tr:last td div.c2_slide_img_url input.c2_slide_img_url_field').attr("name","udesign_options[c2_slide_img_url_"+highestID+"]").attr("id","c2_slide_img_url_"+highestID).attr("value","");
		$('#c2-table-slides tr:last td div.c2_slide_img_url input.c2_slide_img_url_btn').attr("id","c2_slide_upload_button_"+highestID);
		// Update Transition Type
		$('#c2-table-slides tr:last td div.transition-type select').attr("value","").attr("id","c2_transition_type_"+highestID).attr("name","udesign_options[c2_transition_type_"+highestID+"]");
		// Update Slide Link
		$('#c2-table-slides tr:last td div.slide-link').attr("id",'c2_slide_link_url_'+highestID);
		$('#c2-table-slides tr:last td div.slide-link label.link-url').attr("for",'c2_slide_link_url_'+highestID);
		$('#c2-table-slides tr:last td div.slide-link input').attr("name",'udesign_options[c2_slide_link_url_'+highestID+']').attr("id",'c2_slide_link_url_'+highestID);
		$('#c2-table-slides tr:last td div.slide-link label.link-target').attr("for",'c2_slide_link_target_'+highestID);
		$('#c2-table-slides tr:last td div.slide-link label.link-target select').attr("name",'udesign_options[c2_slide_link_target_'+highestID+']').attr("id",'c2_slide_link_target_'+highestID);
		$('#c2-table-slides tr:last td div.slide-link .slide-alt-tag label').attr("for",'c2_slide_image_alt_tag_'+highestID);
		$('#c2-table-slides tr:last td div.slide-link .slide-alt-tag input').attr("name",'udesign_options[c2_slide_image_alt_tag_'+highestID+']').attr("id",'c2_slide_image_alt_tag_'+highestID);
		// Update slide's info text
		$('#c2-table-slides tr:last td div.slide-info-text textarea').attr("name",'udesign_options[c2_slide_default_info_txt_'+highestID+']').attr("id",'c2_slide_default_info_txt_'+highestID);
		// Update Slide Button Text & Style
		$('#c2-table-slides tr:last td div.slide-button label.slide-button-text').attr("for",'c2_slide_button_txt_'+highestID);
		$('#c2-table-slides tr:last td div.slide-button input').attr("name",'udesign_options[c2_slide_button_txt_'+highestID+']').attr("id",'c2_slide_button_txt_'+highestID);
		$('#c2-table-slides tr:last td div.slide-button label.slide-button-style').attr("for",'c2_slide_button_style_'+highestID);
		$('#c2-table-slides tr:last td div.slide-button label.slide-button-style select').attr("name",'udesign_options[c2_slide_button_style_'+highestID+']').attr("id",'c2_slide_button_style_'+highestID);

		// Add the image upload module to the newly added row
		addUploader('#c2-table-slides tr:last', highestID);

		// sort displayed row numbers
		$('#c2-table-slides tr').each(function(index) {
		    $("#c2-table-slides tr td.position").eq(index).html(index+1);
		});

		// Add click event to the remove button on the newly added row
		$('#c2-table-slides tr:last td.deleteSlide').bind("mousedown", ( deleteSlide ));

		// update the slides' list
		var slidesOrder = '';
		$('#c2-table-slides tr').each(function(index) {
		    if (index == 0){
			slidesOrder += $(this).attr('id');
		    } else {
			slidesOrder += ","+$(this).attr('id');
		    }
		});
		// update the input#c2_slides_order_str
		$('input#c2_slides_order_str').val(slidesOrder);
		$("#c2-table-slides").tableDnDUpdate();

		event.stopPropagation;
		return false;
	}));

	function deleteSlide() {
		// remove delete slide button if only one slide is left
		if ($('#c2-table-slides tr').size() == 1) {
		    alert("Deletion is not allowed! At least one slide must be present.");
		    return false;
		} else {
		    if (confirm("Delete this Slide?")) {
			$(this).parent().remove();
		    }
		    // sort displayed row numbers
		    $('#c2-table-slides tr').each(function(index) {
			$("#c2-table-slides tr td.position").eq(index).html(index+1);
		    });

		    // update the slides order
		    var slidesOrder = '';
		    $('#c2-table-slides tr').each(function(index) {
			if (index == 0){
			    slidesOrder += $(this).attr('id');
			}else {
			    slidesOrder += ","+$(this).attr('id');
			}
		    });
		    // update the input#c2_slides_order_str
		    $('input#c2_slides_order_str').val(slidesOrder);
		    $("#c2-table-slides").tableDnDUpdate();

		    event.stopPropagation;
		    return false;
		}
	}
	function addUploader(tableOrRow, rowID) {
            var udesign_custom_uploader;
            $('#c2_slide_upload_button_'+rowID).click(function(event) {
                
                    event.preventDefault();

                    //Extend the wp.media object
                    udesign_custom_uploader = wp.media.frames.file_frame = wp.media({
                        title: 'Choose Image',
                        button: {
                            text: 'Choose Image'
                        },
                        multiple: false // Set to true to allow multiple files to be selected
                    });
                    //When a file is selected, grab the URL and set it as the text field's value
                    udesign_custom_uploader.on('select', function() {
                        attachment = udesign_custom_uploader.state().get('selection').first().toJSON();
                        // set the image URL to the input text field
                        $('#c2_slide_img_url_'+rowID).val(attachment.url);
                        return false;
                    });
                    //Open the uploader dialog
                    udesign_custom_uploader.open();

                });
	}

})(jQuery);


// Cycle 3 Slider jQuery functionality to drag-n-drop, delete and upload images.
(function($) {

	// Initialise the table
	$('#c3-table-slides').tableDnD({
		onDragClass: "myDragClass",
		onDrop: function(table, row) {
		    var rows = table.tBodies[0].rows;
		    var slidesOrder = rows[0].id;
		    for (var i=1; i<rows.length; i++) {
			slidesOrder += ","+rows[i].id;
		    }
		    $('input#c3_slides_order_str').val(slidesOrder);
		},
		dragHandle: "dragHandle"
	});

	// Attach the file uploader module to each row
	$('#c3-table-slides tr').each(function() {
	    var curID = parseInt($(this).attr('id'));
	    addUploader('#c3-table-slides', curID);
            addUploader2('#c3-table-slides', curID);
	});

	// Delete a slide
	$('#c3-table-slides tr td.deleteSlide').bind("mousedown", ( deleteSlide ));

	// Add a new slide
	$('.add-row').bind("mousedown", (function(event){
		// find current highest tr id
		var highestID = 0;
		$('#c3-table-slides tr').each(function() {
		    var curID = parseInt($(this).attr('id'));
		    if (highestID < curID){
			highestID = curID;
		    }
		});
		// Clone table row
		$('#c3-clone-table tr').clone().appendTo($('#c3-table-slides'));
		$('#c3-table-slides tr:last').attr("id",++highestID);
		// Update Image Upload Section
		$('#c3-table-slides tr:last td div.c3_slide_img_url label').attr("for",'c3_slide_img_url_'+highestID);
		$('#c3-table-slides tr:last td div.c3_slide_img_url input.c3_slide_img_url_field').attr("name","udesign_options[c3_slide_img_url_"+highestID+"]").attr("id","c3_slide_img_url_"+highestID).attr("value","");
		$('#c3-table-slides tr:last td div.c3_slide_img_url input.c3_slide_img_url_btn').attr("id","c3_slide_upload_button_"+highestID);
		// Update Image2 Upload Section
		$('#c3-table-slides tr:last td div.c3_slide_img2_url label').attr("for",'c3_slide_img2_url_'+highestID);
		$('#c3-table-slides tr:last td div.c3_slide_img2_url input.c3_slide_img2_url_field').attr("name","udesign_options[c3_slide_img2_url_"+highestID+"]").attr("id","c3_slide_img2_url_"+highestID).attr("value","");
		$('#c3-table-slides tr:last td div.c3_slide_img2_url input.c3_slide_img2_url_btn').attr("id","c3_slide_upload_button2_"+highestID);
		// Update Slide Link
		$('#c3-table-slides tr:last td div.slide-link').attr("id",'c3_slide_link_url_'+highestID);
		$('#c3-table-slides tr:last td div.slide-link label.link-url').attr("for",'c3_slide_link_url_'+highestID);
		$('#c3-table-slides tr:last td div.slide-link input').attr("name",'udesign_options[c3_slide_link_url_'+highestID+']').attr("id",'c3_slide_link_url_'+highestID);
		$('#c3-table-slides tr:last td div.slide-link label.link-target').attr("for",'c3_slide_link_target_'+highestID);
		$('#c3-table-slides tr:last td div.slide-link label.link-target select').attr("name",'udesign_options[c3_slide_link_target_'+highestID+']').attr("id",'c3_slide_link_target_'+highestID);
		$('#c3-table-slides tr:last td div.slide-link .slide-alt-tag label').attr("for",'c3_slide_image_alt_tag_'+highestID);
		$('#c3-table-slides tr:last td div.slide-link .slide-alt-tag input').attr("name",'udesign_options[c3_slide_image_alt_tag_'+highestID+']').attr("id",'c3_slide_image_alt_tag_'+highestID);
		// Update slide's info text
		$('#c3-table-slides tr:last td div.slide-info-text textarea').attr("name",'udesign_options[c3_slide_default_info_txt_'+highestID+']').attr("id",'c3_slide_default_info_txt_'+highestID);

		// Add the image upload module to the newly added row
		addUploader('#c3-table-slides tr:last', highestID);
		addUploader2('#c3-table-slides tr:last', highestID);

		// sort displayed row numbers
		$('#c3-table-slides tr').each(function(index) {
		    $("#c3-table-slides tr td.position").eq(index).html(index+1);
		});

		// Add click event to the remove button on the newly added row
		$('#c3-table-slides tr:last td.deleteSlide').bind("mousedown", ( deleteSlide ));

		// update the slides' list
		var slidesOrder = '';
		$('#c3-table-slides tr').each(function(index) {
		    if (index == 0){
			slidesOrder += $(this).attr('id');
		    } else {
			slidesOrder += ","+$(this).attr('id');
		    }
		});
		// update the input#c3_slides_order_str
		$('input#c3_slides_order_str').val(slidesOrder);
		$("#c3-table-slides").tableDnDUpdate();

		event.stopPropagation;
		return false;
	}));

	function deleteSlide() {
		// remove delete slide button if only one slide is left
		if ($('#c3-table-slides tr').size() == 1) {
		    alert("Deletion is not allowed! At least one slide must be present.");
		    return false;
		} else {
		    if (confirm("Delete this Slide?")) {
			$(this).parent().remove();
		    }
		    // sort displayed row numbers
		    $('#c3-table-slides tr').each(function(index) {
			$("#c3-table-slides tr td.position").eq(index).html(index+1);
		    });

		    // update the slides order
		    var slidesOrder = '';
		    $('#c3-table-slides tr').each(function(index) {
			if (index == 0){
			    slidesOrder += $(this).attr('id');
			}else {
			    slidesOrder += ","+$(this).attr('id');
			}
		    });
		    // update the input#c3_slides_order_str
		    $('input#c3_slides_order_str').val(slidesOrder);
		    $("#c3-table-slides").tableDnDUpdate();

		    event.stopPropagation;
		    return false;
		}
	}
	function addUploader(tableOrRow, rowID) {
            var udesign_custom_uploader;
            $('#c3_slide_upload_button_'+rowID).click(function(event) {
                
                    event.preventDefault();

                    //Extend the wp.media object
                    udesign_custom_uploader = wp.media.frames.file_frame = wp.media({
                        title: 'Choose Image',
                        button: {
                            text: 'Choose Image'
                        },
                        multiple: false // Set to true to allow multiple files to be selected
                    });
                    //When a file is selected, grab the URL and set it as the text field's value
                    udesign_custom_uploader.on('select', function() {
                        attachment = udesign_custom_uploader.state().get('selection').first().toJSON();
                        // set the image URL to the input text field
                        $('#c3_slide_img_url_'+rowID).val(attachment.url);
                        return false;
                    });
                    //Open the uploader dialog
                    udesign_custom_uploader.open();

                });
	}
	function addUploader2(tableOrRow, rowID) {
            var udesign_custom_uploader;
            $('#c3_slide_upload_button2_'+rowID).click(function(event) {
                
                    event.preventDefault();

                    //Extend the wp.media object
                    udesign_custom_uploader = wp.media.frames.file_frame = wp.media({
                        title: 'Choose Image',
                        button: {
                            text: 'Choose Image'
                        },
                        multiple: false // Set to true to allow multiple files to be selected
                    });
                    //When a file is selected, grab the URL and set it as the text field's value
                    udesign_custom_uploader.on('select', function() {
                        attachment = udesign_custom_uploader.state().get('selection').first().toJSON();
                        // set the image URL to the input text field
                        $('#c3_slide_img2_url_'+rowID).val(attachment.url);
                        return false;
                    });
                    //Open the uploader dialog
                    udesign_custom_uploader.open();

                });
	}

})(jQuery);


